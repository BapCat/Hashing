<?php

use BapCat\Phi\Phi;
use BapCat\Hashing\PasswordHash;
use BapCat\Hashing\PasswordHasher;
use BapCat\Hashing\Algorithms\DefaultPasswordHasher;
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
    $this->assertTrue(password_verify((string)$password, (string)$hash));
    
    $hash = new PasswordHash(password_hash((string)$password, $algo), $hasher);
    $this->assertTrue($hasher->check($password, $hash));
    $this->assertFalse($hasher->needsRehash($hash));
    
    $hash = new PasswordHash(password_hash((string)$password, $algo, ['cost' => 9]), $hasher);
    $this->assertTrue($hasher->needsRehash($hash));
  }
}
