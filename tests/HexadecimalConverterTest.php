<?php

declare(strict_types=1);

namespace Test\carrontiger\Conversion;

use carrontiger\Conversion\DecimalConverterInterface;
use carrontiger\Conversion\HexadecimalConverter;
use PHPUnit\Framework\TestCase;

class HexadecimalConverterTest extends TestCase
{
    private DecimalConverterInterface $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new HexadecimalConverter();
    }

    public function test_getBase()
    {
        self::assertSame(16, $this->sut->getBase());
    }

    public static function dataProvider_numerals(): iterable
    {
        return [
            [0, '0'],
            [1, '1'],
            [2, '2'],
            [3, '3'],
            [8, '8'],
            [9, '9'],
            [10, 'A'],
            [15, 'F'],
            [16, '10'],
            [17, '11'],
            [100, '64'],
            [2147483647, '7FFFFFFF'],
            [9223372036854775807, '7FFFFFFFFFFFFFFF'],
        ];
    }

    /**
     * @dataProvider dataProvider_numerals
     *
     * @param int    $decimal
     * @param string $hexadecimal
     *
     * @return void
     */
    public function test_fromDecimal(int $decimal, string $hexadecimal): void
    {
        self::assertSame($hexadecimal, $this->sut->fromDecimal($decimal));
    }

    /**
     * @dataProvider dataProvider_numerals
     *
     * @param int    $decimal
     * @param string $hexadecimal
     *
     * @return void
     */
    public function test_toDecimal(int $decimal, string $hexadecimal): void
    {
        self::assertSame($decimal, $this->sut->toDecimal($hexadecimal));
    }
}
