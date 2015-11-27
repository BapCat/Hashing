<?php namespace BapCat\Hashing;

use BapCat\Interfaces\Values\Value;

use InvalidArgumentException;

/**
 * Represents a generic hash
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
abstract class Hash extends Value {
  /**
   * The hash
   * 
   * @var  string
   */
  private $raw;
  
  /**
   * A hasher
   * 
   * @var  Hasher
   */
  private $hasher;
  
  /**
   * Constructor
   * 
   * @param  string  $hash              The hash to wrap 
   * @param  string  $validation_regex  A regex to validate this hash
   */
  public function __construct($hash, $validation_regex) {
    $this->validate($hash, $validation_regex);
    $this->raw = $hash;
  }
  
  /**
   * Ensures the hash passed in is valid
   * 
   * @throws  InvalidArgumentException  If the value is not a valid hash
   * 
   * @param  string  $hash  The value to validate
   */
  private function validate($hash, $validation_regex) {
    if(preg_match($validation_regex, $hash) === 0) {
      throw new InvalidArgumentException("Expected hash, but got [$hash] instead");
    }
  }
  
  /**
   * Converts this object to a string
   * 
   * @return  string  A string representation of this object
   */
  public function __toString() {
    return (string)$this->raw;
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
}
