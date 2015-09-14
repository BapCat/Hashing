<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Security\Hashing\WeakHasher;

class Md5WeakHasher implements WeakHasher {
  public function make($data) {
    return hash('md5', $data);
  }
}
