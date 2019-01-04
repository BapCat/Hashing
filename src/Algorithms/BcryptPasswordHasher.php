<?php declare(strict_types=1); namespace BapCat\Hashing\Algorithms;

use BapCat\Hashing\PasswordHash;
use BapCat\Hashing\PasswordHasher;
use BapCat\Values\Password;

/**
 * A secure implementation of a password hasher
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
class BcryptPasswordHasher implements PasswordHasher {
  /**
   * {@inheritdoc}
   */
  public function make(Password $password): PasswordHash {
    return $this->wrap(password_hash((string)$password, PASSWORD_BCRYPT));
  }

  /**
   * {@inheritdoc}
   */
  public function wrap($hash): PasswordHash {
    return new BcryptPasswordHash($hash, $this);
  }

  /**
   * {@inheritdoc}
   */
  public function check(Password $password, PasswordHash $hash): bool {
    return password_verify((string)$password, (string)$hash);
  }

  /**
   * {@inheritdoc}
   */
  public function needsRehash(PasswordHash $hash): bool {
    return password_needs_rehash((string)$hash, PASSWORD_DEFAULT);
  }
}
