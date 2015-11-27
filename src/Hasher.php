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
   * @param   string  $data  The data to hash
   * 
   * @return  Hash    The hashed data
   */
  public function make($data);
  
  /**
   * Wrap an already-calculated raw hash into a Hash object
   * 
   * @param   string  $hash  The raw hash
   * 
   * @return  Hash    The hash, wrapped in a Hash object
   */
  public function wrap($hash);
}
