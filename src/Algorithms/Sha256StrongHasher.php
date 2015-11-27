<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\StrongHash;
use BapCat\Hashing\StrongHasher;

/**
 * A SHA256 implementation of a fast hasher, suitable for hashing important data
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Sha256StrongHasher extends StrongHasher {
  /**
   * {@inheritdoc}
   */
  public function make($data) {
    return $this->wrap(hash('sha256', $data));
  }
  
  /**
   * {@inheritdoc}
   */
  public function wrap($hash) {
    return new Sha256StrongHash($hash, $this);
  }
  
  /**
   * {@inheritdoc}
   */
  public function check($data, StrongHash $hash) {
    return hash('sha256', $data) == $hash;
  }
}
