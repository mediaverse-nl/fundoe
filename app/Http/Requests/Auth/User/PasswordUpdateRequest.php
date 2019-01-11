<?php

namespace App\Http\Requests\Auth\User;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
            'watchwoord' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'herhaal_watchwoord' => 'min:6'
        ];
    }
}
