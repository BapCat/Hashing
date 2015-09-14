<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Security\Hashing\WeakHasher;

class Sha1WeakHasher implements WeakHasher {
  public function make($data) {
    return hash('sha1', $data);
  }
}
