<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_create_anggotadprd extends CI_Migration {
    private $tableName = 'epak_anggotadprd';
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'periode' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'nama_anggota' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'partai_id' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'dapil_id' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'jml_suara' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'keterangan' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
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