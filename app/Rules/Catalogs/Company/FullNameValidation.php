<?php

namespace App\Rules\Catalogs\Company;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use Illuminate\Contracts\Validation\DataAwareRule;

use App\Models\Catalogs\Company\Employee;

class FullNameValidation implements ValidationRule, DataAwareRule
{
  protected $data = [];

  /**
   * Run the validation rule.
   *
   * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
   */
  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    $exists = Employee::where('name', $value)->where('firstSurname',  $this->data['firstSurname'])->where('secondSurname',  $this->data['secondSurname'])->exists();

    if ($exists) {
      $fail('This employee already exists');
    }
  }

  public function setData(array $data): static
  {
    $this->data = $data;

    return $this;
  }
}
