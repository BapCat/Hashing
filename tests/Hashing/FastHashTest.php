<?php

use BapCat\Security\Hashing\FastHash;
use BapCat\Security\Hashing\Algorithms\Crc32FastHash;

class FastHashTest extends  PHPUnit_Framework_TestCase {
  public function testCrc32() {
    $this->doHash(new Crc32FastHash(), 'crc32', 'Test');
  }
  
  private function doHash(FastHash $hasher, $algo, $data) {
    $this->assertEquals(hash($algo, $data), $hasher->make($data));
  }
}
