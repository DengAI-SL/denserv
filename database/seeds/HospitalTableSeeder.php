<?php

use Illuminate\Database\Seeder;

class HospitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $hospitals = [
            [
                "hospital_name"=>"ALL",
                "created_at" => Carbon\Carbon::now()->toDateTimeString(),
                "updated_at" => Carbon\Carbon::now()->toDateTimeString(),
            ],
        ];

        print("Reading the hospitals CSV file\n");
        $hospitals_csv = Excel::toArray(true,'hospitals.csv')[0];

        print("Reading CSV file completed.\n");

        print("Preparing the insert query\n");
        $no_of_hospitals = sizeof($hospitals_csv);

        for ($i =0; $i<$no_of_hospitals;$i++){

            $hospital = [
                "hospital_name"=>$hospitals_csv[$i][1],
                "created_at" => Carbon\Carbon::now()->toDateTimeString(),
                "updated_at" => Carbon\Carbon::now()->toDateTimeString(),
            ];
            array_push($hospitals,$hospital);
        }
        print("Inserting the hospitals \n");

        \App\Hospital::insert($hospitals);

        print("Migrating hospitals completed.\n");
    }
}
