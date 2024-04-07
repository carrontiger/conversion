<?php

declare(strict_types=1);

namespace Test\carrontiger\Conversion;

use carrontiger\Conversion\AsciiDecimalConverter;
use carrontiger\Conversion\DecimalConverterInterface;
use PHPUnit\Framework\TestCase;

class AsciiDecimalConverterTest extends TestCase
{
    private DecimalConverterInterface $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new AsciiDecimalConverter();
    }

    public function test_getBase()
    {
        self::assertSame(94, $this->sut->getBase());
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
            [62, '!'],
            [63, '"'],
            [93, '~'],
            [94, '10'],
            [95, '11'],
            [100, '16'],
            [2147483647, 'Rll}&'],
            [9223372036854775807, 'G99F2ra^OZ'],
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
