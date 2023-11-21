<?php

namespace App\Http\Requests\Catalogs\Company;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $arrarFormat = array(
      'type' => 'departments',
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
      'updatedBy' => 'required | string | min:3 | max:35'
    ];

    if (request()->routeIs('departments.store')) {
      $rules += [
        'name' => 'required | string | min:3 | max:35 | unique:departments,name',
        'costCenter' => 'required | string  | unique:departments,costCenter',
        'createdBy' => 'required | string | min:3 | max:35',
      ];
    } elseif (request()->routeIs('departments.update')) {
      $rules += [
        'name' => 'required | string | min:3| max:35 | unique:departments,name,' . $this->department->id,
        'costCenter' => 'required | string | min:3 | max:35 |  unique:departments,costCenter,' . $this->department->id
      ];
    }
    return $rules;
  }

  protected function prepareForValidation()
  {
    if (request()->routeIs('departments.store')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'name' => $this->input('data.attributes.name'),
          'costCenter' => $this->input('data.attributes.costCenter'),
          'createdBy' =>  'Admin',
          'updatedBy' =>  'Admin',
        ]
      ));
    } elseif (request()->routeIs('departments.update')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'name' => $this->input('data.attributes.name'),
          'costCenter' => $this->input('data.attributes.costCenter'),
          'updatedBy' => 'Admin',
        ]
      ));
    }
  }
}
