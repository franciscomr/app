<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Auth\ThrottleRule;
use App\Rules\Auth\LoginValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class LoginRequest extends FormRequest
{

  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    $rules = [
      'username' => [new ThrottleRule(), 'required', new LoginValidationRule()],
      'password' =>  ['required'],
    ];
    return $rules;
  }

  public function failedValidation(Validator $validator)
  {
    ThrottleRule::incrementAttempts();
    throw new HttpResponseException(response()->json([
      'title' => 'validation errors',
      'details' => $validator->errors(),
    ]));
  }
}
