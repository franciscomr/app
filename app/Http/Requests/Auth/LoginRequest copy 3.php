<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\Auth\ThrottleRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Str;

use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Exceptions\HttpResponseException;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class LoginRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $expectedJsonApiFormat = array(
      'type' => 'user',
      'id' => '',
      'attributes' => []
    );
    $loginRequestFormat = (array)$this->input('data');

    $formatDifferences = array_diff_key($expectedJsonApiFormat, $loginRequestFormat);

    if (empty($formatDifferences)) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */

  public function rules(): array
  {
    $rules = [
      'username' => ['required', new ThrottleRule()],
      'password' =>  ['required'],
    ];
    return $rules;
  }

  public function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(response()->json([
      'title' => 'validation errors',
      'details' => $validator->errors(),
    ]));
  }

  protected function prepareForValidation()
  {
    $this->merge(array_replace(
      $this->all(),
      [
        'username' => $this->input('data.attributes.username'),
        'password' => $this->input('data.attributes.password'),
      ]
    ));
  }

  public function authenticate(): void
  {

    if (!Auth::attempt($this->only('username', 'password')) || $this->validateIsActive()) {
      ThrottleRule::incrementAttempts();
      $numberOfAttemps =  ThrottleRule::numberOfAttempsLeft();

      throw ValidationException::withMessages([[
        'status' => (string) Response::HTTP_UNPROCESSABLE_ENTITY,
        'source' => ['pointer' => '/data/attributes/username'],
        'title' => __('auth.failed'),
        'detail' => __('auth.failed') . ' ' . __('auth.attemps', ['number' => $numberOfAttemps]),
      ], [
        'status' => (string) Response::HTTP_UNPROCESSABLE_ENTITY,
        'source' => ['pointer' => '/data/attributes/username'],
        'title' => __('auth.failed'),
        'detail' => __('auth.failed') . ' ' . __('auth.attemps', ['number' => $numberOfAttemps]),
      ]]);
    }
    ThrottleRule::clearRateLimiter();
  }

  /**
   * Ensure the login request is not rate limited.
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function ensureIsNotRateLimited(): void
  {
    if (!RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
      return;
    }

    event(new Lockout($this));
    $seconds = RateLimiter::availableIn($this->throttleKey());

    throw ValidationException::withMessages([
      [
        'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
        'source' => ['pointer' => '/data/attributes/username'],
        'title' => __('auth.failed'),
        'detail' => __('auth.throttle', ['seconds' => $seconds,]),
      ]
    ]);
  }

  /**
   * Get the rate limiting throttle key for the request.
   **/
  public function throttleKey(): string
  {
    return Str::transliterate(Str::lower('login4') . '|' . $this->ip());
  }

  public function validateIsActive(): bool
  {
    $exists = User::join('employees', 'users.employee_id', '=', 'employees.id')
      ->where('users.username', $this->input('username'))
      ->where('employees.isActive', true)
      ->where('users.is_active', true)
      ->exists();
    return !$exists;
  }
}
