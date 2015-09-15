<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\WeakHash;
use BapCat\Hashing\WeakHasher;

/**
 * A SHA1 implementation of a weak hasher, suitable for validation
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Sha1WeakHasher implements WeakHasher {
  /**
   * Generate a hash
   * 
   * @param  string  $data  The data to hash
   * 
   * @return  string  The hashed data
   */
  public function make($data) {
    return hash('sha1', $data);
  }
  
  /**
   * Checks if a hash matches data
   * 
   * @param  string    $data  The data to check
   * @param  WeakHash  $hash  The hash to check
   * 
   * @return  boolean  True if the data matches the hash, false otherwise
   */
  public function check($data, WeakHash $hash) {
    return hash('sha1', $data) == $hash;
  }
}