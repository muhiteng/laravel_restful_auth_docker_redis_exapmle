<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:5','max:255'],
            'last_name' => ['required', 'string', 'min:5','max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'password_confirm' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'name is  required',
            'first_name.string' => 'name must be string',
            'first_name.min' => 'name must be bigger than 5 characters',
            'first_name.max' => 'name must be less than 255 characters',
            'last_name.required' => 'name is  required',
            'last_name.string' => 'name must be string',
            'last_name.min' => 'name must be bigger than 5 characters',
            'last_name.max' => 'name must be less than 255 characters',
            'email.required' => 'email is  required',
            'email.email' => 'email not valid',
            'email.unique' => 'email must be unique',
            'password.required' => 'password is required',
            'password.min' => 'password at least 8 characters',
            'password_confirm.required' => 'confirm password is required',
            'password_confirm.same' => 'confirm password not correct ',
        ];
    }
}
