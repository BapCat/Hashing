<?php namespace BapCat\Security;

interface WeakHash {
  public function make($data);
}
