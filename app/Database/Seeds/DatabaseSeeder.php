<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call other seeders
        $this->call('UserSeeder');
        $this->call('VehicleSeeder');
    }
}
