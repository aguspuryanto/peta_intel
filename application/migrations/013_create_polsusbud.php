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
            'kecamatan' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jenis' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => TRUE
            ),
            'perkara' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
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