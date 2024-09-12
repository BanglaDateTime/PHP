<?php

namespace BanglaDateTime\Support;

class BanglaFormatter
{
    private array $englishToBanglaNumbers = [
        '0' => '০', '1' => '১', '2' => '২', '3' => '৩',
        '4' => '৪', '5' => '৫', '6' => '৬', '7' => '৭',
        '8' => '৮', '9' => '৯',
    ];

    private array $englishToBanglaAmPm = [
        'AM' => 'পূর্বাহ্ণ',
        'PM' => 'অপরাহ্ণ',
        'am' => 'পূর্বাহ্ণ',
        'pm' => 'অপরাহ্ণ',
    ];

    private array $englishToBanglaFullMonths = [
        'January' => 'জানুয়ারি',
        'February' => 'ফেব্রুয়ারি',
        'March' => 'মার্চ',
        'April' => 'এপ্রিল',
        'May' => 'মে',
        'June' => 'জুন',
        'July' => 'জুলাই',
        'August' => 'আগস্ট',
        'September' => 'সেপ্টেম্বর',
        'October' => 'অক্টোবর',
        'November' => 'নভেম্বর',
        'December' => 'ডিসেম্বর',
    ];

    private array $englishToBanglaShortMonths = [
        'Jan' => 'জানুয়ারি',
        'Feb' => 'ফেব্রুয়ারি',
        'Mar' => 'মার্চ',
        'Apr' => 'এপ্রিল',
        'May' => 'মে',
        'Jun' => 'জুন',
        'Jul' => 'জুলাই',
        'Aug' => 'অগাস্ট',
        'Sep' => 'সেপ্টেম্বর',
        'Oct' => 'অক্টোবর',
        'Nov' => 'নভেম্বর',
        'Dec' => 'ডিসেম্বর',
    ];

    private array $englishToBanglaFullDays = [
        'Sunday' => 'রবিবার',
        'Monday' => 'সোমবার',
        'Tuesday' => 'মঙ্গলবার',
        'Wednesday' => 'বুধবার',
        'Thursday' => 'বৃহস্পতিবার',
        'Friday' => 'শুক্রবার',
        'Saturday' => 'শনিবার',
    ];

    private array $englishToBanglaShortDays = [
        'Sun' => 'রবি',
        'Mon' => 'সোম',
        'Tue' => 'মঙ্গল',
        'Wed' => 'বুধ',
        'Thu' => 'বৃহস্পতি',
        'Fri' => 'শুক্র',
        'Sat' => 'শনি',
    ];

    /**
     * Converts English text to Bangla representation based on predefined mappings.
     *
     * @param string $text
     * @return string
     */
    public function toBangla(string $text): string
    {
        $translationMap = array_merge(
            $this->englishToBanglaNumbers,
            $this->englishToBanglaAmPm,
            $this->englishToBanglaFullMonths,
            $this->englishToBanglaShortMonths,
            $this->englishToBanglaFullDays,
            $this->englishToBanglaShortDays
        );

        return strtr($text, $translationMap);
    }
}
