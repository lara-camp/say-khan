<?php

namespace Database\Seeders;

use App\Models\Assistant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AssistantSeeder extends Seeder
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
                'name' => 'David',
                'phone' => '091234567',
                'address' => 'ygn',
                'email' => 'david@gmail.com',
                'password' => Hash::make('Asd123!'),
                'role_id' => 3,
                'clinic_id' => 1,
            ],
            [
                'name' => 'Kevin',
                'phone' => '091239927',
                'address' => 'mdy',
                'email' => 'kevin@gmail.com',
                'password' => Hash::make('Asd123!'),
                'role_id' => 3,
                'clinic_id' => 2,
            ],
        ];

        foreach ($data as $d) {
            Assistant::create($d);
        }
    }
}
