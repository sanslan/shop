<?php

namespace App\Http\Requests\V1\Panel\Shop;

use Illuminate\Foundation\Http\FormRequest;

class RegisterShopUser extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:shop_users'],
            'phone' => ['required', 'string', 'min:6','unique:shop_users'],
            'password' => ['required', 'string', 'min:6'],
            'shop_id' => ['required', 'integer','exists:shops,id'],
            'role_id' => ['required', 'integer','exists:shop_user_roles,id'],
            'branch_id' => ['nullable', 'integer','exists:shop_branches,id'],
        ];
    }
}
