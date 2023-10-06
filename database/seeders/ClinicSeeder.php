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
                'name' => 'GG',
                'address' => 'yangon',
            ],
            [
                'name' => 'DD',
                'address' => 'mandalay',
            ],
            [
                'name' => 'BB',
                'address' => 'sydney',
            ],
        ];

        foreach ($data as $d) {
            Clinic::create($d);
        }
    }
}
