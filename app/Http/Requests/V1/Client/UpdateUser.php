<?php

namespace App\Http\Requests\V1\CLient;

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
            'first_name' => ['sometimes','required', 'string', 'max:255'],
            'last_name' => ['sometimes','required', 'string', 'max:255'],
            'email' => ['sometimes','required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'phone' => ['sometimes','required', 'string', 'max:20', Rule::unique('users')->ignore($this->user->id)],
            'password' => ['sometimes','nullable', 'string', 'min:6'],
            'photo' => ['sometimes','nullable','mimes:jpeg,jpg,png']
        ];
    }
}
