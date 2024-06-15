<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVehiclesTable extends Migration
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
            'name'       => [
                'type'       => 'string',
                'default' => '70',
            ],
            'type'       => [
                'type'       => 'ENUM',
                'constraint' => ['person', 'goods'],
                'default' => 'person',
            ],
            'owned' => [
                'type' => 'ENUM',
                'constraint' => ['company', 'rental'],
                'default' => 'company',
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
        $this->forge->createTable('vehicles');
    }

    public function down()
    {
        $this->forge->dropTable('vehicles');
    }
}
