<?php

namespace Modules\UserBlackList\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlackListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'string|min:3',
            //'type'  => 'int',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
