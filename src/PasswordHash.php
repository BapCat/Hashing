<?php declare(strict_types=1); namespace BapCat\Hashing;

use BapCat\Values\Password;

/**
 * Represents a hashed password
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
abstract class PasswordHash extends Hash {
  /** @var  PasswordHasher  $hasher */
  private $hasher;

  /**
   * @param  string          $hash              The hash to wrap
   * @param  PasswordHasher  $hasher            A password hasher
   * @param  string          $validation_regex  A regex to validate this hash
   */
  public function __construct($hash, PasswordHasher $hasher, string $validation_regex) {
    parent::__construct($hash, $validation_regex);
    $this->hasher = $hasher;
  }

  /**
   * Checks if this hash matches a password
   *
   * @param  Password  $password  The password
   *
   * @return  bool  True if they match, false otherwise
   */
  public function check(Password $password): bool {
    return $this->hasher->check($password, $this);
  }

  /**
   * Checks if this hash needs to be re-hashed
   *
   * @return  bool  True if it needs re-hashing, false otherwise
   */
  public function needsRehash(): bool {
    return $this->hasher->needsRehash($this);
  }
}
