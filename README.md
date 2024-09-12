# BanglaDateTime

**BanglaDateTime** is a PHP library that allows you to easily format and convert DateTime to the Bangla calendar and Bangla number formats. It supports both current time and custom dates, as well as timezones.

## Features

- Convert DateTime to Bangla format.
- Convert to the Bangla calendar (Bengali Era).
- Supports custom dates and timezones.
- Easy to use with a fluent API.
- Helper functions for easy access to common operations.

## Installation

You can install the package via [Composer](https://getcomposer.org/):

```bash
composer require bangladatetime/php
```

## Usage

To use **BanglaDateTime**, you can create a new instance of the date and time with either the current time, a specific date, or a specific timezone.

### Basic Example

```php
use BanglaDateTime\BanglaDateTime;

require __DIR__ . '/vendor/autoload.php';

// Create a BanglaDateTime instance with the current date and time, formatted in Bangla locale
$date = BanglaDateTime::create();
echo 'Current time with Bangla format: ' . $date->format('l jS F Y h:i:s');

echo '<br>';

// Create a BanglaDateTime instance with the current date and time, converted to the Bangla calendar
$date = BanglaDateTime::create();
echo 'Current time converted to Bangla: ' . $date->toBangla('l jS F Y h:i:s');
```

**Output:**
```
Current time with Bangla format: বৃহস্পতিবার ১২ই সেপ্টেম্বর ২০২৪ ০৩:৩৭:০৩
Current time converted to Bangla: বৃহস্পতিবার ২৮শে ভাদ্র ১৪৩১ ০৩:৩৭:০৩
```

### Setting a Custom Date

You can also specify a custom date when creating the `BanglaDateTime` instance:

```php
// Create a BanglaDateTime instance with a custom date ('2023-04-13'), formatted in Bangla locale
$date = BanglaDateTime::create('2023-04-13');
echo 'Set Time with Bangla format: ' . $date->format('l jS F Y h:i:s');

echo '<br>';

// Create a BanglaDateTime instance with a custom date ('2023-04-13'), converted to the Bangla calendar
$date = BanglaDateTime::create('2023-04-13');
echo 'Set Time & converted to Bangla: ' . $date->toBangla('l jS F Y h:i:s');
```

**Output:**
```
Set Time with Bangla format: বৃহস্পতিবার ১৩ই এপ্রিল ২০২৩ ১২:০০:০০
Set Time & converted to Bangla: বৃহস্পতিবার ৩০শে চৈত্র ১৪২৯ ১২:০০:০০
```

### Working with Timezones

You can also pass a timezone when creating the `BanglaDateTime` instance:

```php
// Create a BanglaDateTime instance with the current time and a specific timezone ('Asia/Dhaka'), formatted in Bangla locale
$date = BanglaDateTime::create('now', 'Asia/Dhaka');
echo 'Set Time & Time Zone with Bangla format: ' . $date->format('l jS F Y h:i:s');

echo '<br>';

// Create a BanglaDateTime instance with the current time and a specific timezone ('Asia/Dhaka'), converted to the Bangla calendar
$date = BanglaDateTime::create('now', 'Asia/Dhaka');
echo 'Set Time & Time Zone & converted to Bangla: ' . $date->toBangla('l jS F Y h:i:s');
```

**Output:**
```
Set Time & Time Zone with Bangla format: বৃহস্পতিবার ১২ই সেপ্টেম্বর ২০২৪ ০৯:৩৭:০৩
Set Time & Time Zone & converted to Bangla: বৃহস্পতিবার ২৮শে ভাদ্র ১৪৩১ ০৯:৩৭:০৩
```

## API

### `BanglaDateTime::create($time = 'now', $timezone = 'UTC')`

Creates a new `BanglaDateTime` instance.

- **`$time`**: The date and time to use (optional, defaults to `'now'`).
- **`$timezone`**: The timezone to use (optional, defaults to `'UTC'`).

### `format($format)`

Formats the date and time using a specified format, with the output in the Bangla locale.

- **`$format`**: The format string (same as PHP's `DateTime::format`).

### `toBangla($format)`

Converts and formats the date and time into the Bangla calendar and Bangla numbers.

- **`$format`**: The format string (same as PHP's `DateTime::format`).


## Helper Functions

**BanglaDateTime** provides the following global helper functions for easy access:

- **`bangla_date_time($time = 'now', $timezone = 'UTC')`**: Creates a new `BanglaDateTime` instance.

    ```php
    $date = bangla_date_time('2023-04-13', 'Asia/Dhaka');
    ```

- **`format_bangla_date($format, $time = 'now', $timezone = 'UTC')`**: Formats a date/time in Bangla format.

    ```php
    echo format_bangla_date('l jS F Y h:i:s');
    ```

- **`convert_to_bangla_calendar($format, $time = 'now', $timezone = 'UTC)`**: Converts a date/time to Bangla calendar format.

    ```php
    echo convert_to_bangla_calendar('l jS F Y h:i:s');
    ```

## Contributing

Feel free to contribute by submitting a pull request or opening an issue. Your contributions are highly appreciated!

## License

This library is open-sourced software licensed under the [MIT license](LICENSE).