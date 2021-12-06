<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoomsTable extends Migration
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
            'hotel_id'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'thumbnail'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'room_quota'       => [
                'type'       => 'INT',
                'constraint'     => 11,
            ],
            'guest_quota'       => [
                'type'       => 'INT',
                'constraint'     => 11,
            ],
            'status'       => [
                'type'       => 'INT',
                'constraint'     => 11,
            ],
            'price'       => [
                'type'       => 'INT',
                'constraint'     => 11,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('hotel_id', 'hotels', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rooms');
    }

    public function down()
    {
        $this->forge->dropTable('rooms');
    }
}
