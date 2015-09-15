<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\WeakHash;

/**
 * Represents an MD5 weak hash, suitable for validation
 * 
 * @deprecated  MD5 hashes should not be used as they are vulnerable to collisions
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Md5WeakHash extends WeakHash {
  /**
   * Constructor
   * 
   * @param  string         $name    The hash to wrap 
   * @param  Md5WeakHasher  $hasher  A hasher
   */
  public function __construct($hash, Md5WeakHasher $hasher) {
    parent::__construct($hash, $hasher, '/^[\da-zA-Z]{32}$/');
  }
}
