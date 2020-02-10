<?php

namespace App\Http\Controllers\User;

use App\LocationsMap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LocationMapController extends Controller
{
    //

    public function filterDistrict(Request $request){
        $district = $request['district'];

//        print($district);

        $MOH_areas = LocationsMap::where('district_name','=',$district)->distinct()->orderBy("moh_name")->pluck("moh_name");

//        $GN_areas = LocationsMap::where('district_name','=',$district)->distinct()->orderBy("gnd_name")->pluck("gnd_name");

        return response()->json(['MOH_areas'=>$MOH_areas]);
    }

    public function filterMOH(Request $request){
        $MOH_area = $request['MOH_area'];
        $GN_areas = LocationsMap::where('moh_name','=',$MOH_area)->distinct()->orderBy("gnd_name")->pluck("gnd_name");

        return response()->json(['GN_areas'=>$GN_areas]);
    }
}
