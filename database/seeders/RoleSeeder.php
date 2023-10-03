<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'name' => 'Admin',
                'type' => 'administrative',
            ],
            [
                'name' => 'Doctor',
                'type' => 'medicine',
            ],
            [
                'name' => 'Assistant',
                'type' => 'nurse',
            ],
        ];

        foreach ($data as $d) {
            Role::create($d);
        }
    }
}
