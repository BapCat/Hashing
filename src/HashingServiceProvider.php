<?php namespace BapCat\Hashing;

use BapCat\Interfaces\Ioc\Ioc;
use BapCat\Services\ServiceProvider;

// Fast hashes, suitable for checksums
use BapCat\Hashing\Algorithms\Crc32FastHasher;

// Weak hashes, suitable for validation
use BapCat\Hashing\Algorithms\Md5WeakHasher;
use BapCat\Hashing\Algorithms\Sha1WeakHasher;

// Strong hashes, suitable for hashing important data
use BapCat\Hashing\Algorithms\Sha256StrongHasher;

// High-security hashes, suitable for passwords and other critical data
use BapCat\Hashing\Algorithms\BcryptPasswordHasher;

class HashingServiceProvider implements ServiceProvider {
  const provides = 'hashing';
  
  private $ioc;
  
  public function __construct(Ioc $ioc) {
    $this->ioc = $ioc;
  }
  
  public function register() {
    $this->ioc->singleton(FastHasher::class,     Crc32FastHasher::class);
    $this->ioc->singleton(WeakHasher::class,     Sha1WeakHasher::class);
    $this->ioc->singleton(StrongHasher::class,   Sha256StrongHasher::class);
    $this->ioc->singleton(PasswordHasher::class, BcryptPasswordHasher::class);
  }
  
  public function boot() {
    
  }
}
