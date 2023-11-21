<?php

namespace App\Http\Requests\Catalogs\Company;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\Catalogs\Company\FullNameValidation;

use App\Rules\Catalogs\Company\FullNameValidationOnUpdate;

use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $arrarFormat = array(
      'type' => 'employees',
      'attributes' => [],
      'relationships' => []
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
      'branch_id' => 'required | exists:branches,id',
      'job_id' => 'required | exists:jobs,id',
      'firstSurname' =>  'required | string | min:3 | max:35',
      'secondSurname' => 'required | string | min:3 | max:35',
      'hireDate' => 'required | date | before_or_equal:now',
      'updatedBy' => 'required | string | min:3 | max:35'
    ];

    if (request()->routeIs('employees.store')) {
      $rules += [
        'name' => ['required', 'string', 'min:3', 'max:35', new FullNameValidation()],
        'createdBy' => 'required | string | min:3 | max:35',
      ];
    } elseif (request()->routeIs('employees.update')) {
      $rules += [
        'name' => ['required', 'string', 'min:3', 'max:35', new FullNameValidationOnUpdate($this->employee->id)],

      ];
    }
    return $rules;
  }

  protected function prepareForValidation()
  {
    if (request()->routeIs('employees.store')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'branch_id' => $this->input('data.relationships.branch.data.id'),
          'job_id' => $this->input('data.relationships.job.data.id'),
          'employeeId' => $this->input('data.attributes.employeeId'),
          'name' => $this->input('data.attributes.name'),
          'firstSurname' => $this->input('data.attributes.firstSurname'),
          'secondSurname' => $this->input('data.attributes.secondSurname'),
          'hireDate' => $this->input('data.attributes.hireDate'),
          'isActive' => $this->input('data.attributes.isActive'),
          'createdBy' => 'Admin',
          'updatedBy' => 'Admin',
        ]
      ));
    } elseif (request()->routeIs('employees.update')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'branch_id' => $this->input('data.relationships.branch.data.id'),
          'job_id' => $this->input('data.relationships.job.data.id'),
          'employeeId' => $this->input('data.attributes.employeeId'),
          'name' => $this->input('data.attributes.name'),
          'firstSurname' => $this->input('data.attributes.firstSurname'),
          'secondSurname' => $this->input('data.attributes.secondSurname'),
          'hireDate' => $this->input('data.attributes.hireDate'),
          'isActive' => $this->input('data.attributes.isActive'),
          'updatedBy' => 'Admin',
        ]
      ));
    }
  }
}
