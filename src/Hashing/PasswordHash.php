<?php namespace BapCat\Security\Hashing;

interface PasswordHash {
  public function make($password);
  public function check($password, $hash);
  public function needsRehash($hash);
}
