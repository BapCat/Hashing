<?php

use BapCat\Phi\Phi;
use BapCat\Security\Hashing\HashingServiceProvider;
use BapCat\Security\Hashing\FastHasher;
use BapCat\Security\Hashing\WeakHasher;
use BapCat\Security\Hashing\StrongHasher;
use BapCat\Security\Hashing\PasswordHasher;
use BapCat\Security\Hashing\Algorithms\Crc32FastHasher;
use BapCat\Security\Hashing\Algorithms\Sha1WeakHasher;
use BapCat\Security\Hashing\Algorithms\Sha256StrongHasher;
use BapCat\Security\Hashing\Algorithms\DefaultPasswordHasher;

class ServiceProviderTest extends PHPUnit_Framework_TestCase {
  private $ioc;
  
  public function setUp() {
    $this->ioc = Phi::instance();
  }
  
  public function testProvider() {
    $provider = new HashingServiceProvider($this->ioc);
    $provider->register();
    
    $this->assertInstanceOf(Crc32FastHasher::class, $this->ioc->make(FastHasher::class));
    $this->assertInstanceOf(Sha1WeakHasher::class, $this->ioc->make(WeakHasher::class));
    $this->assertInstanceOf(Sha256StrongHasher::class, $this->ioc->make(StrongHasher::class));
    $this->assertInstanceOf(DefaultPasswordHasher::class, $this->ioc->make(PasswordHasher::class));
  }
}
