<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Security\Hashing\FastHasher;

class Crc32FastHasher implements FastHasher {
  public function make($data) {
    return hash('crc32', $data);
  }
}
