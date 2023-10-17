<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_create_pilkada extends CI_Migration {
    private $tableName = 'epak_pilkada';
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
            'nama_gub1' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jmlsuara_gub1' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'nama_gub2' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jmlsuara_gub2' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'nama_gub3' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jmlsuara_gub3' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'nama_gub4' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jmlsuara_gub4' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'nama_gub5' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jmlsuara_gub5' => array(
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