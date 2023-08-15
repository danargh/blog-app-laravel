<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        Log::info('This is some useful information.');
        Log::warning('Something could be going wrong.');
        Log::error('Something is really going wrong.');
        Log::critical('Something went really wrong.');

        self::assertTrue(true);
    }
}
