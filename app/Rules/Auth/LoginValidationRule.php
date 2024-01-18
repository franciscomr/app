<?php

namespace App\Rules\Auth;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Rules\Auth\ThrottleRule;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginValidationRule implements ValidationRule, DataAwareRule
{
  protected $data = [];

  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    if (!Auth::attempt($this->getCredentials()) | $this->validateIfUserIsActive()) {
      $fail('auth.attemps')->translate([
        'number' => ThrottleRule::numberOfAttempsLeft(),
      ]);
    }
  }

  private function getCredentials()
  {
    return [
      'username' => $this->data['username'],
      'password' => $this->data['password'],
    ];
  }

  private function validateIfUserIsActive(): bool
  {
    $userIsActive = User::join('employees', 'users.employee_id', '=', 'employees.id')
      ->where('users.username', $this->data['username'])
      ->where('employees.isActive', true)
      ->where('users.is_active', true)
      ->exists();
    return !$userIsActive;
  }

  public function setData(array $data): static
  {
    $this->data = $data;

    return $this;
  }
}
