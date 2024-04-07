<?php

declare(strict_types=1);

namespace Test\carrontiger\Conversion;

use carrontiger\Conversion\CaseSensitiveAlphaDecimalConverter;
use carrontiger\Conversion\DecimalConverterInterface;
use PHPUnit\Framework\TestCase;

class CaseSensitiveAlphaDecimalConverterTest extends TestCase
{
    private DecimalConverterInterface $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new CaseSensitiveAlphaDecimalConverter();
    }

    public function test_getBase()
    {
        self::assertSame(62, $this->sut->getBase());
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
            [36, 'a'],
            [37, 'b'],
            [61, 'z'],
            [62, '10'],
            [63, '11'],
            [100, '1c'],
            [2147483647, '2LKcb1'],
            [9223372036854775807, 'AzL8n0Y58m7'],
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
