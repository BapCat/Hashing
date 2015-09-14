<?php

use BapCat\Hashing\FastHasher;
use BapCat\Hashing\Algorithms\Crc32FastHasher;

class FastHashTester extends  PHPUnit_Framework_TestCase {
  public function testCrc32() {
    $this->doHash(new Crc32FastHasher(), 'crc32', 'Test');
  }
  
  private function doHash(FastHasher $hasher, $algo, $data) {
    $this->assertEquals(hash($algo, $data), $hasher->make($data));
  }
}
