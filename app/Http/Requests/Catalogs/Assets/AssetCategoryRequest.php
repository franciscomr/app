<?php

namespace App\Http\Requests\Catalogs\Assets;

use Illuminate\Foundation\Http\FormRequest;

class AssetCategoryRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $arrarFormat = array(
      'type' => 'asset_categories',
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

    if (request()->routeIs('asset_categories.store')) {
      $rules += [
        'name' => 'required | string | min:3 | max:35 | unique:asset_categories,name',
        'createdBy' => 'required | string | min:3 | max:35',
      ];
    } elseif (request()->routeIs('asset_categories.update')) {
      $rules += [
        'name' => 'required | string | min:3| max:35 | unique:asset_categories,name,' . $this->asset_category->id,
      ];
    }
    return $rules;
  }

  protected function prepareForValidation()
  {
    if (request()->routeIs('asset_categories.store')) {
      $this->merge(array_replace(
        $this->all(),
        [
          'name' => $this->input('data.attributes.name'),
          'costCenter' => $this->input('data.attributes.costCenter'),
          'createdBy' =>  'Admin',
          'updatedBy' =>  'Admin',
        ]
      ));
    } elseif (request()->routeIs('asset_categories.update')) {
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
