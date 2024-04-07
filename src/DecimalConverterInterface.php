<?php

declare(strict_types=1);

namespace carrontiger\Conversion;

/**
 * Interface for conversions from/to decimal numerals.
 *
 * @copyright {@link mailto:carrontiger@users.noreply.github.com Callum Stotter}
 * @license   {@link https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0}
 */
interface DecimalConverterInterface
{
    /**
     * Converts a decimal numeral to a numeral with a specific base ({@see DecimalConverterInterface::getBase()}).
     *
     * @param int $decimalNumeral Non-negative integer number
     *
     * @return string Numeral with a specific base ({@see DecimalConverterInterface::getBase()})
     */
    public function fromDecimal(int $decimalNumeral): string;

    /**
     * Converts numerals from a specific base ({@see DecimalConverterInterface::getBase()}) to decimal numerals-
     *
     * @param string $numeral Numeral with a specific base ({@see DecimalConverterInterface::getBase()})
     *
     * @return int Non-negative integer number
     */
    public function toDecimal(string $numeral): int;

    /**
     * Target base for conversions.
     *
     * @return int Positive integer number
     */
    public function getBase(): int;
}
