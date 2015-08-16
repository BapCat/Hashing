<?php

use BapCat\Security\Hashing\StrongHash;
use BapCat\Security\Hashing\Algorithms\Sha256StrongHash;

class StrongHashTest extends  PHPUnit_Framework_TestCase {
  public function testSha256() {
    $this->doHash(new Sha256StrongHash(), 'sha256', 'Test');
  }
  
  private function doHash(StrongHash $hasher, $algo, $data) {
    $this->assertEquals(hash($algo, $data), $hasher->make($data));
  }
}
