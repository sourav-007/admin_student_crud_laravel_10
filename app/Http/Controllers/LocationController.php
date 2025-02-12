<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getCountries() {
        $countries = Country::select('id', 'name', 'nationality')->orderBy('name')->get();
        return response()->json($countries);
    }

    public function getStates($country_id) {
        $states = State::where('country_id', $country_id)->select('id', 'name')->orderBy('name')->get();
        return response()->json($states);
    }
    
    public function getCities($state_id) {
        $cities = City::where('state_id', $state_id)->select('id', 'name')->orderBy('name')->get();
        return response()->json($cities);
    }

}