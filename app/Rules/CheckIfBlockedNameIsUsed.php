<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckIfBlockedNameIsUsed implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array(strtolower((string) $value), config('writemv.blocked_names'), true) ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This name cannot be used.';
    }
}
