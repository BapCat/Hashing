<?php namespace BapCat\Hashing;

use BapCat\Interfaces\Values\Value;
use BapCat\Values\Password;

use InvalidArgumentException;

/**
 * Represents a hashed password
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
abstract class PasswordHash extends Hash {
  /**
   * A hasher
   * 
   * @var  PasswordHasher
   */
  private $hasher;
  
  /**
   * Constructor
   * 
   * @param  string          $hash    The hash to wrap 
   * @param  PasswordHasher  $hasher  A password hasher
   * @param  string        $validation_regex  A regex to validate this hash
   */
  public function __construct($hash, PasswordHasher $hasher, $validation_regex) {
    parent::__construct($hash, $validation_regex);
    $this->hasher = $hasher;
  }
  
  /**
   * Checks if this hash matches a password
   * 
   * @param  Password  $password  The password
   * 
   * @return  boolean  True if they match, false otherwise
   */
  public function check(Password $password) {
    return $this->hasher->check($password, $this);
  }
  
  /**
   * Checks if this hash needs to be re-hashed
   * 
   * @return  boolean  True if it needs re-hashing, false otherwise
   */
  public function needsRehash() {
    return $this->hasher->needsRehash($this);
  }
}
