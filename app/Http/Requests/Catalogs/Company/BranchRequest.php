<?php

namespace App\Http\Requests\Catalogs\Company;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $arrarFormat = array(
      'type' => 'branches',
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
      'company_id' => 'required | exists:companies,id',
      'address' =>  'required | string | min:3 | max:70',
      'city' => 'required | string | min:3 | max:35',
      'state' => 'required | string | min:3 | max:35',
      'postalCode' => 'required | numeric | digits:5',
      'updatedBy' => 'required | string | min:3 | max:35'
    ];

    if (request()->routeIs('branches.store')) {
      $rules += [
        'name' => 'required | string | min:3 | max:35 | unique:branches,name',
        'createdBy' => 'required | string | min:3 | max:35',
      ];
    } elseif (request()->routeIs('branches.update')) {
      $rules += [
        'name' => 'required |string | min:3 | max:35 | unique:branches,name,' . $this->branch->id,
      ];
    }
    return $rules;
  }

  protected function prepareForValidation()
  {
    if (request()->routeIs('branches.store')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'company_id' => $this->input('data.relationships.company.data.id'),
          'name' => $this->input('data.attributes.name'),
          'address' => $this->input('data.attributes.address'),
          'city' => $this->input('data.attributes.city'),
          'state' => $this->input('data.attributes.state'),
          'postalCode' => $this->input('data.attributes.postalCode'),
          'createdBy' => 'Admin',
          'updatedBy' => 'Admin',
        ]
      ));
    } elseif (request()->routeIs('branches.update')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'company_id' => $this->input('data.relationships.company.data.id'),
          'name' => $this->input('data.attributes.name'),
          'address' => $this->input('data.attributes.address'),
          'city' => $this->input('data.attributes.city'),
          'state' => $this->input('data.attributes.state'),
          'postalCode' => $this->input('data.attributes.postalCode'),
          'updatedBy' => 'Admin',
        ]
      ));
    }
  }
}
