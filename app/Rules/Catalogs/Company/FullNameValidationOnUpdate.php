<?php

namespace App\Rules\Catalogs\Company;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use Illuminate\Contracts\Validation\DataAwareRule;

use App\Models\Catalogs\Company\Employee;

class FullNameValidationOnUpdate implements ValidationRule, DataAwareRule
{
  protected $data = [];
  protected $id;
  public function __construct($id)
  {
    $this->id = $id;
  }

  /**
   * Run the validation rule.
   *
   * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
   */
  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    $exists = Employee::where('name', $value)->where('firstSurname',  $this->data['firstSurname'])->where('secondSurname',  $this->data['secondSurname'])
      ->where('id', '!=', $this->id)->exists();


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
