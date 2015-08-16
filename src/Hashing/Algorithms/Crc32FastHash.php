<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Security\Hashing\FastHash;

class Crc32FastHash implements FastHash {
  public function make($data) {
    return hash('crc32', $data);
  }
}
