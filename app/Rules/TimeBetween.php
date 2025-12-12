<?php

namespace App\Rules;

use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Convert input into Carbon instance
        $pickupDate = Carbon::parse($value);

        // Extract only the time portion
        $pickupTime = Carbon::createFromTime(
            $pickupDate->hour,
            $pickupDate->minute,
            $pickupDate->second
        );

        // Allowed time range
        $earliestTime = Carbon::createFromTimeString('17:00:00');
        $latestTime   = Carbon::createFromTimeString('23:00:00');

        // Validate time
        if (! $pickupTime->between($earliestTime, $latestTime)) {
            $fail('Please choose a time between 17:00 and 23:00.');
        }
    }
}
