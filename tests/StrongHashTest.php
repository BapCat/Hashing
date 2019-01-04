<?php declare(strict_types=1);

use BapCat\Hashing\StrongHash;
use BapCat\Hashing\StrongHasher;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class StrongHashTest extends TestCase {
  /** @var StrongHasher $hasher */
  private $hasher;

  public function setUp(): void {
    parent::setUp();

    $this->hasher = $this
      ->getMockBuilder(StrongHasher::class)
      ->setMethods(['check'])
      ->getMockForAbstractClass();

    $this->hasher
      ->method('check')
      ->will($this->returnCallback(function(string $input): bool {
        return $input === 'test';
      }));
  }

  private function makeHash($hash): StrongHash {
    return $this->getMockBuilder(StrongHash::class)->setConstructorArgs([$hash, $this->hasher, '/^test$/'])->getMockForAbstractClass();
  }

  public function testConstructingWithValidHash(): void {
    $this->makeHash('test');
    Assert::assertTrue(true);
  }

  public function testCheck(): void {
    $input = 'test';
    $hash = $this->makeHash($input);

    $this->assertTrue($hash->check($input));
    $this->assertFalse($hash->check('bad'));
  }
}
