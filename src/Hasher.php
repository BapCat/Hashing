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
   * @param   string  $data  The data to hash
   * 
   * @return  Hash    The hashed data
   */
  public abstract function make($data);
  
  /**
   * Wrap an already-calculated raw hash into a Hash object
   * 
   * @param   string  $hash  The raw hash
   * 
   * @return  Hash    The hash, wrapped in a Hash object
   */
  public abstract function wrap($hash);
  
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
