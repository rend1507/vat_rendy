<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'  => 'Dump Truck Cat',
                'type'  => 'goods',
                'owned' => 'rental',
            ],
            [
                'name'  => 'Scraper Cat',
                'type'  => 'goods',
                'owned' => 'company',
            ],
            [
                'name'  => 'Bucket Wheel Excavator Cat',
                'type'  => 'goods',
                'owned' => 'company',
            ],
            [
                'name'  => 'Large Dozer Nomatsu',
                'type'  => 'goods',
                'owned' => 'rental',
            ],
            [
                'name'  => 'Manhauler Amman',
                'type'  => 'person',
                'owned' => 'company',
            ],
            [
                'name'  => 'Manhauler Bus Delima Jaya',
                'type'  => 'person',
                'owned' => 'rental',
            ],
        ];

        // Using Query Builder
        $this->db->table('vehicles')->insertBatch($data);
    }
}
