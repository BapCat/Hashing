<?php declare(strict_types=1); namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\WeakHash;

/**
 * Represents an MD5 weak hash, suitable for validation
 *
 * @deprecated  MD5 hashes should not be used as they are vulnerable to collisions
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
class Md5WeakHash extends WeakHash {
  /**
   * @param  string         $hash    The hash to wrap
   * @param  Md5WeakHasher  $hasher  A hasher
   */
  public function __construct($hash, Md5WeakHasher $hasher) {
    parent::__construct($hash, $hasher, '/^[\da-zA-Z]{32}$/');
  }
}
