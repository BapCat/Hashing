<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\FastHash;
use BapCat\Hashing\FastHasher;

/**
 * A CRC32 implementation of a fast hasher, suitable for checksums
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Crc32FastHasher extends FastHasher {
  /**
   * {@inheritdoc}
   */
  public function make($data) {
    return $this->wrap(hash('crc32', $data));
  }
  
  /**
   * {@inheritdoc}
   */
  public function wrap($hash) {
    return new Crc32FastHash($hash, $this);
  }
  
  /**
   * {@inheritdoc}
   */
  public function check($data, FastHash $hash) {
    return hash('crc32', $data) == $hash;
  }
}
