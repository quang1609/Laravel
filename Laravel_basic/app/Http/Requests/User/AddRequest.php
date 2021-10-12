<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'passwordCf' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'a name field is required',
            'email.required' => 'a email field is required',
            'email.email' => 'a quantity field is required',
            'email.unique' => 'a email already exists',
            'password.required' => 'a password field is required',
            'passwordCf.required' => 'a passwordCf field is required',
            'passwordCf.same' => 'a passwordCf must be the same as password',
        ];
    }
}
