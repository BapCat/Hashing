<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Security\Hashing\WeakHash;

class Sha1WeakHash implements WeakHash {
  public function make($data) {
    return hash('sha1', $data);
  }
}
