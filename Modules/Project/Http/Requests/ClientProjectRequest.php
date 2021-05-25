<?php

namespace Modules\Project\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Project\Rules\AuthorGroupRule;
use Modules\Project\Rules\ClientRule;
use Modules\Project\Rules\CurrencyRule;
use Modules\Project\Rules\RatesRule;
use Modules\Project\Rules\SubjectRule;

class ClientProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_id'             => ['required','integer', new ClientRule],
            'title'                 => 'required|min:10',
            'subject_id'            => ['required','integer', new SubjectRule],
            'language'              => 'required|string',
            'description'           => 'string|min:10',
            'currency_id'           => ['required','integer', new CurrencyRule],
            'rate_id'               => ['required','integer', new RatesRule],
            'moderation_comments'   => 'required|integer',
          //  'author_group_id'       => ['integer', new AuthorGroupRule],
            'notification'          => 'required|integer',
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

    /**
     * Получить пользовательские имена атрибутов для формирования ошибок валидатора.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title'         => 'Название',
            //'email' => 'email address',
        ];
    }

    /**
     * Подготовить данные для валидации.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            //'client_id' => $this->user()->id,
        ]);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'client_id.required'        => trans('project::project.error_client'),
            'client_id.integer'         => trans('project::project.error_client_integer'),
            'title.required'            => trans('project::project.error_required'),
            'body.required'             => 'A message is required',
        ];
    }
}
