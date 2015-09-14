<?php namespace BapCat\Security\Hashing;

interface StrongHasher {
  public function make($data);
}
