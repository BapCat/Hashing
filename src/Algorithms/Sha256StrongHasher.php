<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\StrongHash;
use BapCat\Hashing\StrongHasher;

/**
 * A SHA256 implementation of a fast hasher, suitable for hashing important data
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Sha256StrongHasher extends StrongHasher {
  /**
   * Generate a hash
   * 
   * @param  string  $data  The data to hash
   * 
   * @return  Sha256StrongHash  The hashed data
   */
  public function make($data) {
    return new Sha256StrongHash(hash('sha256', $data), $this);
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
