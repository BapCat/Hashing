<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\FastHash;
use BapCat\Hashing\FastHasher;
use BapCat\Interfaces\Ioc\Ioc;

/**
 * A CRC32 implementation of a fast hasher, suitable for checksums
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Crc32FastHasher implements FastHasher {
  /**
   * The IOC container
   * 
   * @var  Ioc
   */
  private $ioc;
  
  /**
   * Constructor
   * 
   * @param  Ioc  $ioc  The IOC container
   */
  public function __construct(Ioc $ioc) {
    $this->ioc = $ioc;
  }
  
  /**
   * Generate a hash
   * 
   * @param  string  $data  The data to hash
   * 
   * @return  Crc32FastHash  The hashed data
   */
  public function make($data) {
    return $this->ioc->make(Crc32FastHash::class, [hash('crc32', $data)]);
  }
  
  /**
   * Checks if a hash matches data
   * 
   * @param  string    $data  The data to check
   * @param  FastHash  $hash  The hash to check
   * 
   * @return  boolean  True if the data matches the hash, false otherwise
   */
  public function check($data, FastHash $hash) {
    return hash('crc32', $data) == $hash;
  }
}
