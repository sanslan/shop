<?php

namespace App\Http\Controllers\V1\Data;

use App\Http\Controllers\Controller;
use App\Models\Data\City;
use App\Models\Data\Country;
use App\Models\Data\ScheduleWeek;
use App\Models\Data\State;

class DataController extends Controller
{
    /*
     * @return array with countries
     *
     */
    public function get_countries(){

        $countries = Country::with('translation')->get()->map(function ($country){
            return [
                'id' => $country->id,
                'phone_code' => $country->phone_code,
                'name' => $country->translation ? $country->translation->name : null
            ];
        });
        return response()->json(['data' => $countries,'status' => 'success']);
    }

    /*
     * @param request('country_id')
     * @return array with cities
     */
    public function get_cities(){

        $cities = City::where('country_id',request('country_id'))->with('translation')->get()->map(function ($city){
            return [
                'id' => $city->id,
                'name' => $city->translation ? $city->translation->name : null,
            ];
        });

        return response()->json(['data' => $cities,'status' => 'success']);
    }

    /*
     * @param request('city_id')
     * @return array with states
     */
    public function get_states(){

        $states = State::where('city_id',request('city_id'))->with('translation')->get()->map(function ($state){
            return [
                'id' => $state->id,
                'name' => $state->translation ? $state->translation->name: null
            ];
        });

        return response()->json(['data' => $states,'status' => 'success']);
    }

    public function get_week_schedule(){

        $states = ScheduleWeek::with('translation')->get()->map(function ($week){
            return [
                'id' => $week->id,
                'name' => $week->translation ? $week->translation->name: null
            ];
        });

        return response()->json(['data' => $states,'status' => 'success']);
    }
}
