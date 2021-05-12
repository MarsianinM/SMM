<?php

namespace Modules\Project\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Users\Entities\User;

class ClientRule implements Rule
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
        $user = User::where('id',$value)->first();
        if(is_null($user)) return false;

        return  $user->activeRoleIs('client');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('users::users.error_client');
    }
}
