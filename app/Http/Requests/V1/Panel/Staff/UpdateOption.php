<?php

namespace App\Http\Requests\V1\Panel\Staff;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOption extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'field_type' => ['required', 'integer','exists:option_field_types,id'],
            'subcategory_id' => ['required', 'integer','exists:sub_categories,id'],
            'filterable' => ['nullable','integer'],
            'name' => ['required'],
        ];
    }
}
