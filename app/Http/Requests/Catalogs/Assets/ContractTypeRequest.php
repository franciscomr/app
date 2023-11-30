<?php

namespace App\Http\Requests\Catalogs\Assets;

use Illuminate\Foundation\Http\FormRequest;

class ContractTypeRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $arrarFormat = array(
      'type' => 'contract_types',
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

    if (request()->routeIs('contract_types.store')) {
      $rules += [
        'name' => 'required | string | min:3 | max:35 | unique:contract_types,name',
        'createdBy' => 'required | string | min:3 | max:35',
      ];
    } elseif (request()->routeIs('contract_types.update')) {
      $rules += [
        'name' => 'required | string | min:3| max:35 | unique:contract_types,name,' . $this->contract_type->id,
      ];
    }
    return $rules;
  }

  protected function prepareForValidation()
  {
    if (request()->routeIs('contract_types.store')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'name' => $this->input('data.attributes.name'),
          'createdBy' =>  'Admin',
          'updatedBy' =>  'Admin',
        ]
      ));
    } elseif (request()->routeIs('contract_types.update')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'name' => $this->input('data.attributes.name'),
          'updatedBy' => 'Admin',
        ]
      ));
    }
  }
}
