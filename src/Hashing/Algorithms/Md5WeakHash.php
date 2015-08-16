<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Security\Hashing\WeakHash;

class Md5WeakHash implements WeakHash {
  public function make($data) {
    return hash('md5', $data);
  }
}
