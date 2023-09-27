<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_create_partai extends CI_Migration {
    private $tableName = 'epak_partai';
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
            'nama_partai' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'logo_partai' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'created_at datetime default current_timestamp'
        ));
        
        $this->dbforge->add_key('id', TRUE);
        if (!$this->db->table_exists($this->tableName)) {
            $this->dbforge->create_table($this->tableName, FALSE);

            $sql = "INSERT INTO `$this->tableName` (`id`, `thn`, `nama_partai`) VALUES
            (1, '2023', 'Partai Kebangkitan Bangsa (PKB)'),
            (2, '2023', 'Partai Gerakan Indonesia Raya (Gerindra)'),
            (3, '2023', 'Partai Demokrasi Indonesia Perjuangan (PDIP)'),
            (4, '2023', 'Partai Golongan Karya (Golkar)'),
            (5, '2023', 'Partai Nasional Demokrat (NasDem)'),
            (6, '2023', 'Partai Buruh'),
            (7, '2023', 'Partai Gelombang Rakyat Indonesia (Partai Gelora)'),
            (8, '2023', 'Partai Keadilan Sejahtera (PKS)'),
            (9, '2023', 'Partai Kebangkitan Nusantara (PKN)'),
            (10, '2023', 'Partai Hati Nurani Rakyat (Hanura)'),
            (11, '2023', 'Partai Gerakan Perubahan Indonesia (Partai Garuda)'),
            (12, '2023', 'Partai Amanat Nasional (PAN)'),
            (13, '2023', 'Partai Bulan Bintang (PBB)'),
            (14, '2023', 'Partai Demokrat'),
            (15, '2023', 'Partai Solidaritas Indonesia (PSI)'),
            (16, '2023', 'Partai Persatuan Indonesia (Perindo)'),
            (17, '2023', 'Partai Persatuan Pembangunan (PPP)');";

            $this->db->query($sql);
            // $this->db->query(file_get_contents("MySqlScript.sql"));
        }
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}