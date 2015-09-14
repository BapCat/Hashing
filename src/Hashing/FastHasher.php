<?php namespace BapCat\Security\Hashing;

interface FastHasher {
  public function make($data);
}
