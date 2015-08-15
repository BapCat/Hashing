<?php namespace BapCat\Security;

interface StrongHash {
  public function make($data);
}
