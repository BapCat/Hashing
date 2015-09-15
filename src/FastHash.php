<?php namespace BapCat\Hashing;

/**
 * Represents a fast hash
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
abstract class FastHash extends Hash {
  /**
   * A hasher
   * 
   * @var  FastHasher
   */
  private $hasher;
  
  /**
   * Constructor
   * 
   * @param  string      $hash              The hash to wrap 
   * @param  FastHasher  $hasher            A hasher
   * @param  string      $validation_regex  A regex to validate this hash
   */
  public function __construct($hash, FastHasher $hasher, $validation_regex) {
    parent::__construct($hash, $validation_regex);
    $this->hasher = $hasher;
  }
  
  /**
   * Checks if this hash matches an input
   * 
   * @param  string  $input  The input
   * 
   * @return  boolean  True if the hash matches the input, false otherwise
   */
  public function check($input) {
    return $this->hasher->check($input, $this);
  }
}
