<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Security\Hashing\StrongHash;

class Sha256StrongHash implements StrongHash {
  public function make($data) {
    return hash('sha256', $data);
  }
}
