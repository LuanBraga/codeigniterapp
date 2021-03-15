<?php

class Migration_Create_Clientes extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nome' => [
                'type' => 'varchar',
                'constraint' => '80'
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'cadastrado_em' => [
                'type' => 'datetime'
            ],
        ]);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('clientes', true); 
    }

    public function down()
    {
        $this->dbforge->drop_table('clientes', true);
    }
}