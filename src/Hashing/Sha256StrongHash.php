<?php namespace BapCat\Security\Hashing;

class Sha256StrongHash implements StrongHash {
  public function make($data) {
    return hash('sha256', $data);
  }
}
