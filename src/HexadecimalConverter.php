<?php

declare(strict_types=1);

namespace carrontiger\Conversion;

/**
 * Conversion of decimal numerals to hexadecimal numerals and vice versa.
 *
 * @copyright {@link mailto:carrontiger@users.noreply.github.com Callum Stotter}
 * @license   {@link https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0}
 */
class HexadecimalConverter extends AbstractDecimalConverter
{
    public function __construct()
    {
        parent::__construct('0123456789ABCDEF');
    }
}
