<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email'=>'unique:users,email',
            'password' => 'min:6|confirmed',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'username'=>'required|unique:users',
            'tele'=>'required|unique:users',
            'ville'=>'required',
            'role'=>'required'
        ];
    }
}
