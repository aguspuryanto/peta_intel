<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_create_pilpres extends CI_Migration {
    private $tableName = 'epak_pilpres';
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
            'nama_capres1' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jmlsuara_capres1' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'nama_capres2' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jmlsuara_capres2' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'nama_capres3' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jmlsuara_capres3' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'nama_capres4' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jmlsuara_capres4' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'nama_capres5' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jmlsuara_capres5' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
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