<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingsTable extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'hp'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'hotel_id'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'room_id'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'checkin'       => [
                'type'       => 'TIMESTAMP',
            ],
            'checkout'       => [
                'type'       => 'TIMESTAMP',
            ],
            'status'       => [
                'type'       => 'INT',
                'constraint'     => 1,
            ],
            'payment_method'       => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
            ],
        ]);
        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('hotel_id', 'hotels', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('room_id', 'rooms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bookings');
    }

    public function down()
    {
        $this->forge->dropTable('bookings');
    }
}
