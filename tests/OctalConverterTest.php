<?php

declare(strict_types=1);

namespace Test\carrontiger\Conversion;

use carrontiger\Conversion\DecimalConverterInterface;
use carrontiger\Conversion\OctalConverter;
use PHPUnit\Framework\TestCase;

class OctalConverterTest extends TestCase
{
    private DecimalConverterInterface $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new OctalConverter();
    }

    public function test_getBase()
    {
        self::assertSame(8, $this->sut->getBase());
    }

    public static function dataProvider_numerals(): iterable
    {
        return [
            [0, '0'],
            [1, '1'],
            [2, '2'],
            [3, '3'],
            [8, '10'],
            [100, '144'],
            [2147483647, '17777777777'],
            [9223372036854775807, '777777777777777777777'],
        ];
    }

    /**
     * @dataProvider dataProvider_numerals
     *
     * @param int    $decimal
     * @param string $octal
     *
     * @return void
     */
    public function test_fromDecimal(int $decimal, string $octal): void
    {
        self::assertSame($octal, $this->sut->fromDecimal($decimal));
    }

    /**
     * @dataProvider dataProvider_numerals
     *
     * @param int    $decimal
     * @param string $octal
     *
     * @return void
     */
    public function test_toDecimal(int $decimal, string $octal): void
    {
        self::assertSame($decimal, $this->sut->toDecimal($octal));
    }
}
