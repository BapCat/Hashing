<?php

use BapCat\Phi\Phi;
use BapCat\Security\Hashing\HashingServiceProvider;
use BapCat\Security\Hashing\FastHash;
use BapCat\Security\Hashing\WeakHash;
use BapCat\Security\Hashing\StrongHash;
use BapCat\Security\Hashing\PasswordHash;
use BapCat\Security\Hashing\Algorithms\Crc32FastHash;
use BapCat\Security\Hashing\Algorithms\Sha1WeakHash;
use BapCat\Security\Hashing\Algorithms\Sha256StrongHash;
use BapCat\Security\Hashing\Algorithms\DefaultPasswordHash;

class ServiceProviderTest extends PHPUnit_Framework_TestCase {
  private $ioc;
  
  public function setUp() {
    $this->ioc = Phi::instance();
  }
  
  public function testProvider() {
    $provider = new HashingServiceProvider($this->ioc);
    $provider->register();
    
    $this->assertInstanceOf(Crc32FastHash::class, $this->ioc->make(FastHash::class));
    $this->assertInstanceOf(Sha1WeakHash::class, $this->ioc->make(WeakHash::class));
    $this->assertInstanceOf(Sha256StrongHash::class, $this->ioc->make(StrongHash::class));
    $this->assertInstanceOf(DefaultPasswordHash::class, $this->ioc->make(PasswordHash::class));
  }
}
