<?php

namespace BanglaDateTime\Tests;

use BanglaDateTime\BanglaDateTime;
use PHPUnit\Framework\TestCase;

class BanglaDateTimeTest extends TestCase
{
    public function test_it_can_create_a_bangla_date_time_instance()
    {
        $date = BanglaDateTime::create();
        $this->assertInstanceOf(BanglaDateTime::class, $date);
    }

    public function test_it_can_format_date_in_bangla()
    {
        $date = BanglaDateTime::create('2023-04-13');
        $formattedDate = $date->format('l jS F Y');
        $this->assertEquals('বৃহস্পতিবার ১৩ই এপ্রিল ২০২৩', $formattedDate);
    }

    public function test_it_can_convert_to_bangla_calendar()
    {
        $date = BanglaDateTime::create('2023-04-13');
        $banglaDate = $date->toBangla('l jS F Y');
        $this->assertEquals('বৃহস্পতিবার ৩০শে চৈত্র ১৪২৯', $banglaDate);
    }

    public function test_it_can_set_a_time_zone()
    {
        $date = BanglaDateTime::create('now', 'Asia/Dhaka');
        $formattedDate = $date->format('l jS F Y h:i:s');
        $this->assertNotEmpty($formattedDate);
    }
}