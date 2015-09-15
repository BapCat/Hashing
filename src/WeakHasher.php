<?php namespace BapCat\Hashing;

/**
 * Defines a weak hasher, suitable for validation
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
interface WeakHasher extends Hasher {
  /**
   * Checks if a hash matches data
   * 
   * @param  string    $data  The data to check
   * @param  WeakHash  $hash  The hash to check
   * 
   * @return  boolean  True if the data matches the hash, false otherwise
   */
  public function check($data, WeakHash $hash);
}
