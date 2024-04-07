<?php

declare(strict_types=1);

namespace Test\carrontiger\Conversion;

use carrontiger\Conversion\CaseInsensitiveAlphaDecimalConverter;
use carrontiger\Conversion\DecimalConverterInterface;
use PHPUnit\Framework\TestCase;

class CaseInsensitiveAlphaDecimalConverterTest extends TestCase
{
    private DecimalConverterInterface $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new CaseInsensitiveAlphaDecimalConverter();
    }

    public function test_getBase()
    {
        self::assertSame(36, $this->sut->getBase());
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
            [16, 'G'],
            [17, 'H'],
            [35, 'Z'],
            [36, '10'],
            [37, '11'],
            [100, '2S'],
            [2147483647, 'ZIK0ZJ'],
            [9223372036854775807, '1Y2P0IJ32E8E7'],
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

    public static function dataProvider_toDecimal_caseInsensitive(): iterable
    {
        return [
            [10, 'a'],
            [10, 'A'],
            [15, 'f'],
            [15, 'F'],
            [16, 'g'],
            [16, 'G'],
            [17, 'h'],
            [17, 'H'],
            [35, 'z'],
            [35, 'Z'],
            [2147483647, 'zik0zj'],
            [2147483647, 'ZIK0ZJ'],
            [9223372036854775807, '1y2p0ij32e8e7'],
            [9223372036854775807, '1Y2P0IJ32E8E7'],
        ];
    }

    /**
     * @dataProvider dataProvider_toDecimal_caseInsensitive
     *
     * @param int    $decimal
     * @param string $hexadecimal
     *
     * @return void
     */
    public function test_toDecimal_caseInsensitive(int $decimal, string $hexadecimal): void
    {
        self::assertSame($decimal, $this->sut->toDecimal($hexadecimal));
    }
}
