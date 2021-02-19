<?php declare(strict_types=1);

use BapCat\Hashing\Hash;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class HashTest extends TestCase {
  private function makeHash($hash): Hash {
    return $this->getMockBuilder(Hash::class)->setConstructorArgs([$hash, '/^test$/'])->getMockForAbstractClass();
  }

  public function testConstructingWithValidHash(): void {
    $this->makeHash('test');
    Assert::assertTrue(true);
  }

  public function testConstructingWithNull(): void {
    $this->expectException(InvalidArgumentException::class);
    $this->makeHash(null);
  }

  public function testConstructingWithInvalidString(): void {
    $this->expectException(InvalidArgumentException::class);
    $this->makeHash('bad');
  }

  public function testConstructingWithWrongDataType(): void {
    $this->expectException(InvalidArgumentException::class);
    $this->makeHash(true);
  }

  public function testGetRaw(): void {
    $input = 'test';
    $hash = $this->makeHash($input);
    Assert::assertSame($hash->raw, $input);
  }

  public function testToString(): void {
    $input = 'test';
    $hash = $this->makeHash($input);
    Assert::assertSame((string)$hash, $input);
  }

  public function testJsonEncode(): void {
    $input = 'test';
    $hash = $this->makeHash($input);
    Assert::assertSame(json_encode($hash), "\"$input\"");
  }
}
