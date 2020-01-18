<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signUpRequest extends FormRequest
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
            "name"     => "required|min:2|max:50",
            "email"    => "required|email|unique:users,email",
            "password" => "confirmed|required|min:4|max:6",
        ];
    }
}
