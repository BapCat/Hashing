<?php namespace BapCat\Hashing;

/**
 * Defines a hasher
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
interface Hasher {
  /**
   * Generate a hash
   * 
   * @param  string  $data  The data to hash
   * 
   * @return  string  The hashed data
   */
  public function make($data);
}
