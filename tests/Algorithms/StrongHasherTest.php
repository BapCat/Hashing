<?php declare(strict_types=1);

use BapCat\Hashing\StrongHasher;
use BapCat\Hashing\Algorithms\Sha256StrongHash;
use BapCat\Hashing\Algorithms\Sha256StrongHasher;
use PHPUnit\Framework\TestCase;

class StrongHasherTest extends TestCase {
  public function testSha256(): void {
    $this->doHash(new Sha256StrongHasher(), 'sha256', 'Test');
  }

  private function doHash(StrongHasher $hasher, string $algo, string $data): void {
    $hash = $hasher->make($data);

    $this->assertInstanceOf(Sha256StrongHash::class, $hash);
    $this->assertSame(hash($algo, $data), (string)$hash);
    $this->assertTrue($hasher->check($data, $hash));
  }
}
