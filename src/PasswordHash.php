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
class PasswordHash extends Value {
  /**
   * The hash of the password
   * 
   * @var  string
   */
  private $raw;
  
  /**
   * A password hasher
   * 
   * @var  PasswordHasher
   */
  private $hasher;
  
  /**
   * Constructor
   * 
   * @param  string          $name    The hash to wrap 
   * @param  PasswordHasher  $hasher  A password hasher
   */
  public function __construct($hash, PasswordHasher $hasher) {
    $this->validate($hash);
    
    $this->raw    = $hash;
    $this->hasher = $hasher;
  }
  
  /**
   * Ensures the hash passed in is valid
   * 
   * @throws  InvalidArgumentException  If the value is not a valid hash
   * 
   * @param  string  $hash  The value to validate
   */
  private function validate($hash) {
    if(preg_match('/^\$2[aby]\$[\d]{2}\$[\d\.\/a-zA-Z]{53}$/', $hash) === 0) {
      throw new InvalidArgumentException("Expected password hash, but got [$hash] instead");
    }
  }
  
  /**
   * Converts this object to a string
   * 
   * @return  string  A string representation of this object
   */
  public function __toString() {
    return $this->raw;
  }
  
  /**
   * Converts this object to a json encodable-form
   * 
   * @return  string  A representation of this object suitable for encoding
   */
  public function jsonSerialize() {
    return $this->raw;
  }
  
  /**
   * Gets the raw value this object wraps
   * 
   * @return  string  The raw value this object wraps
   */
  protected function getRaw() {
    return $this->raw;
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
