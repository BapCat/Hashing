<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Interfaces\Ioc\Ioc;
use BapCat\Security\Hashing\PasswordHash;
use BapCat\Security\Hashing\PasswordHasher;
use BapCat\Values\Password;

/**
 * A secure implementation of a password hasher
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class DefaultPasswordHasher implements PasswordHasher {
  /**
   * The IOC container
   * 
   * @var  Ioc
   */
  private $ioc;
  
  /**
   * Constructor
   * 
   * @param  Ioc  $ioc  The IOC container
   */
  public function __construct(Ioc $ioc) {
    $this->ioc = $ioc;
  }
  
  /**
   * Generate a hash
   * 
   * @param  Password  $password  The password to hash
   * 
   * @return  PasswordHash  The hashed password
   */
  public function make(Password $password) {
    return $this->ioc->make(PasswordHash::class, [password_hash($password, PASSWORD_DEFAULT)]);
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
    return password_verify($password, $hash);
  }
  
  /**
   * Checks if a hash needs to be re-hashed
   * 
   * @param  PasswordHash  $hash  The hash
   * 
   * @return  boolean  True if it needs re-hashing, false otherwise
   */
  public function needsRehash(PasswordHash $hash) {
    return password_needs_rehash($hash, PASSWORD_DEFAULT);
  }
}
