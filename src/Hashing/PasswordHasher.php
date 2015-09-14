<?php namespace BapCat\Security\Hashing;

interface PasswordHasher {
  public function make($password);
  public function check($password, PasswordHash $hash);
  public function needsRehash(PasswordHash $hash);
}
