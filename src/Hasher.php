<?php namespace BapCat\Hashing;

/**
 * Defines a hasher
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
abstract class Hasher {
  /**
   * Generate a hash
   * 
   * @param  string  $data  The data to hash
   * 
   * @return  string  The hashed data
   */
  public abstract function make($data);
  
  /**
   * Generate a random hash
   * 
   * @return  string  A random hash
   */
  public function random() {
    return $this->make($this->salt());
  }
  
  /**
   * Generate a cryptographically secure salt
   * 
   * @param   int     $length (optional) The length of the salt
   * 
   * @return  string  A string of cryptographically random bytes of `$length` length
   */
  public function salt($length = 32) {
    return openssl_random_pseudo_bytes($length);
  }
}
