
# Number to Words PHP Library

This library converts a number into words. It is a simple class library that can easily be installed and configured.

## Installation

To install the library, simply run the following command:


composer require your-username/number-to-words


## Usage

To use the library, simply create a new `NumberToWords` object and pass the number you want to convert to the constructor. For example:

php
$numberToWords = new NumberToWords(12345);


The `NumberToWords` object will then have a `getWords()` method that you can use to get the number in words. For example:

php
$words = $numberToWords->getWords();


The `getWords()` method will return a string with the number in words. In this case, the string will be "one thousand two hundred thirty-four".

## Configuration

The `NumberToWords` class has a few configuration options that you can set. These options are:

* `locale`: The locale to use for the number conversion. The default locale is "en_US".
* `use_short_forms`: Whether or not to use short forms for the number conversion. The default value is `true`.

To set the configuration options, simply pass them to the constructor of the `NumberToWords` object. For example:

php
$numberToWords = new NumberToWords(12345, "en_GB", false);
```

## Example

The following code shows an example of how to use the library:

```php
<?php

require_once 'vendor/autoload.php';

use YourUsername\NumberToWords;

$numberToWords = new NumberToWords(12345);

$words = $numberToWords->getWords();

echo $words;

?>
```

This code will print the following output:

```
one thousand two hundred thirty-four
```

## Documentation

The full documentation for the library is available at:

https://your-username.github.io/number-to-words/

## License

The library is licensed under the MIT License.
```

I hope this helps!