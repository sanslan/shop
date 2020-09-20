<?php

namespace App\Http\Requests\V1\Panel\Staff;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDeliveryCompanyUser extends FormRequest
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
        //dd($this->user_id);
        return [
            'email' => ['required','email',Rule::unique('delivery_company_users')->ignore($this->user_id)],
            'phone' => ['required',Rule::unique('delivery_company_users')->ignore($this->user_id)],
            'password' => ['sometimes','min:6'],
            'company_id' => ['required','integer','exists:delivery_companies,id'],
            'is_active' => ['required','integer'],
        ];
    }
}
