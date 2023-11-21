<?php

namespace App\Http\Requests\Catalogs\Company;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $arrarFormat = array(
      'type' => 'jobs',
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
      'department_id' => 'required | exists:departments,id',
      'updatedBy' => 'required | string | min:3 | max:35'
    ];

    if (request()->routeIs('jobs.store')) {
      $rules += [
        'name' => 'required | string | min:3 | max:35 | unique:jobs,name',
        'createdBy' => 'required | string | min:3 | max:35',
      ];
    } elseif (request()->routeIs('jobs.update')) {
      $rules += [
        'name' => 'required |string | min:3 | max:35 | unique:jobs,name,' . $this->job->id,
      ];
    }
    return $rules;
  }

  protected function prepareForValidation()
  {
    if (request()->routeIs('jobs.store')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'department_id' => $this->input('data.relationships.department.data.id'),
          'name' => $this->input('data.attributes.name'),
          'createdBy' => 'Admin',
          'updatedBy' => 'Admin',
        ]
      ));
    } elseif (request()->routeIs('jobs.update')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'department_id' => $this->input('data.relationships.department.data.id'),
          'name' => $this->input('data.attributes.name'),
          'updatedBy' => 'Admin',
        ]
      ));
    }
  }
}
