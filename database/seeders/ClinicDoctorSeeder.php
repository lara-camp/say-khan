<?php

namespace Database\Seeders;

use App\Models\ClinicDoctor;
use Illuminate\Database\Seeder;

class ClinicDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'clinic_id' => 1,
                'doctor_id' => 1,
                'status' => 0,
            ],
            [
                'clinic_id' => 2,
                'doctor_id' => 1,
                'status' => 0,
            ],
            [
                'clinic_id' => 3,
                'doctor_id' => 2,
                'status' => 0,
            ],
            [
                'clinic_id' => 1,
                'doctor_id' => 2,
                'status' => 0,
            ],
        ];

        foreach ($data as $d) {
            ClinicDoctor::create($d);
        }
    }
}
