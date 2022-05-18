<?php

namespace App\Rules;

use App\Models\Reference;
use Illuminate\Contracts\Validation\Rule;

class SettingValueRule implements Rule
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
        $references = Reference::where('id', $value)->where('code', 'overtime_method')->first();

        if (!$references) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Value tidak valid.';
    }
}
