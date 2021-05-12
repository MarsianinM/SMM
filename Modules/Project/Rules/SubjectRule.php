<?php

namespace Modules\Project\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Subjects\Entities\Subject;

class SubjectRule implements Rule
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
        return  (is_null(Subject::where('id',$value)->first()) ? false : true);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('subjects::subject.error_subject');
    }
}
