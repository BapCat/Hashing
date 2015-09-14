<?php namespace BapCat\Hashing;

/**
 * Defines a strong hasher, suitable for hashing important data
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
interface StrongHasher {
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
   * @param  string      $data  The data to check
   * @param  StrongHash  $hash  The hash to check
   * 
   * @return  boolean  True if the data matches the hash, false otherwise
   */
  public function check($data, StrongHash $hash);
}
