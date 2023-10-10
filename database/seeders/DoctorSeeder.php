<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
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
                'name' => 'fukada',
                'phone' => '09987654',
                'address' => 'mdy',
                'email' => 'fukada@gmail.com',
                'password' => Hash::make('Asd123!'),
                'role_id' => 2,
            ],
            [
                'name' => 'Miyamoto',
                'phone' => '099888954',
                'address' => 'ygn',
                'email' => 'miyamoto@gmail.com',
                'password' => Hash::make('Asd123!'),
                'role_id' => 2,
            ],
        ];

        foreach ($data as $d) {
            Doctor::create($d);
        }
    }
}
