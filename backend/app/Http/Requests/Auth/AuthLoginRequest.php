<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|string|min:2|max:255',
            'password' => 'required|String|min:6|max:255',
            'groupToBring' => 'string|max:255',
        ];
    }
}
