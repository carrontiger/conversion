<?php

declare(strict_types=1);

namespace Test\carrontiger\Conversion;

use carrontiger\Conversion\BinaryConverter;
use carrontiger\Conversion\DecimalConverterInterface;
use PHPUnit\Framework\TestCase;

class BinaryConverterTest extends TestCase
{
    private DecimalConverterInterface $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new BinaryConverter();
    }

    public function test_getBase()
    {
        self::assertSame(2, $this->sut->getBase());
    }

    public static function dataProvider_numerals(): iterable
    {
        return [
            [0, '0'],
            [1, '1'],
            [2, '10'],
            [3, '11'],
            [100, '1100100'],
            [2147483647, '1111111111111111111111111111111'],
            [9223372036854775807, '111111111111111111111111111111111111111111111111111111111111111'],
        ];
    }

    /**
     * @dataProvider dataProvider_numerals
     *
     * @param int    $decimal
     * @param string $binary
     *
     * @return void
     */
    public function test_fromDecimal(int $decimal, string $binary): void
    {
        self::assertSame($binary, $this->sut->fromDecimal($decimal));
    }

    /**
     * @dataProvider dataProvider_numerals
     *
     * @param int    $decimal
     * @param string $binary
     *
     * @return void
     */
    public function test_toDecimal(int $decimal, string $binary): void
    {
        self::assertSame($decimal, $this->sut->toDecimal($binary));
    }

}
