<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Security\Hashing\PasswordHash;

class DefaultPasswordHash implements PasswordHash {
  public function make($password) {
    return password_hash($password, PASSWORD_DEFAULT);
  }
  
  public function check($password, $hash) {
    return password_verify($password, $hash);
  }
  
  public function needsRehash($hash) {
    return password_needs_rehash($hash, PASSWORD_DEFAULT);
  }
}
