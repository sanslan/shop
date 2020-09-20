<?php

namespace App\Http\Requests\V1\Panel\Shop;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('shop_users')->ignore($this->user_id)],
            'phone' => ['required', 'string', 'min:6',Rule::unique('shop_users')->ignore($this->user_id)],
            'password' => ['sometimes', 'string', 'min:6','max:255'],
            'role_id' => ['required', 'integer','exists:shop_user_roles,id'],
        ];
    }
}
