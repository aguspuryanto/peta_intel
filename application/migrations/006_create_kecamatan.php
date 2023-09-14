<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_create_meeting extends CI_Migration {
    private $tableName = 'epak_kecamatan';
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'kode' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'kab_id' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'created_at datetime default current_timestamp'
        ));
        $this->dbforge->add_key('id', TRUE);
        if (!$this->db->table_exists($this->tableName)) {
            $this->dbforge->create_table($this->tableName, FALSE, array('ENGINE' => 'InnoDB'));
        }
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}