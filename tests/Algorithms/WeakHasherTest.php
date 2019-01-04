<?php declare(strict_types=1);

use BapCat\Hashing\WeakHasher;
use BapCat\Hashing\Algorithms\Md5WeakHash;
use BapCat\Hashing\Algorithms\Md5WeakHasher;
use BapCat\Hashing\Algorithms\Sha1WeakHash;
use BapCat\Hashing\Algorithms\Sha1WeakHasher;
use PHPUnit\Framework\TestCase;

class WeakHasherTest extends TestCase {
  public function testMd5(): void {
    $this->doHash(new Md5WeakHasher(), Md5WeakHash::class, 'md5', 'Test');
  }

  public function testSha1(): void {
    $this->doHash(new Sha1WeakHasher(), Sha1WeakHash::class, 'sha1', 'Test');
  }

  private function doHash(WeakHasher $hasher, string $class, string $algo, string $data): void {
    $hash = $hasher->make($data);

    $this->assertInstanceOf($class, $hash);
    $this->assertSame(hash($algo, $data), (string)$hash);
    $this->assertTrue($hasher->check($data, $hash));
  }
}
