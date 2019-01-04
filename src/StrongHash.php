<?php declare(strict_types=1); namespace BapCat\Hashing;

/**
 * Represents a strong hash
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
abstract class StrongHash extends Hash {
  /** @var  StrongHasher  $hasher */
  private $hasher;

  /**
   * @param  string        $hash              The hash to wrap
   * @param  StrongHasher  $hasher            A hasher
   * @param  string        $validation_regex  A regex to validate this hash
   */
  public function __construct($hash, StrongHasher $hasher, string $validation_regex) {
    parent::__construct($hash, $validation_regex);
    $this->hasher = $hasher;
  }

  /**
   * Checks if this hash matches an input
   *
   * @param  string  $input  The input
   *
   * @return  bool  True if the hash matches the input, false otherwise
   */
  public function check($input): bool {
    return $this->hasher->check($input, $this);
  }
}
