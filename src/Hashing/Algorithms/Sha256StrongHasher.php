<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Security\Hashing\StrongHasher;

class Sha256StrongHasher implements StrongHasher {
  public function make($data) {
    return hash('sha256', $data);
  }
}
