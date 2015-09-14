<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Interfaces\Ioc\Ioc;
use BapCat\Security\Hashing\PasswordHash;
use BapCat\Security\Hashing\PasswordHasher;

class DefaultPasswordHasher implements PasswordHasher {
  private $ioc;
  
  public function __construct(Ioc $ioc) {
    $this->ioc = $ioc;
  }
  
  public function make($password) {
    return $this->ioc->make(PasswordHash::class, [password_hash($password, PASSWORD_DEFAULT)]);
  }
  
  public function check($password, PasswordHash $hash) {
    return password_verify($password, $hash);
  }
  
  public function needsRehash(PasswordHash $hash) {
    return password_needs_rehash($hash, PASSWORD_DEFAULT);
  }
}
