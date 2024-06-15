<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServicesTable extends Migration
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
            'vehicle_id'       => [
                'type'       => 'INT',
                'unsigned' => true,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('vehicle_id', 'vehicles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('services');
    }

    public function down()
    {
        $this->forge->dropTable('services');
    }
}
