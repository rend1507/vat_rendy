<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin1',
                'name'     => 'Bagas',
                'password' => password_hash('admin1123', PASSWORD_DEFAULT),
                'role'     => 'admin',
            ],
            [
                'username' => 'admin2',
                'name'     => 'Bayu',
                'password' => password_hash('admin2123', PASSWORD_DEFAULT),
                'role'     => 'admin',
            ],
            [
                'username' => 'approver1',
                'name'     => 'Nadia',
                'password' => password_hash('approver1123', PASSWORD_DEFAULT),
                'role'     => 'approver',
            ],
            [
                'username' => 'approver2',
                'name'     => 'Nana',
                'password' => password_hash('approver2123', PASSWORD_DEFAULT),
                'role'     => 'approver',
            ],
            [
                'username' => 'approver3',
                'name'     => 'Nur',
                'password' => password_hash('approver3123', PASSWORD_DEFAULT),
                'role'     => 'approver',
            ],
            [
                'username' => 'approver4',
                'name'     => 'Nessie',
                'password' => password_hash('approver4123', PASSWORD_DEFAULT),
                'role'     => 'approver',
            ],
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
