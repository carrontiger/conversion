# Conversion

Conversion from/to decimal numerals

## Comparison of Converters

### Examples

| Converter                                | Result of ``toDecimal()`` |     Result of ``fromDecimal()`` |
|------------------------------------------|--------------------------:|--------------------------------:|
| ``BinaryConverter``                      |                2147483647 | 1111111111111111111111111111111 |
| ``OctalConverter``                       |                2147483647 |                     17777777777 |
| ``HexadecimalConverter``                 |                2147483647 |                        7FFFFFFF |
| ``CaseInsensitiveAlphaDecimalConverter`` |                2147483647 |                          ZIK0ZJ |
| ``CaseSensitiveAlphaDecimalConverter``   |                2147483647 |                          2LKcb1 |
| ``AsciiDecimalConverter``                |                2147483647 |                           Rll}& |

### Meta Information

| Converter                                | Base | "Digits"                                                                                            |
|------------------------------------------|-----:|-----------------------------------------------------------------------------------------------------|
| ``BinaryConverter``                      |    2 | ``01``                                                                                              |
| ``OctalConverter``                       |    8 | ``01234567``                                                                                        |
| ``HexadecimalConverter``                 |   16 | ``0123456789ABCDEF``                                                                                |
| ``CaseInsensitiveAlphaDecimalConverter`` |   36 | ``0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ``                                                            |
| ``CaseSensitiveAlphaDecimalConverter``   |   62 | ``0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz``                                  |
| ``AsciiDecimalConverter``                |   94 | ``0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!"#$%&'()*+,-./:;<=>?@[\]^_`{\|}~`` |

## Individual Examples

### Binary Numerals

##### Conversion of decimal numeral to a binary numeral

```php
use carrontiger\Conversion\BinaryConverter;

$binaryConverter = new BinaryConverter();

echo $binaryConverter->fromDecimal(123);
//  "01111011"
```

##### Conversion of binary numeral to a decimal numeral

```php
use carrontiger\Conversion\BinaryConverter;

$binaryConverter = new BinaryConverter();

echo $binaryConverter->toDecimal('01111011');
//  123
```

### Octal Numerals

##### Conversion of decimal numeral to a octal numeral

```php
use carrontiger\Conversion\OctalConverter;

$octalConverter = new OctalConverter();

echo $octalConverter->fromDecimal(123);
//  "173"
```

##### Conversion of octal numeral to a decimal numeral

```php
use carrontiger\Conversion\BinaryConverter;

$octalConverter = new OctalConverter();

echo $octalConverter->toDecimal('173');
//  123
```

### Hexadecimal Numerals

##### Conversion of decimal numeral to a hexadecimal numeral

```php
use carrontiger\Conversion\HexadecimalConverter;

$hexadecimalConverter = new HexadecimalConverter()

echo $hexadecimalConverter->fromDecimal(123);
//  "7B"
```

##### Conversion of hexadecimal numeral to a decimal numeral

```php
use carrontiger\Conversion\HexadecimalConverter;

$hexadecimalConverter = new HexadecimalConverter();

echo $hexadecimalConverter->toDecimal('7B');
//  123
```

### Case-Insensitive Alpha-Decimal Numerals

##### Conversion of decimal numeral to a case-insensitive alpha-decimal numeral

```php
use carrontiger\Conversion\CaseInsensitiveAlphaDecimalConverter;

$ciAlphaDecimalConverter = new CaseInsensitiveAlphaDecimalConverter()

echo $ciAlphaDecimalConverter->fromDecimal(123);
//  "3F"
```

##### Conversion of a case-insensitive alpha-decimal numeral to a decimal numeral

```php
use carrontiger\Conversion\CaseInsensitiveAlphaDecimalConverter;

$ciAlphaDecimalConverter = new CaseInsensitiveAlphaDecimalConverter();

echo $ciAlphaDecimalConverter->toDecimal('3F');
//  123
```

### Case-Sensitive Alpha-Decimal Numerals

##### Conversion of decimal numeral to a case-sensitive alpha-decimal numeral

```php
use carrontiger\Conversion\CaseSensitiveAlphaDecimalConverter;

$alphaDecimalConverter = new CaseSensitiveAlphaDecimalConverter()

echo $alphaDecimalConverter->fromDecimal(123);
//  "1z"
```

##### Conversion of a case-sensitive alpha-decimal numeral to a decimal numeral

```php
use carrontiger\Conversion\CaseSensitiveAlphaDecimalConverter;

$alphaDecimalConverter = new CaseSensitiveAlphaDecimalConverter();

echo $alphaDecimalConverter->toDecimal('1z');
//  123
```

### ASCII-Numerals

##### Conversion of decimal numeral to an ASCII numeral

```php
use carrontiger\Conversion\AsciiDecimalConverter;

$asciiDecimalConverter = new AsciiDecimalConverter()

echo $asciiDecimalConverter->fromDecimal(123);
//  "1T"
```

##### Conversion of a ASCII numeral numeral to a decimal numeral

```php
use carrontiger\Conversion\AsciiDecimalConverter;

$asciiDecimalConverter = new AsciiDecimalConverter()

echo $asciiDecimalConverter->toDecimal('1T');
//  123
```
