<?php

namespace App\Http\Requests\V1\Panel\Shop;

use App\Models\Shop\ShopBranch;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;


class UpdateProduct extends FormRequest
{
    public function __construct(ValidationFactory $validationFactory)
    {
        parent::__construct();
        $validationFactory->extend(
            'array_of_shop_branches',
            function ($attribute, $value, $parameters) {

                $shop_branches = ShopBranch::all()->pluck('id')->toArray();

                foreach ($value as $v) {
                    $v = intval($v);
                    if ( !in_array( $v, $shop_branches) ) {
                        return false;
                    }
                }
                return true;
            },
            'Mağaza filiallarından ən azı biri mövcud deyil'
        );

    }

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
            'stock' => ['nullable'],
            'weight' => ['nullable'],
            'price' => ['required'],
            'new_price' => ['nullable'],
            'images' => ['nullable','array'],

            'options.*.product_image_id' => ['nullable','integer','exists:product_images,id'],
            'options.*.price' => ['nullable','numeric'],
            'options.*.option_id' => ['required','integer','exists:options,id'],
            'options.*.value_id' => ['required','integer','exists:option_values,id'],

            'custom_options.*.field_type' => ['required', 'integer','exists:option_field_types,id'],
            'custom_options.*.name' => ['required'],
            'custom_options.*.value' => ['required'],
            'custom_options.*.product_image_id' => ['nullable','integer','exists:product_images,id'],
            'custom_options.*.price' => ['nullable'],
        ];
    }
}
