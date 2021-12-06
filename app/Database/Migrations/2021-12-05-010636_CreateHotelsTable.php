<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHotelsTable extends Migration
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
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'description'       => [
                'type'       => 'TEXT',
            ],
            'thumbnail'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'location'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hotels');
    }

    public function down()
    {
        $this->forge->dropTable('hotels');
    }
}
