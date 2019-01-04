<?php declare(strict_types=1); namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\WeakHash;
use BapCat\Hashing\WeakHasher;

/**
 * An MD5 implementation of a weak hasher, suitable for validation
 *
 * @deprecated  MD5 hashes should not be used as they are vulnerable to collisions
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
class Md5WeakHasher extends WeakHasher {
  /**
   * {@inheritdoc}
   */
  public function make(string $data): WeakHash {
    return $this->wrap(hash('md5', $data));
  }

  /**
   * {@inheritdoc}
   */
  public function wrap($hash): WeakHash {
    return new Md5WeakHash($hash, $this);
  }

  /**
   * {@inheritdoc}
   */
  public function check(string $data, WeakHash $hash): bool {
    return hash('md5', $data) === (string)$hash;
  }
}
