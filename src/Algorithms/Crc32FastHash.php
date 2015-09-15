<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\FastHash;

/**
 * Represents a CRC32 fast hash, suitable for checksums
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Crc32FastHash extends FastHash {
  /**
   * Constructor
   * 
   * @param  string           $name    The hash to wrap 
   * @param  Crc32FastHasher  $hasher  A hasher
   */
  public function __construct($hash, Crc32FastHasher $hasher) {
    parent::__construct($hash, $hasher, '/^[\da-zA-Z]{8}$/');
  }
}
