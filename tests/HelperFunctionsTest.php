<?php

namespace BanglaDateTime\Tests;

use BanglaDateTime\BanglaDateTime;
use PHPUnit\Framework\TestCase;

class HelperFunctionsTest extends TestCase
{
    public function test_it_can_create_a_bangla_date_time_instance()
    {
        $date = bangla_date_time();
        $this->assertInstanceOf(BanglaDateTime::class, $date);
    }

    public function test_it_can_format_date_in_bangla()
    {
        $formattedDate = format_bangla_date('l jS F Y', '2023-04-13');
        $this->assertEquals('বৃহস্পতিবার ১৩ই এপ্রিল ২০২৩', $formattedDate);
    }

    public function test_it_can_convert_to_bangla_calendar()
    {
        $banglaDate = convert_to_bangla_calendar('l jS F Y','2023-04-13');
        $this->assertEquals('বৃহস্পতিবার ৩০শে চৈত্র ১৪২৯', $banglaDate);
    }

    public function test_it_can_set_a_time_zone()
    {
        $date = bangla_date_time('now', 'Asia/Dhaka');
        $formattedDate = $date->format('l jS F Y h:i:s');
        $this->assertNotEmpty($formattedDate);
    }
}
