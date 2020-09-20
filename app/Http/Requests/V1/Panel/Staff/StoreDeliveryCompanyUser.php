<?php

namespace App\Http\Requests\V1\Panel\Staff;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryCompanyUser extends FormRequest
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
            'email' => ['required','email','unique:delivery_company_users'],
            'password' => ['required','min:6'],
            'phone' => ['required','unique:delivery_company_users'],
            'company_id' => ['required','integer','exists:delivery_companies,id'],
            'is_active' => ['required','integer'],
        ];
    }
}
