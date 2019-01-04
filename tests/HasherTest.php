<?php declare(strict_types=1);

use BapCat\Hashing\Hash;
use BapCat\Hashing\Hasher;
use PHPUnit\Framework\TestCase;

class HasherTest extends TestCase {
  /** @var Hasher $hasher */
  private $hasher;

  public function setUp(): void {
    parent::setUp();

    $this->hasher = $this
      ->getMockBuilder(Hasher::class)
      ->setMethods(['make'])
      ->getMockForAbstractClass();

    $this->hasher
      ->method('make')
      ->will($this->returnCallback(function(string $data) {
        return new class($data) extends Hash {
          public function __construct(string $hash) {
            parent::__construct($hash, '/.*/');
          }
        };
      }));
  }

  public function testSalt(): void {
    $this->assertEquals(32, strlen($this->hasher->salt()));
    $this->assertEquals(10, strlen($this->hasher->salt(10)));
    $this->assertNotEquals($this->hasher->salt(), $this->hasher->salt());
  }

  public function testRandom(): void {
    $this->assertNotEquals($this->hasher->random(), $this->hasher->random());
  }
}
