<?php declare(strict_types=1);

use BapCat\Hashing\WeakHash;
use BapCat\Hashing\WeakHasher;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class WeakHashTest extends TestCase {
  /** @var WeakHasher $hasher */
  private $hasher;

  public function setUp(): void {
    parent::setUp();

    $this->hasher = $this
      ->getMockBuilder(WeakHasher::class)
      ->setMethods(['check'])
      ->getMockForAbstractClass();

    $this->hasher
      ->method('check')
      ->will($this->returnCallback(function(string $input): bool {
        return $input === 'test';
      }));
  }

  private function makeHash($hash): WeakHash {
    return $this->getMockBuilder(WeakHash::class)->setConstructorArgs([$hash, $this->hasher, '/^test$/'])->getMockForAbstractClass();
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
