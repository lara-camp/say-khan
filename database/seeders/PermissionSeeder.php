<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
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
                'key' => 'R',
                'value' => 'Read',
            ],
            [
                'key' => 'RW',
                'value' => 'Read_Write',
            ],
            [
                'key' => 'FC',
                'value' => 'Full_Control',
            ],
        ];

        foreach ($data as $d) {
            Permission::create($d);
        }
    }
}
