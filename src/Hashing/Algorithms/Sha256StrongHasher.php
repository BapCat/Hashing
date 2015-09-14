<?php namespace BapCat\Security\Hashing\Algorithms;

use BapCat\Security\Hashing\StrongHash;
use BapCat\Security\Hashing\StrongHasher;

/**
 * A SHA256 implementation of a fast hasher, suitable for hashing important data
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Sha256StrongHasher implements StrongHasher {
  /**
   * Generate a hash
   * 
   * @param  string  $data  The data to hash
   * 
   * @return  string  The hashed data
   */
  public function make($data) {
    return hash('sha256', $data);
  }
  
  /**
   * Checks if a hash matches data
   * 
   * @param  string      $data  The data to check
   * @param  StrongHash  $hash  The hash to check
   * 
   * @return  boolean  True if the data matches the hash, false otherwise
   */
  public function check($data, StrongHash $hash) {
    return hash('sha256', $data) == $hash;
  }
}
