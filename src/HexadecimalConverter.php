<?php

declare(strict_types=1);

namespace carrontiger\Conversion;

/**
 * Conversion of decimal numerals to hexadecimal numerals and vice versa.
 */
class HexadecimalConverter extends AbstractDecimalConverter
{
    public function __construct()
    {
        parent::__construct('0123456789ABCDEF');
    }
}
