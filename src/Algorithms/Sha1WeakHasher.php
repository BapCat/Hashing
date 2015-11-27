<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\WeakHash;
use BapCat\Hashing\WeakHasher;

/**
 * A SHA1 implementation of a weak hasher, suitable for validation
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Sha1WeakHasher implements WeakHasher {
  /**
   * {@inheritdoc}
   */
  public function make($data) {
    return $this->wrap(hash('sha1', $data));
  }
  
  /**
   * {@inheritdoc}
   */
  public function wrap($hash) {
    return new Sha1WeakHash($hash, $this);
  }
  
  /**
   * {@inheritdoc}
   */
  public function check($data, WeakHash $hash) {
    return hash('sha1', $data) == $hash;
  }
}
