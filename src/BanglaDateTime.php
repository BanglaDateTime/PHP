<?php

namespace BanglaDateTime;

use BanglaDateTime\Support\BanglaDateCalculator;
use BanglaDateTime\Support\BanglaFormatter;
use BanglaDateTime\Traits\HasBanglaSuffix;
use DateTime;
use DateTimeZone;

class BanglaDateTime
{
    use HasBanglaSuffix;

    private DateTime $dateTime;
    private BanglaDateCalculator $banglaDateCalculator;
    private BanglaFormatter $formatter;

    /**
     * Creates a new instance of BanglaDateTime.
     *
     * @param string $time
     * @param string $timezone
     */
    private function __construct(string $time, string $timezone)
    {
        $this->dateTime = $this->createDateTime($time, $timezone);
        $this->banglaDateCalculator = new BanglaDateCalculator($this->dateTime, new DateTimeZone($timezone));
        $this->formatter = new BanglaFormatter();
    }

    /**
     * Factory method to create an instance of BanglaDateTime.
     *
     * @param string $time
     * @param string $timezone
     * @return self
     */
    public static function create(string $time = 'now', string $timezone = 'UTC'): self
    {
        return new self($time, $timezone);
    }

    /**
     * Formats the date into the given format with Bangla suffixes and formatting applied.
     *
     * @param string $format
     * @return string
     */
    public function format(string $format = 'Y-m-d'): string
    {
        $formattedDate = $this->dateTime->format($this->applyBanglaSuffix($format));
        return $this->formatter->toBangla($formattedDate);
    }

    /**
     * Converts and formats the date using the Bangla date calculator.
     *
     * @param string $format
     * @return string
     */
    public function toBangla(string $format = 'Y-m-d'): string
    {
        $formattedDate = $this->banglaDateCalculator->format($format);
        return $this->formatter->toBangla($formattedDate);
    }

    /**
     * Creates a DateTime object with the provided time and timezone.
     *
     * @param string $time
     * @param string $timezone
     * @return DateTime
     */
    private function createDateTime(string $time, string $timezone): DateTime
    {
        return new DateTime($time, new DateTimeZone($timezone));
    }
}
