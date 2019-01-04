<?php declare(strict_types=1); namespace BapCat\Hashing;

use BapCat\Values\Password;

/**
 * Defines a password hasher
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
interface PasswordHasher {
  /**
   * Generate a hash
   *
   * @param  Password  $password  The password to hash
   *
   * @return  PasswordHash  The hashed password
   */
  public function make(Password $password): PasswordHash;

  /**
   * Wrap an already-calculated raw hash into a Hash object
   *
   * @param  string  $hash  The raw hash
   *
   * @return  PasswordHash  The hash, wrapped in a Hash object
   */
  public function wrap($hash): PasswordHash;

  /**
   * Checks if a hash matches a password
   *
   * @param  Password      $password  The password to check
   * @param  PasswordHash  $hash      The hash to check
   *
   * @return  bool  True if the password matches the hash, false otherwise
   */
  public function check(Password $password, PasswordHash $hash): bool;

  /**
   * Checks if a hash needs to be re-hashed
   *
   * @param  PasswordHash  $hash  The hash
   *
   * @return  bool  True if it needs re-hashing, false otherwise
   */
  public function needsRehash(PasswordHash $hash): bool;
}
