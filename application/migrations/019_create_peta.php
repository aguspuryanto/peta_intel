<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_create_peta extends CI_Migration {
    private $tableName = 'epak_peta';
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'no_perkara' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'nama_pelaku' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => TRUE
            ),
            'penyebab' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'waktu' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => TRUE
            ),
            'lokasi' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'alamat' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'kasus_posisi' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
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