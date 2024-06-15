<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsageHistory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'vehicle_id'  => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'distance'    => [
                'type'           => 'FLOAT',
            ],
            'usage_date'  => [
                'type'           => 'DATE',
            ],
            'created_at' => [
                'type'           => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('vehicle_id', 'vehicles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('usage_history');
    }

    public function down()
    {
        $this->forge->dropTable('usage_history');
    }
}
