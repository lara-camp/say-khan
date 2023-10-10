<?php

namespace Database\Seeders;

use App\Models\Clinic;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
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
                'name' => 'Wonder',
                'address' => 'yangon',
            ],
            [
                'name' => 'HP+',
                'address' => 'mandalay',
            ],
            [
                'name' => 'Muteki',
                'address' => 'Japan',
            ],
        ];

        foreach ($data as $d) {
            Clinic::create($d);
        }
    }
}
