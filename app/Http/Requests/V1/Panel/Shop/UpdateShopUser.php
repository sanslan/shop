<?php

namespace App\Http\Requests\V1\Panel\Shop;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateShopUser extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('shop_users')->ignore($this->shop_user->id)],
            'phone' => ['required', 'string', 'min:6',Rule::unique('shop_users')->ignore($this->shop_user->id)],
            'password' => ['sometimes', 'string', 'min:6'],
            'shop_id' => ['required', 'integer','exists:shops,id'],
            'role_id' => ['required', 'integer','exists:shop_user_roles,id'],
            'branch_id' => ['nullable', 'integer','exists:shop_branches,id'],
        ];
    }
}
