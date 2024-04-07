<?php

declare(strict_types=1);

namespace carrontiger\Conversion;

/**
 * Base for conversion from/to decimal numerals.
 *
 * @copyright {@link mailto:carrontiger@users.noreply.github.com Callum Stotter}
 * @license {@link https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0}
 */
abstract class AbstractDecimalConverter implements DecimalConverterInterface
{
    private int   $base;
    private array $digits;

    /**
     * @param string $digits
     */
    public function __construct(string $digits)
    {
        $this->digits = str_split($digits);
        $this->base   = count($this->digits);
    }

    public function fromDecimal(int $decimalNumeral): string
    {
        $targetNumeral = [];
        do {
            $targetNumeral[] = $this->digits[$decimalNumeral % $this->base];
            $decimalNumeral = intdiv($decimalNumeral, $this->base);
        } while ($decimalNumeral > 0);
        return implode('', array_reverse($targetNumeral));
    }

    public function toDecimal(string $numeral): int
    {
        $result = 0;
        $digitsOfNumeral = array_reverse(str_split($numeral));
        $digitMap = array_flip($this->digits);
        foreach ($digitsOfNumeral as $i => $digit) {
            $result += ($this->base ** $i) * $digitMap[$digit];
        }
        return $result;
    }

    public function getBase(): int
    {
        return $this->base;
    }
}
