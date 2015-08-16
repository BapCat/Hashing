<?php

use BapCat\Security\Hashing\WeakHash;
use BapCat\Security\Hashing\Algorithms\Md5WeakHash;
use BapCat\Security\Hashing\Algorithms\Sha1WeakHash;

class WeakHashTest extends  PHPUnit_Framework_TestCase {
  public function testMd5() {
    $this->doHash(new Md5WeakHash(), 'md5', 'Test');
  }
  
  public function testSha1() {
    $this->doHash(new Sha1WeakHash(), 'sha1', 'Test');
  }
  
  private function doHash(WeakHash $hasher, $algo, $data) {
    $this->assertEquals(hash($algo, $data), $hasher->make($data));
  }
}
