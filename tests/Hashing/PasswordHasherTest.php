<?php

use BapCat\Phi\Phi;
use BapCat\Security\Hashing\PasswordHash;
use BapCat\Security\Hashing\PasswordHasher;
use BapCat\Security\Hashing\Algorithms\DefaultPasswordHasher;
use BapCat\Values\Password;

class PasswordHashTester extends PHPUnit_Framework_TestCase {
  public function testBcrypt() {
    $ioc = Phi::instance();
    
    $hasher = new DefaultPasswordHasher($ioc);
    $ioc->bind(PasswordHasher::class, $hasher);
    
    $this->doHash($hasher, PASSWORD_DEFAULT, 'Test test');
  }
  
  private function doHash(PasswordHasher $hasher, $algo, $password) {
    $password = new Password($password);
    
    $hash = $hasher->make($password);
    $this->assertTrue(password_verify($password, (string)$hash));
    
    $hash = new PasswordHash(password_hash($password, $algo), $hasher);
    $this->assertTrue($hasher->check($password, $hash));
    $this->assertFalse($hasher->needsRehash($hash));
    
    $hash = new PasswordHash(password_hash($password, $algo, ['cost' => 9]), $hasher);
    $this->assertTrue($hasher->needsRehash($hash));
  }
}
