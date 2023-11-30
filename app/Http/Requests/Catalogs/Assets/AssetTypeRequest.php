<?php

namespace App\Http\Requests\Catalogs\Assets;

use Illuminate\Foundation\Http\FormRequest;

class AssetTypeRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $arrarFormat = array(
      'type' => 'asset_types',
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
      'asset_category_id' => 'required | exists:asset_categories,id',
      'updatedBy' => 'required | string | min:3 | max:35'
    ];

    if (request()->routeIs('asset_types.store')) {
      $rules += [
        'name' => 'required | string | min:3 | max:35 | unique:asset_types,name',
        'createdBy' => 'required | string | min:3 | max:35',
      ];
    } elseif (request()->routeIs('asset_types.update')) {
      $rules += [
        'name' => 'required | string | min:3| max:35 | unique:asset_types,name,' . $this->asset_type->id,
      ];
    }
    return $rules;
  }

  protected function prepareForValidation()
  {
    if (request()->routeIs('asset_types.store')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'asset_category_id' => $this->input('data.relationships.asset_category.data.id'),
          'name' => $this->input('data.attributes.name'),
          'createdBy' =>  'Admin',
          'updatedBy' =>  'Admin',
        ]
      ));
    } elseif (request()->routeIs('asset_types.update')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'asset_category_id' => $this->input('data.relationships.asset_category.data.id'),
          'name' => $this->input('data.attributes.name'),
          'updatedBy' => 'Admin',
        ]
      ));
    }
  }
}
