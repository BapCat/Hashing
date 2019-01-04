<?php declare(strict_types=1); namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\FastHash;
use BapCat\Hashing\FastHasher;

/**
 * A CRC32 implementation of a fast hasher, suitable for checksums
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
class Crc32FastHasher extends FastHasher {
  /**
   * {@inheritdoc}
   */
  public function make(string $data): FastHash {
    return $this->wrap(hash('crc32', $data));
  }

  /**
   * {@inheritdoc}
   */
  public function wrap($hash): FastHash {
    return new Crc32FastHash($hash, $this);
  }

  /**
   * {@inheritdoc}
   */
  public function check(string $data, FastHash $hash): bool {
    return hash('crc32', $data) === (string)$hash;
  }
}
