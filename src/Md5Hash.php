<?php namespace BapCat\Security;

class Sha1Hash implements WeakHash {
  public function make($data) {
    return hash('md5', $data);
  }
}
