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
    $this->ioc->singleton(Crc32FastHasher::class,      Crc32FastHasher::class);
    $this->ioc->singleton(Md5WeakHasher::class,        Md5WeakHasher::class);
    $this->ioc->singleton(Sha1WeakHasher::class,       Sha1WeakHasher::class);
    $this->ioc->singleton(Sha256StrongHasher::class,   Sha256StrongHasher::class);
    $this->ioc->singleton(BcryptPasswordHasher::class, BcryptPasswordHasher::class);
    
    $this->ioc->bind(FastHasher::class,     Crc32FastHasher::class);
    $this->ioc->bind(WeakHasher::class,     Sha1WeakHasher::class);
    $this->ioc->bind(StrongHasher::class,   Sha256StrongHasher::class);
    $this->ioc->bind(PasswordHasher::class, BcryptPasswordHasher::class);
    
    $this->ioc->bind(FastHash::class, function($hash) {
      return $this->ioc->make(FastHasher::class)->wrap($hash);
    });
    
    $this->ioc->bind(WeakHash::class, function($hash) {
      return $this->ioc->make(WeakHasher::class)->wrap($hash);
    });
    
    $this->ioc->bind(StrongHash::class, function($hash) {
      return $this->ioc->make(StrongHasher::class)->wrap($hash);
    });
    
    $this->ioc->bind(PasswordHash::class, function($hash) {
      return $this->ioc->make(PasswordHasher::class)->wrap($hash);
    });
  }
  
  public function boot() {
    
  }
}
