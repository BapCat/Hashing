<?php namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\PasswordHash;

/**
 * Represents a BCrypt password hash
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class BcryptPasswordHash extends PasswordHash {
  /**
   * Constructor
   * 
   * @param  string                $name    The hash to wrap 
   * @param  BcryptPasswordHasher  $hasher  A hasher
   */
  public function __construct($hash, BcryptPasswordHasher $hasher) {
    parent::__construct($hash, $hasher, '/^\$2[aby]\$[\d]{2}\$[\d\.\/a-zA-Z]{53}$/');
  }
}
