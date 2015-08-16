<?php namespace BapCat\Security\Hashing;

class Crc32FastHash implements FastHash {
  public function make($data) {
    return hash('crc32', $data);
  }
}
