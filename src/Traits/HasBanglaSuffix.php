<?php

namespace BanglaDateTime\Traits;

trait HasBanglaSuffix
{
    private static array $banglaSuffix = ['', 'লা', 'রা', 'রা', 'ঠা', 'ই', 'শে'];

    /**
     * Replaces the 'S' placeholder in the format string with the corresponding Bangla suffix.
     *
     * @param string $format
     * @return string
     */
    public function applyBanglaSuffix(string $format): string
    {
        $suffix = $this->resolveBanglaSuffix((int) $this->getDayOfMonth());
        return str_replace('S', $suffix, $format);
    }

    /**
     * Retrieves the Bangla suffix for the given date.
     *
     * @param int $date
     * @return string
     */
    public function getSuffixForDate(int $date): string
    {
        return $this->resolveBanglaSuffix($date);
    }

    /**
     * Resolves the appropriate Bangla suffix based on the given date.
     *
     * @param int $date
     * @return string
     */
    private function resolveBanglaSuffix(int $date): string
    {
        if ($date >= 19) {
            return self::$banglaSuffix[6];
        }

        if ($date > 4) {
            return self::$banglaSuffix[5];
        }

        return self::$banglaSuffix[$date];
    }

    /**
     * Gets the day of the month from the DateTime object.
     *
     * @return int
     */
    private function getDayOfMonth(): int
    {
        return (int) $this->dateTime->format('j');
    }
}
