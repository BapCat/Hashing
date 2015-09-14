<?php namespace BapCat\Security\Hashing;

interface WeakHasher {
  public function make($data);
}
