<?php

declare(strict_types=1);

namespace carrontiger\Conversion;

/**
 * Conversion of decimal numerals to binary numerals and vice versa.
 */
class BinaryConverter extends AbstractDecimalConverter
{
    public function __construct()
    {
        parent::__construct('01');
    }
}
