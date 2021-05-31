<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUserRequest extends FormRequest
{
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            /* ***** NAME ***** */
            'user.persona.title'                        => 'nullable|min:1|max:8',
            'user.persona.last_name'                    => 'required|string|min:1|max:32',
            'user.persona.first_name'                   => 'required|string|min:1|max:32',
            'user.persona.middle_name'                  => 'nullable|string|min:1|max:32',
            /* ***** EMAIL ***** */
            'user.email'                                => 'required|email|string|min:1|max:64',
            /* ***** DEMOGRAPHICS ***** */
            'user.persona.gender'                       => 'nullable|string|min:1|max:12',
            'user.persona.date_of_birth.month'          => 'required|digits_between:1,2',
            'user.persona.date_of_birth.day'            => 'required|digits_between:1,2',
            'user.persona.date_of_birth.year'           => 'required|digits_between:1,4',
            'user.persona.language'                     => 'required|string|min:1|max:5',
        ];
    }
}
