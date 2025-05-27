<?php

namespace LeTraceurSnork\CopyrightYearRange;

/**
 * A simple utility for generating dynamic copyright year ranges.
 *
 * This class provides a static method to format copyright years,
 * automatically handling cases where the input year matches the current year.
 */
class CopyrightHelper
{
    /**
     * @var string sprintf-compatible format for year range output.
     */
    protected static $format = '%1$s - %2$s';

    /**
     * Generates a copyright string based on the input year.
     *
     * - If the input year matches the current year, returns it as a string.
     * - Otherwise, returns a formatted range (e.g., "2020 - 2023").
     *
     * @param int|string $inputYear The base year (e.g., initial creation year).
     *
     * @return string Formatted copyright string.
     *
     * @example
     * CopyrightHelper::getCopyrightString(2020); // "2020 - 2023" (current year: 2023)
     * CopyrightHelper::getCopyrightString(2023); // "2023"
     */
    public static function getCopyrightString($inputYear)
    {
        $currentYear = date('Y');

        if ($inputYear == $currentYear) {
            return (string)$inputYear;
        }

        return sprintf(self::$format, $inputYear, $currentYear);
    }

    /**
     * Sets the new copyright format
     *
     * @param string $newFormat
     *
     * @return void
     */
    public static function setFormat($newFormat)
    {
        static::$format = $newFormat;
    }
}
