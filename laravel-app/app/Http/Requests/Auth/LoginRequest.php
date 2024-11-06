<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      schema="LoginRequest",
 *      type="object",
 *      title="Login Request",
 *      required={"email", "password"},
 *      @OA\Property(
 *          property="email",
 *          type="string",
 *          format="email",
 *          example="test@example.com",
 *          description="Email"
 *      ),
 *      @OA\Property(
 *          property="password",
 *          type="string",
 *          format="password",
 *          example="password",
 *          description="Password"
 *      )
 *  )
 */
class LoginRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return ['email' => 'required|email', 'password' => 'required|string'];
    }

    public function messages(): array {
        return ['email.required'    => 'Email is required', 'email.email' => 'Email is invalid',
                'password.required' => 'Password is required', 'password.string' => 'Password must be a string'];
    }
}
