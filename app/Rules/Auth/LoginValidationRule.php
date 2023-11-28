<?php

namespace App\Rules\Auth;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use App\Models\User;

class LoginValidationRule implements ValidationRule
{
  /**
   * Run the validation rule.
   *
   * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
   */
  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    $exists = User::join('employees', 'users.employee_id', '=', 'employees.id')
      ->where('users.username', $value)
      ->where('employees.isActive', true)
      ->where('users.is_active', true)
      ->exists();

    if (!$exists) {
      $fail('auth.failed')->translate();
    }
  }
}
