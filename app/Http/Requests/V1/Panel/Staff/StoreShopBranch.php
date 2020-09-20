<?php

namespace App\Http\Requests\V1\Panel\Staff;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopBranch extends FormRequest
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
            'shop_id' => ['required', 'integer','exists:shops,id'],
            'name' => ['required'],
            'online' => ['nullable'],
            'status_id' => ['required'],
            'country_id' => ['required','integer','exists:countries,id'],
            'city_id' => ['required','integer','exists:cities,id'],
            'state_id' => ['nullable','integer','exists:states,id'],
            'address' => ['required'],
            'lat' => ['required'],
            'long' => ['required'],
            'schedule_start_week_id' => ['required','exists:schedule_weeks,id'],
            'schedule_end_week_id' => ['required','exists:schedule_weeks,id'],
            'schedule_start_time' => ['required'],
            'schedule_end_time' => ['required'],
        ];
    }
}
