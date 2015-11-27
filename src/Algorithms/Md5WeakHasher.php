<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\WeakHash;
use BapCat\Hashing\WeakHasher;

/**
 * An MD5 implementation of a weak hasher, suitable for validation
 * 
 * @deprecated  MD5 hashes should not be used as they are vulnerable to collisions
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class Md5WeakHasher extends WeakHasher {
  /**
   * {@inheritdoc}
   */
  public function make($data) {
    return $this->wrap(hash('md5', $data));
  }
  
  /**
   * {@inheritdoc}
   */
  public function wrap($hash) {
    return new Md5WeakHash($hash, $this);
  }
  
  /**
   * {@inheritdoc}
   */
  public function check($data, WeakHash $hash) {
    return hash('md5', $data) == $hash;
  }
}
