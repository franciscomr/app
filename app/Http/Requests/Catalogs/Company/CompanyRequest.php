<?php

namespace App\Http\Requests\Catalogs\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $arrarFormat = array(
      'type' => 'companies',
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
      'address' => 'required | string | min:3 | max:70',
      'city' => 'required | string | min:3 | max:35',
      'state' => 'required | string | min:3 | max:35',
      'postalCode' => 'required | numeric | digits:5',
      'updatedBy' => 'required | string | min:3 | max:35'
    ];

    if (request()->routeIs('companies.store')) {
      $rules += [
        'name' => 'required | string | min:3 | max:35 | unique:companies,name',
        'businessName' => 'required | string | min:3 | max:50 | unique:companies,businessName',
        'createdBy' => 'required | string | min:3 | max:35',
      ];
    } elseif (request()->routeIs('companies.update')) {
      $rules += [
        'name' => 'required | string | min:3| max:35 | unique:companies,name,' . $this->company->id,
        'businessName' => 'required | string | min:3 | max:50 |  unique:companies,businessName,' . $this->company->id
      ];
    }
    return $rules;
  }

  protected function prepareForValidation()
  {
    if (request()->routeIs('companies.store')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'name' => $this->input('data.attributes.name'),
          'businessName' => $this->input('data.attributes.businessName'),
          'address' => $this->input('data.attributes.address'),
          'city' => $this->input('data.attributes.city'),
          'state' => $this->input('data.attributes.state'),
          'postalCode' => $this->input('data.attributes.postalCode'),
          'createdBy' =>  'Admin',
          'updatedBy' =>  'Admin',
        ]
      ));
    } elseif (request()->routeIs('companies.update')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'businessName' => $this->input('data.attributes.businessName'),
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
