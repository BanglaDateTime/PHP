<?php

namespace BanglaDateTime\Support;

use BanglaDateTime\Traits\HasBanglaSuffix;
use DateTime;
use DateTimeZone;

class BanglaDateCalculator
{
    use HasBanglaSuffix;

    private DateTime $currentDate;
    private DateTime $banglaNewYear;
    private array $banglaDate = [];

    private array $daysInMonths = [
        ['name' => 'বৈশাখ', 'days' => 31],
        ['name' => 'জৈষ্ঠ্য', 'days' => 31],
        ['name' => 'আষাঢ়', 'days' => 31],
        ['name' => 'শ্রাবণ', 'days' => 31],
        ['name' => 'ভাদ্র', 'days' => 31],
        ['name' => 'আশ্বিন', 'days' => 31],
        ['name' => 'কার্তিক', 'days' => 30],
        ['name' => 'অগ্রহায়ণ', 'days' => 30],
        ['name' => 'পৌষ', 'days' => 30],
        ['name' => 'মাঘ', 'days' => 30],
        ['name' => 'ফাল্গুন', 'days' => 29], // Leap year adjustment handled later
        ['name' => 'চৈত্র', 'days' => 30],
    ];

    /**
     * Constructor initializes the current date and Bangla New Year.
     *
     * @param DateTime $dateTime The current date and time.
     * @param DateTimeZone $timezone The timezone to use.
     */
    public function __construct(DateTime $dateTime, DateTimeZone $timezone)
    {
        $this->currentDate = $dateTime;
        $this->banglaNewYear = new DateTime($this->currentDate->format('Y') . '-04-14', $timezone);
        $this->banglaDate = $this->calculateBanglaDate();
    }

    /**
     * Calculates the Bangla date details.
     *
     * @return array The Bangla date details.
     */
    private function calculateBanglaDate(): array
    {
        $this->adjustForLeapYear();

        $banglaYear = $this->getBanglaYear();
        $dayDifference = $this->getDayDifference();
        $monthData = $this->getBanglaMonthAndDay($dayDifference);

        return [
            'name' => $monthData['name'] ?? '',
            'day' => $monthData['day'] ?? 0,
            'month' => $monthData['month'] ?? 0,
            'week' => $monthData['week'] ?? 0,
            'days_in_month' => $monthData['days'] ?? 0,
            'days_in_year' => $dayDifference,
            'weeks_in_year' => intdiv($dayDifference, 7),
            'year' => $banglaYear,
            'short_year' => str_pad($banglaYear % 100, 2, '0', STR_PAD_LEFT),
        ];
    }

    /**
     * Checks if the given year is a leap year.
     *
     * @param int $year The year to check.
     * @return bool True if leap year, false otherwise.
     */
    private function isLeapYear(int $year): bool
    {
        return ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
    }

    /**
     * Checks if the current date is before the Bangla New Year.
     *
     * @return bool True if before New Year, false otherwise.
     */
    private function isBeforeNewYear(): bool
    {
        return $this->currentDate < $this->banglaNewYear;
    }

    /**
     * Adjusts the number of days in February for leap years.
     *
     * @return void
     */
    private function adjustForLeapYear(): void
    {
        if ($this->isLeapYear((int) $this->currentDate->format('Y')) && $this->currentDate->format('z') >= 59) {
            $this->daysInMonths[10]['days'] = 30;
        }
    }

    /**
     * Gets the Bangla year based on the current date.
     *
     * @return int The Bangla year.
     */
    private function getBanglaYear(): int
    {
        if ($this->isBeforeNewYear()) {
            $this->banglaNewYear = new DateTime(($this->currentDate->format('Y') - 1) . '-04-14');
            return $this->currentDate->format('Y') - 594;
        }

        return $this->currentDate->format('Y') - 593;
    }

    /**
     * Calculates the difference in days between the current date and Bangla New Year.
     *
     * @return int The number of days.
     */
    private function getDayDifference(): int
    {
        return $this->currentDate->diff($this->banglaNewYear)->days;
    }

    /**
     * Determines the Bangla month and day based on the day difference.
     *
     * @param int $dayDifference The difference in days.
     * @return array The Bangla month and day data.
     */
    private function getBanglaMonthAndDay(int $dayDifference): array
    {
        foreach ($this->daysInMonths as $monthNumber => $month) {
            if ($dayDifference < $month['days']) {
                return [
                    'name' => $month['name'],
                    'day' => $dayDifference + 1,
                    'month' => $monthNumber + 1,
                    'days' => $month['days'],
                    'week' => intdiv($dayDifference, 7),
                ];
            }
            $dayDifference -= $month['days'];
        }

        return [];
    }

    /**
     * Formats the Bangla date according to the provided format string.
     *
     * @param string $format The format string.
     * @return string The formatted date string.
     */
    public function format(string $format): string
    {
        // Map format placeholders to Bangla date components
        $replacements = [
            'd' => $this->banglaDate['day'],
            'j' => $this->banglaDate['day'],
            'm' => $this->banglaDate['month'],
            'n' => $this->banglaDate['month'],
            'F' => $this->banglaDate['name'],
            'M' => $this->banglaDate['name'],
            'Y' => $this->banglaDate['year'],
            'o' => $this->banglaDate['year'],
            'X' => $this->banglaDate['year'],
            'x' => $this->banglaDate['year'],
            'y' => $this->banglaDate['short_year'],
            't' => $this->banglaDate['days_in_month'],
            'W' => $this->banglaDate['weeks_in_year'],
            'z' => $this->banglaDate['days_in_year'],
            'S' => $this->getSuffixForDate($this->banglaDate['day']),
        ];

        // Replace placeholders in the format string
        $formattedDate = strtr($format, $replacements);

        return $this->currentDate->format($formattedDate);
    }
}
