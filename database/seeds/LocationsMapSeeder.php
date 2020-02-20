<?php

use App\LocationsMap;
use Illuminate\Database\Seeder;

class LocationsMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $locations_maps = [

        ];
        print("Reading the excel file");
//        ini_set('memory_limit', '-1');
        $excel = Excel::toArray(true,'SL_GN.xlsx');
        $no_of_rows = sizeof($excel[0]);

        print("Reading excel file completed\n preparing the insert\n");
        for ($i=1; $i< $no_of_rows;$i++){
            $location = [   "privince_name" => $excel[0][$i][1],
                            "district_name"=> $excel[0][$i][3],
                            "dsd_name"=> $excel[0][$i][5],
                            "gnd_no"=> $excel[0][$i][7],
                            "gnd_name"=> $excel[0][$i][8],
                            "mc_uc_ps_name"=> $excel[0][$i][10],
                            "moh_name"=> $excel[0][$i][17],
                            "rdhs_name"=> $excel[0][$i][20],
                            "created_at" => Carbon\Carbon::now()->toDateTimeString(),
                            "updated_at" => Carbon\Carbon::now()->toDateTimeString(),

            ];
            array_push($locations_maps,$location);
        }
        print("Query preparation completed\n");

        foreach (array_chunk($locations_maps,1000) as $t)
        {
            LocationsMap::insert($t);
        }
        print("Completed db inserting\n");
    }


}
