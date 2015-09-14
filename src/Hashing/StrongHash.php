<?php namespace BapCat\Security\Hashing;

use BapCat\Interfaces\Values\Value;

use InvalidArgumentException;

/**
 * Represents a strong hash
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
class StrongHash extends Value {
  /**
   * The hash
   * 
   * @var  string
   */
  private $raw;
  
  /**
   * A hasher
   * 
   * @var  StrongHasher
   */
  private $hasher;
  
  /**
   * Constructor
   * 
   * @param  string        $name    The hash to wrap 
   * @param  StrongHasher  $hasher  A hasher
   */
  public function __construct($hash, StrongHasher $hasher) {
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
    if(preg_match('/^[\da-zA-Z]{64}$/', $hash) === 0) {
      throw new InvalidArgumentException("Expected hash, but got [$hash] instead");
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
   * 
   * @return  boolean  True if they match, false otherwise
   */
  protected function getRaw() {
    return $this->raw;
  }
  
  /**
   * Checks if this hash matches an input
   * 
   * @param  string  $input  The input
   */
  public function check($input) {
    return $this->hasher->check($input, $this);
  }
}
