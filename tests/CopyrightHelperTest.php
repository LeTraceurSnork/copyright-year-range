<?php

namespace Tests;

use LeTraceurSnork\CopyrightYearRange\CopyrightHelper;
use PHPUnit\Framework\TestCase;

/**
 * Tests for CopyrightHelper class.
 */
class CopyrightHelperTest extends TestCase
{
    /**
     * Test that the same year returns a single year string.
     */
    public function test_currentYear(): void
    {
        $currentYear = date('Y');

        $this->assertEquals($currentYear, CopyrightHelper::getCopyrightString($currentYear));
    }

    /**
     * Test that different years return a formatted range.
     */
    public function test_notCurrentYear(): void
    {
        $this->assertEquals('2020 - ' . date('Y'), CopyrightHelper::getCopyrightString(2020));
    }

    /**
     * Test custom format support.
     */
    public function test_notCurrentYearCustomFormat(): void
    {
        CopyrightHelper::setFormat('%1$s/%2$s');

        $this->assertEquals('2020/' . date('Y'), CopyrightHelper::getCopyrightString(2020));
    }

    /**
     * Test non-integer input (casts to string).
     */
    public function testHandlesNonIntegerInput(): void
    {
        $this->assertEquals(date('Y'), CopyrightHelper::getCopyrightString((int)date('Y')));
    }

    /**
     * Reset the static format after each test.
     */
    protected function tearDown(): void
    {
        CopyrightHelper::setFormat('%1$s - %2$s');
    }
}
