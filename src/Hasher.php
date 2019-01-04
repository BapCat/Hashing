<?php declare(strict_types=1); namespace BapCat\Hashing;

use Exception;
use RuntimeException;

/**
 * Defines a hasher
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
abstract class Hasher {
  /**
   * Generate a hash
   *
   * @param  string  $data  The data to hash
   *
   * @return  Hash  The hashed data
   */
  public abstract function make(string $data);

  /**
   * Wrap an already-calculated raw hash into a Hash object
   *
   * @param  string  $hash  The raw hash
   *
   * @return  Hash  The hash, wrapped in a Hash object
   */
  public abstract function wrap($hash);

  /**
   * Generate a random hash
   *
   * @return  Hash  A random hash
   */
  public function random(): Hash {
    return $this->make($this->salt());
  }

  /**
   * Generate a cryptographically secure salt
   *
   * @param  int $length (optional) The length of the salt
   *
   * @return  string  A string of cryptographically random bytes of `$length` length
   */
  public function salt(int $length = 32): string {
    try {
      return random_bytes($length);
    } catch(Exception $e) {
      throw new RuntimeException('Could not generate crytographically secure salt', 0, $e);
    }
  }
}
