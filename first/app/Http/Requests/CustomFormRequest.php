<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomFormRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
            'confirm_password' => ['required'],
            'file' => ['required', 'mimes:png'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field dite hbe',
            'email.email' => 'valid email hote hbe',
            'password.confirmed' => 'Passwrd mile nai'
        ];
    }
}
