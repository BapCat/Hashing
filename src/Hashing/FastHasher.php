<?php namespace BapCat\Security\Hashing;

/**
 * Defines a fast hasher, suitable for checksums
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
interface FastHasher {
  /**
   * Generate a hash
   * 
   * @param  string  $data  The data to hash
   * 
   * @return  string  The hashed data
   */
  public function make($data);
  
  /**
   * Checks if a hash matches data
   * 
   * @param  string    $data  The data to check
   * @param  FastHash  $hash  The hash to check
   * 
   * @return  boolean  True if the data matches the hash, false otherwise
   */
  public function check($data, FastHash $hash);
}
