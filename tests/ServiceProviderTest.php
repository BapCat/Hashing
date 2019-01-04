<?php declare(strict_types=1);

use BapCat\Phi\Ioc;
use BapCat\Phi\Phi;
use BapCat\Hashing\HashingServiceProvider;
use BapCat\Hashing\FastHash;
use BapCat\Hashing\FastHasher;
use BapCat\Hashing\WeakHash;
use BapCat\Hashing\WeakHasher;
use BapCat\Hashing\StrongHash;
use BapCat\Hashing\StrongHasher;
use BapCat\Hashing\PasswordHash;
use BapCat\Hashing\PasswordHasher;
use BapCat\Hashing\Algorithms\Crc32FastHasher;
use BapCat\Hashing\Algorithms\Sha1WeakHasher;
use BapCat\Hashing\Algorithms\Sha256StrongHasher;
use BapCat\Hashing\Algorithms\BcryptPasswordHasher;
use BapCat\Values\Password;
use PHPUnit\Framework\TestCase;

class ServiceProviderTest extends TestCase {
  /** @var Ioc $ioc */
  private $ioc;

  public function setUp(): void {
    parent::setUp();
    $this->ioc = Phi::instance();
  }

  public function testProvider(): void {
    $provider = new HashingServiceProvider($this->ioc);
    $provider->register();
    $provider->boot();

    $this->assertInstanceOf(Crc32FastHasher::class, $this->ioc->make(FastHasher::class));
    $this->assertInstanceOf(Sha1WeakHasher::class, $this->ioc->make(WeakHasher::class));
    $this->assertInstanceOf(Sha256StrongHasher::class, $this->ioc->make(StrongHasher::class));
    $this->assertInstanceOf(BcryptPasswordHasher::class, $this->ioc->make(PasswordHasher::class));

    $this->assertSame($this->ioc->make(FastHasher::class),     $this->ioc->make(FastHasher::class));
    $this->assertSame($this->ioc->make(WeakHasher::class),     $this->ioc->make(WeakHasher::class));
    $this->assertSame($this->ioc->make(StrongHasher::class),   $this->ioc->make(StrongHasher::class));
    $this->assertSame($this->ioc->make(PasswordHasher::class), $this->ioc->make(PasswordHasher::class));

    $this->assertTrue($this->ioc->make(FastHash::class, [hash('crc32', 'test')])->check('test'));
    $this->assertTrue($this->ioc->make(WeakHash::class, [hash('sha1', 'test')])->check('test'));
    $this->assertTrue($this->ioc->make(StrongHash::class, [hash('sha256', 'test')])->check('test'));
    $this->assertTrue($this->ioc->make(PasswordHash::class, [password_hash('testtest', PASSWORD_BCRYPT)])->check(new Password('testtest')));
  }
}
