<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\WeakHash;
use BapCat\Hashing\WeakHasher;

/**
 * An MD5 implementation of a weak hasher, suitable for validation
 * 
 * @deprecated  MD5 hashes should not be used as they are vulnerable to collisions
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Md5WeakHasher implements WeakHasher {
  /**
   * Generate a hash
   * 
   * @param  string  $data  The data to hash
   * 
   * @return  string  The hashed data
   */
  public function make($data) {
    return hash('md5', $data);
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
    return hash('md5', $data) == $hash;
  }
}
