<?php namespace BapCat\Hashing;

/**
 * Defines a fast hasher, suitable for checksums
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
abstract class FastHasher extends Hasher {
  /**
   * Checks if a hash matches data
   * 
   * @param  string    $data  The data to check
   * @param  FastHash  $hash  The hash to check
   * 
   * @return  boolean  True if the data matches the hash, false otherwise
   */
  public abstract function check($data, FastHash $hash);
}
