<?php declare(strict_types=1); namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\FastHash;

/**
 * Represents a CRC32 fast hash, suitable for checksums
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
class Crc32FastHash extends FastHash {
  /**
   * @param  string           $hash    The hash to wrap
   * @param  Crc32FastHasher  $hasher  A hasher
   */
  public function __construct($hash, Crc32FastHasher $hasher) {
    parent::__construct($hash, $hasher, '/^[\da-zA-Z]{8}$/');
  }
}
