<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReservationApproversTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'reservation_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'approver_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'default'    => 'pending',
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
        $this->forge->addForeignKey('reservation_id', 'reservations', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('approver_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('reservation_approvers');
    }

    public function down()
    {
        $this->forge->dropTable('reservation_approvers');
    }
}
