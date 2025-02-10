<?php

namespace App\Http\Requests\Auth;

use App\Domain\User\DTO\LoginDTO;
use Illuminate\Foundation\Http\FormRequest;

class GetProductRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [];
  }

  public function messages(): array
  {
    return [];
  }

  public function toDTO()
  {
    return;
  }
}
