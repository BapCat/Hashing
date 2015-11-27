<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\PasswordHash;
use BapCat\Hashing\PasswordHasher;
use BapCat\Values\Password;

/**
 * A secure implementation of a password hasher
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class BcryptPasswordHasher implements PasswordHasher {
  /**
   * {@inheritdoc}
   */
  public function make(Password $password) {
    return $this->wrap(password_hash((string)$password, PASSWORD_BCRYPT));
  }
  
  /**
   * {@inheritdoc}
   */
  public function wrap($hash) {
    return new BcryptPasswordHash($hash, $this);
  }
  
  /**
   * {@inheritdoc}
   */
  public function check(Password $password, PasswordHash $hash) {
    return password_verify((string)$password, (string)$hash);
  }
  
  /**
   * {@inheritdoc}
   */
  public function needsRehash(PasswordHash $hash) {
    return password_needs_rehash((string)$hash, PASSWORD_DEFAULT);
  }
}
