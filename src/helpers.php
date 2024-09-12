<?php

use BanglaDateTime\BanglaDateTime;

/**
 * Create a new BanglaDateTime instance.
 *
 * This function initializes a new BanglaDateTime object. You can specify a date/time string
 * and a timezone. If not provided, the current date/time and UTC timezone are used by default.
 *
 * @param string|null $time The date/time string to parse. Defaults to 'now' for the current date/time.
 * @param string|null $timezone The timezone string to use. Defaults to 'UTC' if not provided.
 * @return BanglaDateTime Returns an instance of BanglaDateTime.
 */
function bangla_date_time($time = 'now', $timezone = 'UTC')
{
    return BanglaDateTime::create($time, $timezone);
}

/**
 * Format a date/time in Bangla format.
 *
 * This function formats a date/time according to the specified format string in Bangla.
 * You can provide a date/time string and a timezone. If not provided, the current date/time and
 * UTC timezone are used by default.
 *
 * @param string $format The format string defining the output format in Bangla.
 * @param string|null $time The date/time string to format. Defaults to 'now' for the current date/time.
 * @param string|null $timezone The timezone string to use for formatting. Defaults to 'UTC' if not provided.
 * @return string Returns the formatted date/time string in Bangla.
 */
function format_bangla_date($format, $time = 'now', $timezone = 'UTC')
{
    $date = bangla_date_time($time, $timezone);
    return $date->format($format);
}

/**
 * Convert a date/time to Bangla calendar format.
 *
 * This function converts a date/time to the Bangla calendar format according to the specified
 * format string. You can provide a date/time string and a timezone. If not provided, the current
 * date/time and UTC timezone are used by default.
 *
 * @param string $format The format string defining the output format in Bangla calendar.
 * @param string|null $time The date/time string to convert. Defaults to 'now' for the current date/time.
 * @param string|null $timezone The timezone string to use for conversion. Defaults to 'UTC' if not provided.
 * @return string Returns the converted date/time string in Bangla calendar format.
 */
function convert_to_bangla_calendar($format, $time = 'now', $timezone = 'UTC')
{
    $date = bangla_date_time($time, $timezone);
    return $date->toBangla($format);
}
