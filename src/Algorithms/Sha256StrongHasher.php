<?php declare(strict_types=1); namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\StrongHash;
use BapCat\Hashing\StrongHasher;

/**
 * A SHA256 implementation of a fast hasher, suitable for hashing important data
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
class Sha256StrongHasher extends StrongHasher {
  /**
   * {@inheritdoc}
   */
  public function make(string $data): StrongHash {
    return $this->wrap(hash('sha256', $data));
  }

  /**
   * {@inheritdoc}
   */
  public function wrap($hash): StrongHash {
    return new Sha256StrongHash($hash, $this);
  }

  /**
   * {@inheritdoc}
   */
  public function check(string $data, StrongHash $hash): bool {
    return hash('sha256', $data) === (string)$hash;
  }
}
