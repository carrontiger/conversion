<?php

declare(strict_types=1);

namespace carrontiger\Conversion;

/**
 * Conversion of decimal numerals to alpha-decimal numerals and vice versa.
 */
class CaseSensitiveAlphaDecimalConverter extends AbstractDecimalConverter
{
    public function __construct()
    {
        parent::__construct('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
    }
}
