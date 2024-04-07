<?php

declare(strict_types=1);

namespace carrontiger\Conversion;

interface DecimalConverterInterface
{
    public function fromDecimal(int $decimalNumeral): string;
    public function toDecimal(string $numeral): int;
    public function getBase(): int;
}
