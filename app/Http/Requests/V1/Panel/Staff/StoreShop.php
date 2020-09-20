<?php

namespace App\Http\Requests\V1\Panel\Staff;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;


class StoreShop extends FormRequest
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
            'name' => ['required'],
            'logo' => ['required','mimes:jpeg,jpg,png'],
            'cover' => ['nullable','mimes:jpeg,jpg,png'],
            'status_id' => ['required', 'integer','exists:shop_statuses,id'],
        ];
    }
}
