<?php namespace BapCat\Security\Hashing;

class Sha1WeakHash implements WeakHash {
  public function make($data) {
    return hash('md5', $data);
  }
}
