<?php

declare(strict_types=1);

namespace carrontiger\Conversion;

/**
 * Conversion of decimal numerals to "ASCII"-decimal numerals and vice versa.
 *
 * The following 94 non-whitespace ASCII characters will be used for encoding:
 *
 * ``0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~``
 *
 * @copyright {@link mailto:carrontiger@users.noreply.github.com Callum Stotter}
 * @license   {@link https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0}
 */
class AsciiDecimalConverter extends AbstractDecimalConverter
{
    public function __construct()
    {
        parent::__construct('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!"#$%&\'()*+,-./:;<=>?@[\\]^_`{|}~');
    }
}
