<?php

namespace App\Http\Api\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'email'     => 'required|email',
            'password'  => 'required|string'
        ];
    }

    public function messages(): array {
        return [
            'email.required'    => 'Email is required',
            'email.email'       => 'Email is invalid',
            'password.required' => 'Password is required',
            'password.string'   => 'Password must be a string'
        ];
    }
}
