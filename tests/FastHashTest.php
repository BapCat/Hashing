<?php declare(strict_types=1);

use BapCat\Hashing\FastHash;
use BapCat\Hashing\FastHasher;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FastHashTest extends TestCase {
  /** @var FastHasher $hasher */
  private $hasher;

  public function setUp(): void {
    parent::setUp();

    $this->hasher = $this
      ->getMockBuilder(FastHasher::class)
      ->setMethods(['check'])
      ->getMockForAbstractClass();

    $this->hasher
      ->method('check')
      ->will($this->returnCallback(function(string $input) {
        return $input === 'test';
      }));
  }

  private function makeHash($hash): FastHash {
    return $this->getMockBuilder(FastHash::class)->setConstructorArgs([$hash, $this->hasher, '/^test$/'])->getMockForAbstractClass();
  }

  public function testConstructingWithValidHash(): void {
    $this->makeHash('test');
    Assert::assertTrue(true);
  }

  public function testCheck(): void {
    $input = 'test';
    $hash = $this->makeHash($input);

    Assert::assertTrue($hash->check($input));
    Assert::assertFalse($hash->check('bad'));
  }
}
