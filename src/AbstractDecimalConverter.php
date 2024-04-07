<?php

declare(strict_types=1);

namespace carrontiger\Conversion;

use InvalidArgumentException;

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
        if ($decimalNumeral < 0) {
            throw new InvalidArgumentException(sprintf('Only positive integer numbers can be converted: %d', $decimalNumeral));
        }
        $targetNumeral = [];
        do {
            $targetNumeral[] = $this->digits[$decimalNumeral % $this->base];
            $decimalNumeral = intdiv($decimalNumeral, $this->base);
        } while ($decimalNumeral > 0);
        return implode('', array_reverse($targetNumeral));
    }


    private function assertNonEmptyNumeral(string $numeral): void
    {
        if ('' === $numeral) {
            throw new InvalidArgumentException('An empty string cannot be interpreted as a numeral.');
        }
    }
    private function assertValidNumeral(string $numeral, array $digitsOfNumeral): void
    {
        $invalidDigits = array_diff(array_unique($digitsOfNumeral), $this->digits);
        if (!empty($invalidDigits)) {
            throw new InvalidArgumentException(
                sprintf(
                    'The value "%s" cannot be interpreted as a numeral of %s, because it contains unexpected "digits": %s',
                    $numeral,
                    substr(strrchr(static::class, '\\'), 1),
                    str_replace($this->digits, '', $numeral)
                )
            );
        }
    }

    public function toDecimal(string $numeral): int
    {
        $this->assertNonEmptyNumeral($numeral);
        $digitsOfNumeral = array_reverse(str_split($numeral));
        $this->assertValidNumeral($numeral, $digitsOfNumeral);
        $digitMap = array_flip($this->digits);
        $result = 0;
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
