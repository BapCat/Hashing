<?php declare(strict_types=1); namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\StrongHash;

/**
 * Represents a SHA256 strong hash, suitable for hashing important data
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
class Sha256StrongHash extends StrongHash {
  /**
   * @param  string              $hash    The hash to wrap
   * @param  Sha256StrongHasher  $hasher  A hasher
   */
  public function __construct($hash, Sha256StrongHasher $hasher) {
    parent::__construct($hash, $hasher, '/^[\da-zA-Z]{64}$/');
  }
}
