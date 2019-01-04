<?php declare(strict_types=1); namespace BapCat\Hashing;

use BapCat\Values\Value;

use InvalidArgumentException;

use function is_string;

/**
 * Represents a generic hash
 *
 * @property-read  string  $raw
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
abstract class Hash extends Value {
  /** @var  string  $raw */
  private $raw;

  /**
   * @param  string  $hash              The hash to wrap
   * @param  string  $validation_regex  A regex to validate this hash
   */
  public function __construct($hash, string $validation_regex) {
    $this->validate($hash, $validation_regex);
    $this->raw = (string)$hash;
  }

  /**
   * Ensures the hash passed in is valid
   *
   * @param  string  $hash
   * @param  string  $validation_regex
   */
  private function validate($hash, string $validation_regex): void {
    if(!is_string($hash) || preg_match($validation_regex, $hash) === 0) {
      throw new InvalidArgumentException('Expected hash, but got ' . var_export($hash, true) . '] instead');
    }
  }

  /**
   * Converts this object to a string
   *
   * @return  string  A string representation of this object
   */
  public function __toString(): string {
    return $this->raw;
  }

  /**
   * Converts this object to a json encodable-form
   *
   * @return  string  A representation of this object suitable for encoding
   */
  public function jsonSerialize(): string {
    return $this->raw;
  }

  /**
   * Gets the raw value this object wraps
   *
   * @return  string  The raw value this object wraps
   */
  protected function getRaw(): string {
    return $this->raw;
  }
}
