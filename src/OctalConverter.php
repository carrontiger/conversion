<?php

declare(strict_types=1);

namespace carrontiger\Conversion;

/**
 * Conversion of decimal numerals to octal numerals and vice versa.
 */
class OctalConverter extends AbstractDecimalConverter
{
    public function __construct()
    {
        parent::__construct('01234567');
    }
}
