<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ShamsiDate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the value matches the Shamsi date format
        if (!preg_match('/^1[3-4]\d{6}$/', $value)) {
            $fail('The :attribute must be a valid Shamsi date in the format YYYYMMDD.');
            return;
        }

        // Extract year, month, and day
        $year = (int) substr($value, 0, 4);
        $month = (int) substr($value, 4, 2);
        $day = (int) substr($value, 6, 2);

        // Check if the year is within the allowed range
        if ($year < 1300 || $year > 1385) {
            $fail('The year in :attribute must be between 1300 and 1385.');
            return;
        }

        // Validate the date using checkdate() for Gregorian calendar
        // Note: Since this is a Shamsi date, you may need a specific function for Shamsi validation.
        if (!checkdate($month, $day, $year)) {
            $fail('The :attribute is not a valid Shamsi date.');
        }
    }
}
