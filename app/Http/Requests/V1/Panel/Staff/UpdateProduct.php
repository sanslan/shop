<?php

namespace App\Http\Requests\V1\Panel\Staff;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'category_id' => ['required','integer','exists:sub_categories,id'],
            'shop_branch_id' => ['required','integer','exists:shop_branches,id'],
            'brand_id' => ['nullable','integer','exists:brands,id'],
            'name' => ['required'],
            'name.*' => ['required'],
            'description' => ['nullable'],
            'description.*' => ['nullable'],
            'sku' => ['nullable','max:12'],
            'stock' => ['nullable','integer'],
            'weight' => ['nullable'],
            'price' => ['required'],
            'new_price' => ['nullable'],
        ];
    }
}
