<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email'=>['unique:users,email'],
            'password'=>['required|password|min:8|confirmed'],
            'username'=>['required|unique:users'],
            'tele'=>['required|unique:users'],
            'secteur_activite'=>['required'],
            'ville'=>['required'],
            'role'=>['required']
        ];
    }
}