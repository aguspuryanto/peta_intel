<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_create_dapil extends CI_Migration {
    private $tableName = 'epak_dapil';
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
            'nama_dapil' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'nama_wilayah' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'jml_kursi' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'created_at' => array('type' => 'timestamp')
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