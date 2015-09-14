<?php

use BapCat\Phi\Phi;
use BapCat\Hashing\HashingServiceProvider;
use BapCat\Hashing\FastHasher;
use BapCat\Hashing\WeakHasher;
use BapCat\Hashing\StrongHasher;
use BapCat\Hashing\PasswordHasher;
use BapCat\Hashing\Algorithms\Crc32FastHasher;
use BapCat\Hashing\Algorithms\Sha1WeakHasher;
use BapCat\Hashing\Algorithms\Sha256StrongHasher;
use BapCat\Hashing\Algorithms\DefaultPasswordHasher;

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
