<?php namespace BapCat\Security\Hashing;

use BapCat\Interfaces\Ioc\Ioc;
use BapCat\Interfaces\Services\ServiceProvider;

// Fast hashes, suitable for checksums
use BapCat\Security\Hashing\Algorithms\Crc32FastHasher;

// Weak hashes, suitable for validation
use BapCat\Security\Hashing\Algorithms\Md5WeakHasher;
use BapCat\Security\Hashing\Algorithms\Sha1WeakHasher;

// Strong hashes, suitable for hashing important data
use BapCat\Security\Hashing\Algorithms\Sha256StrongHasher;

// High-security hashes, suitable for passwords and other critical data
use BapCat\Security\Hashing\Algorithms\DefaultPasswordHasher;

class HashingServiceProvider implements ServiceProvider {
  private $ioc;
  
  public function __construct(Ioc $ioc) {
    $this->ioc = $ioc;
  }
  
  public function register() {
    $this->ioc->singleton(Crc32FastHasher::class, Crc32FastHasher::class);
    $this->ioc->singleton(Md5WeakHasher::class, Md5WeakHasher::class);
    $this->ioc->singleton(Sha1WeakHasher::class, Sha1WeakHasher::class);
    $this->ioc->singleton(Sha256StrongHasher::class, Sha256StrongHasher::class);
    $this->ioc->singleton(DefaultPasswordHasher::class, DefaultPasswordHasher::class);
    
    $this->ioc->bind(FastHasher::class, Crc32FastHasher::class);
    $this->ioc->bind(WeakHasher::class, Sha1WeakHasher::class);
    $this->ioc->bind(StrongHasher::class, Sha256StrongHasher::class);
    $this->ioc->bind(PasswordHasher::class, DefaultPasswordHasher::class);
  }
}
