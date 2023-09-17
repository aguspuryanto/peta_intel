<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_create_polsusbud extends CI_Migration {
    private $tableName = 'epak_polsusbud';
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'thn' => array(
                'type' => 'VARCHAR',
                'constraint' => '4'
            ),
            'prov_id' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'kab_id' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'kec_id' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'pdi_perjuangan' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'pks' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'perindo' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'pbb' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'pkn' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'garuda' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'demokrat' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'gelora' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'hanura' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'gerindra' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'pkb' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'psi' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'pan' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'golkar' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'ppp' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'buruh' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'created_at datetime default current_timestamp'
        ));
        $this->dbforge->add_key('id', TRUE);
        if (!$this->db->table_exists($this->tableName)) {
            $this->dbforge->create_table($this->tableName, FALSE);
        }
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}