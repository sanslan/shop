<?php

namespace App\Http\Requests\V1\Panel\Staff;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaction extends FormRequest
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
            'sub_account_id' => ['nullable','integer','exists:sub_accounts,id'],
            'account_id' => ['nullable','integer','exists:accounts,id'],
            'description' => ['required'],
            'amount' => ['required','numeric'],
            'type' => ['required','integer','between:1,2'],
            'status' => ['required','integer','between:0,1']
        ];
    }
}
