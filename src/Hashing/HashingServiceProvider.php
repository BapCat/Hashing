<?php namespace BapCat\Security\Hashing;

use BapCat\Interfaces\Ioc\Ioc;
use BapCat\Interfaces\Services\ServiceProvider;

use BapCat\Security\Hashing\FastHash;
use BapCat\Security\Hashing\WeakHash;
use BapCat\Security\Hashing\StrongHash;
use BapCat\Security\Hashing\PasswordHash;

// Fast hashes, suitable for checksums
use BapCat\Security\Hashing\Algorithms\Crc32FastHash;

// Weak hashes, suitable for validation
use BapCat\Security\Hashing\Algorithms\Md5WeakHash;
use BapCat\Security\Hashing\Algorithms\Sha1WeakHash;

// Strong hashes, suitable for hashing important data
use BapCat\Security\Hashing\Algorithms\Sha256StrongHash;

// High-security hashes, suitable for passwords and other critical data
use BapCat\Security\Hashing\Algorithms\DefaultPasswordHash;

class HashingServiceProvider implements ServiceProvider {
  private $ioc;
  
  public function __construct(Ioc $ioc) {
    $this->ioc = $ioc;
  }
  
  public function register() {
    $this->ioc->singleton(Crc32FastHash::class, Crc32FastHash::class);
    $this->ioc->singleton(Md5WeakHash::class, Md5WeakHash::class);
    $this->ioc->singleton(Sha1WeakHash::class, Sha1WeakHash::class);
    $this->ioc->singleton(Sha256StrongHash::class, Sha256StrongHash::class);
    $this->ioc->singleton(DefaultPasswordHash::class, DefaultPasswordHash::class);
    
    $this->ioc->bind(FastHash::class, Crc32FastHash::class);
    $this->ioc->bind(WeakHash::class, Sha1WeakHash::class);
    $this->ioc->bind(StrongHash::class, Sha256StrongHash::class);
    $this->ioc->bind(PasswordHash::class, DefaultPasswordHash::class);
  }
}
