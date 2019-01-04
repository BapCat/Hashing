<?php declare(strict_types=1);

use BapCat\Hashing\PasswordHash;
use BapCat\Hashing\PasswordHasher;
use BapCat\Values\Password;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class PasswordHashTest extends TestCase {
  /** @var PasswordHasher $hasher */
  private $hasher;

  public function setUp(): void {
    parent::setUp();

    $this->hasher = $this
      ->getMockBuilder(PasswordHasher::class)
      ->setMethods(['check', 'needsRehash'])
      ->getMockForAbstractClass()
    ;

    $this->hasher
      ->method('check')
      ->will($this->returnCallback(function(string $input): bool {
        return $input === 'testtest';
      }))
    ;

    $this->hasher
      ->method('needsRehash')
      ->will($this->returnCallback(function(): bool {
        return true;
      }))
    ;
  }

  private function makeHash($hash): PasswordHash {
    return $this->getMockBuilder(PasswordHash::class)->setConstructorArgs([$hash, $this->hasher, '/^testtest$/'])->getMockForAbstractClass();
  }

  public function testConstructingWithValidHash(): void {
    $this->makeHash('testtest');
    Assert::assertTrue(true);
  }

  public function testCheck(): void {
    $input = 'testtest';
    $hash = $this->makeHash($input);

    Assert::assertTrue($hash->check(new Password($input)));
    Assert::assertFalse($hash->check(new Password('badbadbad')));
  }

  public function testNeedsRehash(): void {
    $input = 'testtest';
    $hash = $this->makeHash($input);

    $this->assertTrue($hash->needsRehash());
  }
}
