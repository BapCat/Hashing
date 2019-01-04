<?php declare(strict_types=1);

use BapCat\Hashing\FastHasher;
use BapCat\Hashing\Algorithms\Crc32FastHash;
use BapCat\Hashing\Algorithms\Crc32FastHasher;
use PHPUnit\Framework\TestCase;

class FastHashTester extends TestCase {
  public function testCrc32(): void {
    $this->doHash(new Crc32FastHasher(), 'crc32', 'Test');
  }

  private function doHash(FastHasher $hasher, string $algo, string $data): void {
    $hash = $hasher->make($data);

    $this->assertInstanceOf(Crc32FastHash::class, $hash);
    $this->assertSame(hash($algo, $data), (string)$hash);
    $this->assertTrue($hasher->check($data, $hash));
  }
}
