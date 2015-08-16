<?php namespace BapCat\Security\Hashing;

class Md5WeakHash implements WeakHash {
  public function make($data) {
    return hash('md5', $data);
  }
}
