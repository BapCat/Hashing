<?php

use BapCat\Hashing\WeakHasher;
use BapCat\Hashing\Algorithms\Md5WeakHasher;
use BapCat\Hashing\Algorithms\Sha1WeakHasher;

class WeakHasherTest extends  PHPUnit_Framework_TestCase {
  public function testMd5() {
    $this->doHash(new Md5WeakHasher(), 'md5', 'Test');
  }
  
  public function testSha1() {
    $this->doHash(new Sha1WeakHasher(), 'sha1', 'Test');
  }
  
  private function doHash(WeakHasher $hasher, $algo, $data) {
    $this->assertEquals(hash($algo, $data), $hasher->make($data));
  }
}
