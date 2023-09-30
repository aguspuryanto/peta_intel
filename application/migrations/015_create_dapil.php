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
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'nama_wilayah' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'jml_kursi' => array(
                'type' => 'INT',
                'constraint' => '50',
                'null' => TRUE
            ),
            'created_at datetime default current_timestamp'
        ));
        $this->dbforge->add_key('id', TRUE);
        if (!$this->db->table_exists($this->tableName)) {
            $this->dbforge->create_table($this->tableName, FALSE);

            $sql = "INSERT INTO `epak_dapil` (`id`, `thn`, `nama_dapil`, `nama_wilayah`, `jml_kursi`) VALUES
            (1, '2023', 'SULAWESI BARAT 1', 'Kabupaten Mamasa', 6),
            (2, '2023', 'SULAWESI BARAT 2', 'Kabupaten Polewali Mandar A (Wonomulyo, Polewali, Binuang, Tapango, Mapilli, Matangnga, Anreapi, Matakali, Bulo)', 8),
            (3, '2023', 'SULAWESI BARAT 3', 'Kabupaten Polewali Mandar B (Tinambung, Campalagian, Tutar, Luyo, Limboro, Balanipa, Allu)', 7),
            (4, '2023', 'SULAWESI BARAT 4', 'Kabupaten Majene', 5),
            (5, '2023', 'SULAWESI BARAT 5', 'Kabupaten Mamuju', 9),
            (6, '2023', 'SULAWESI BARAT 6', 'Kabupaten Mamuju Tengah', 4),
            (7, '2023', 'SULAWESI BARAT 7', 'Kabupaten Pasangkayu', 6);";

            $this->db->query($sql);
        }
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}