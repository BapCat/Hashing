<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\StrongHash;
use BapCat\Hashing\StrongHasher;
use BapCat\Interfaces\Ioc\Ioc;

/**
 * A SHA256 implementation of a fast hasher, suitable for hashing important data
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Sha256StrongHasher extends StrongHasher {
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
   * @return  Sha256StrongHash  The hashed data
   */
  public function make($data) {
    return $this->ioc->make(Sha256StrongHash::class, [hash('sha256', $data)]);
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
