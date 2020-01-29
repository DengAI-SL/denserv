<?php

use App\Patient;
use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $patients = [[
            'id' => 1,
            'hospital' => "Test Hospital",
            'bht_no' => "abcd123",
            'notification_at' => '2019-04-15 19:13:32',              // Date of notification
            'case_no' => "asdf123",
            'name' => "Test Name",
            'age_years' => 5,
            'age_months' => 4,
            'date_of_birth' => '2019-04-15 19:13:32',
            'gender' => "male",
            'ethnicity' => "Sinhala",
            'occupation' => "Farmer",
            'address' => "Test rd, test , tester",
            'DPDHS_area' => "test area",
            'MOH_area' => "Test MOH",
            'GN_area' => "Test GN",
            'created_at' => '2019-04-15 19:13:32',
            'updated_at' => '2019-04-15 19:13:32',
            'deleted_at' => null,
            'report_form_filled_at' => null,
        ]];

        Patient::insert($patients);
    }
}
