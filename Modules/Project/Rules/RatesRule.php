<?php

namespace Modules\Project\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Rates\Entities\Rate;

class RatesRule implements Rule
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
        return  (is_null(Rate::where('id',$value)->first()) ? false : true);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('rates::rates.error_rates');
    }
}
