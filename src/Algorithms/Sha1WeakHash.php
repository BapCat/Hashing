<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\WeakHash;

/**
 * Represents an SHA1 weak hash, suitable for validation
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Sha1WeakHash extends WeakHash {
  /**
   * Constructor
   * 
   * @param  string         $name    The hash to wrap 
   * @param  Sha1WeakHasher  $hasher  A hasher
   */
  public function __construct($hash, Sha1WeakHasher $hasher) {
    parent::__construct($hash, $hasher, '/^[\da-zA-Z]{40}$/');
  }
}
