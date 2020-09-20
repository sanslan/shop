<?php

namespace App\Http\Requests\V1\Panel\Staff;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductCustomOption extends FormRequest
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
            'name' => ['required'],
            'name.*' => ['required'],
            'value' => ['required'],
            'value.*' => ['required'],
            'product_id' => ['required','integer','exists:products,id'],
            'product_image_id' => ['nullable','integer','exists:product_images,id'],
            'custom_option' => ['required'],
            'price' => ['nullable'],
        ];
    }
}
