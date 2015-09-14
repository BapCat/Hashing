<?php namespace BapCat\Hashing;

use BapCat\Values\Password;

/**
 * Defines a password hasher
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
interface PasswordHasher {
  /**
   * Generate a hash
   * 
   * @param  Password  $password  The password to hash
   * 
   * @return  PasswordHash  The hashed password
   */
  public function make(Password $password);
  
  /**
   * Checks if a hash matches a password
   * 
   * @param  Password      $password  The password to check
   * @param  PasswordHash  $hash      The hash to check
   * 
   * @return  boolean  True if the password matches the hash, false otherwise
   */
  public function check(Password $password, PasswordHash $hash);
  
  /**
   * Checks if a hash needs to be re-hashed
   * 
   * @param  PasswordHash  $hash  The hash
   * 
   * @return  boolean  True if it needs re-hashing, false otherwise
   */
  public function needsRehash(PasswordHash $hash);
}
