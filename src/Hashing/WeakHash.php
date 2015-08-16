<?php namespace BapCat\Security\Hashing;

interface WeakHash {
  public function make($data);
}
