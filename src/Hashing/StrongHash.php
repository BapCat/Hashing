<?php namespace BapCat\Security\Hashing;

interface StrongHash {
  public function make($data);
}
