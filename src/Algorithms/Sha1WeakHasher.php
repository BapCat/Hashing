<?php declare(strict_types=1); namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\WeakHash;
use BapCat\Hashing\WeakHasher;

/**
 * A SHA1 implementation of a weak hasher, suitable for validation
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
class Sha1WeakHasher extends WeakHasher {
  /**
   * {@inheritdoc}
   */
  public function make(string $data): WeakHash {
    return $this->wrap(hash('sha1', $data));
  }

  /**
   * {@inheritdoc}
   */
  public function wrap($hash): WeakHash {
    return new Sha1WeakHash($hash, $this);
  }

  /**
   * {@inheritdoc}
   */
  public function check(string $data, WeakHash $hash): bool {
    return hash('sha1', $data) === (string)$hash;
  }
}
