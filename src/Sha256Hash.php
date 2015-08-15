<?php namespace BapCat\Security;

class Sha256Hash implements StrongHash {
  public function make($data) {
    return hash('sha256', $data);
  }
}
