<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\Auth\LoginValidationRule;
use App\Rules\Auth\ThrottleRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Str;

use App\Models\User;

class LoginRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $arrarFormat = array(
      'type' => 'user',
      'attributes' => []
    );
    $arrayInput = (array)$this->input('data');
    if (empty(array_diff_key($arrarFormat, $arrayInput))) {
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
      'username' => ['required'],
      'password' =>  ['required'],
    ];

    return $rules;
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
    $this->ensureIsNotRateLimited();

    if (!Auth::attempt($this->only('username', 'password')) || $this->validateIsActive()) {


      RateLimiter::hit($this->throttleKey());
      $numberOfAttemps =  RateLimiter::remaining($this->throttleKey(), 3);
      throw ValidationException::withMessages([
        'username' => [__('auth.failed'),  __($numberOfAttemps . ' remaining attempts')],
      ]);
    }

    RateLimiter::clear($this->throttleKey());
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
      'username' => trans('auth.throttle', [
        'seconds' => $seconds,
        'minutes' => ceil($seconds / 60),
      ]),
    ]);
  }

  /**
   * Get the rate limiting throttle key for the request.
   */
  public function throttleKey(): string
  {
    return Str::transliterate(Str::lower($this->input('username')) . '|' . $this->ip());
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
