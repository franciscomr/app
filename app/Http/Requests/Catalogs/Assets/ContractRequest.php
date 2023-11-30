<?php

namespace App\Http\Requests\Catalogs\Assets;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $arrarFormat = array(
      'type' => 'contracts',
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
      'contract_type_id' => 'required | exists:contract_types,id',
      'billNumber' => 'required | string | min:3 | max:35',
      'billDate' => 'required | date ',
      'addendumNumber' => 'nullable | string | min:3 | max:35',
      'addendumDate' => 'nullable | date ',
      'seller' => 'required | string | min:3 | max:35',
      'contractStartDate' => 'nullable | date ',
      'contractExpirationDate' => 'nullable | date ',
      'warrantyExpirationDate' => 'nullable | date ',
      'updatedBy' => 'required | string | min:3 | max:35'

    ];

    if (request()->routeIs('contracts.store')) {
      $rules += [
        'name' => 'required | string | min:3 | max:35 | unique:contracts,name',
        'createdBy' => 'required | string | min:3 | max:35',
      ];
    } elseif (request()->routeIs('contracts.update')) {
      $rules += [
        'name' => 'required |string | min:3 | max:35 | unique:contracts,name,' . $this->contract->id,
      ];
    }
    return $rules;
  }

  protected function prepareForValidation()
  {
    if (request()->routeIs('contracts.store')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'contract_type_id' => $this->input('data.relationships.contract_type.data.id'),
          'name' => $this->input('data.attributes.name'),
          'billNumber' => $this->input('data.attributes.billNumber'),
          'billDate' => $this->input('data.attributes.billDate'),
          'addendumNumber' => $this->input('data.attributes.addendumNumber'),
          'addendumDate' => $this->input('data.attributes.addendumDate'),
          'seller' => $this->input('data.attributes.seller'),
          'contractStartDate' => $this->input('data.attributes.contractStartDate'),
          'contractExpirationDate' => $this->input('data.attributes.contractExpirationDate'),
          'warrantyExpirationDate' => $this->input('data.attributes.warrantyExpirationDate'),
          'createdBy' => 'Admin',
          'updatedBy' => 'Admin',
        ]
      ));
    } elseif (request()->routeIs('contracts.update')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'contract_type_id' => $this->input('data.relationships.contract_type.data.id'),
          'name' => $this->input('data.attributes.name'),
          'billNumber' => $this->input('data.attributes.billNumber'),
          'billDate' => $this->input('data.attributes.billDate'),
          'addendumNumber' => $this->input('data.attributes.addendumNumber'),
          'addendumDate' => $this->input('data.attributes.addendumDate'),
          'seller' => $this->input('data.attributes.seller'),
          'contractStartDate' => $this->input('data.attributes.contractStartDate'),
          'contractExpirationDate' => $this->input('data.attributes.contractExpirationDate'),
          'warrantyExpirationDate' => $this->input('data.attributes.warrantyExpirationDate'),
          'updatedBy' => 'Admin',
        ]
      ));
    }
  }
}
