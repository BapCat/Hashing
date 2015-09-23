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
   * Generate a hash
   * 
   * @param  Password  $password  The password to hash
   * 
   * @return  BcryptPasswordHash  The hashed password
   */
  public function make(Password $password) {
    return new BcryptPasswordHash(password_hash((string)$password, PASSWORD_BCRYPT), $this);
  }
  
  /**
   * Checks if a hash matches a password
   * 
   * @param  Password      $password  The password to check
   * @param  PasswordHash  $hash      The hash to check
   * 
   * @return  boolean  True if the password matches the hash, false otherwise
   */
  public function check(Password $password, PasswordHash $hash) {
    return password_verify((string)$password, (string)$hash);
  }
  
  /**
   * Checks if a hash needs to be re-hashed
   * 
   * @param  PasswordHash  $hash  The hash
   * 
   * @return  boolean  True if it needs re-hashing, false otherwise
   */
  public function needsRehash(PasswordHash $hash) {
    return password_needs_rehash((string)$hash, PASSWORD_DEFAULT);
  }
}
