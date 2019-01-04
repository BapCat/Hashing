<?php declare(strict_types=1); namespace BapCat\Hashing;

/**
 * Defines a strong hasher, suitable for hashing important data
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
abstract class StrongHasher extends Hasher {
  /**
   * Checks if a hash matches data
   *
   * @param  string      $data  The data to check
   * @param  StrongHash  $hash  The hash to check
   *
   * @return  bool  True if the data matches the hash, false otherwise
   */
  public abstract function check(string $data, StrongHash $hash): bool;
}
