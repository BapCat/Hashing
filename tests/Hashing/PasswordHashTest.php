<?php

use BapCat\Security\Hashing\PasswordHash;

class PasswordHashTest extends  PHPUnit_Framework_TestCase {
  public function testBcrypt() {
    $this->doHash(new PasswordHash(), PASSWORD_DEFAULT, 'Test');
  }
  
  private function doHash(PasswordHash $hasher, $algo, $password) {
    $hash = $hasher->make($password);
    $this->assertTrue(password_verify($password, $hash));
    
    $hash = password_hash($password, $algo);
    $this->assertTrue($hasher->check($password, $hash));
    $this->assertFalse($hasher->needsRehash($hash));
    
    $hash = password_hash($password, $algo, ['cost' => 9]);
    $this->assertTrue($hasher->needsRehash($hash));
  }
}
