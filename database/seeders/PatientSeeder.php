<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
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
                'name' => 'Mary',
                'phone' => '097775218',
                'address' => 'yangon',
                'gender' => 'Female',
                'clinic_id' => '2',
                'status' => 'normal',
            ],
            [
                'name' => 'Tanaka',
                'phone' => '097795218',
                'address' => 'japan',
                'gender' => 'Male',
                'clinic_id' => '3',
                'status' => 'heavy_injury',
            ],
            [
                'name' => 'Bjorn',
                'phone' => '0972235218',
                'address' => 'sweden',
                'gender' => 'Male',
                'clinic_id' => '1',
                'status' => 'normal',
            ],
        ];

        foreach ($data as $d) {
            Patient::create($d);
        }
    }
}
