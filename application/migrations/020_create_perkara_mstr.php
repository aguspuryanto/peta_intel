<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_create_perkara_mstr extends CI_Migration {
    private $tableName = 'epak_perkara_mstr';
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'perkara' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'tipe' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'created_at datetime default current_timestamp'
        ));
        $this->dbforge->add_key('id', TRUE);
        if (!$this->db->table_exists($this->tableName)) {
            $this->dbforge->create_table($this->tableName, FALSE);

            $data_dummies = array(
                array('perkara' => 'PENGAMANAN PANCASILA', 'tipe' => 'D.IN.2'),
                array('perkara' => 'PERSATUAN DAN KESATUAN BANGSA', 'tipe' => 'D.IN.2'),
                array('perkara' => 'GERAKAN SEPARATIS', 'tipe' => 'D.IN.2'),
                array('perkara' => 'PENYELENGGARAAN PEMERINTAHAN', 'tipe' => 'D.IN.2'),
                array('perkara' => 'PARTAI POLITIK, PEMILU, PILKADA', 'tipe' => 'D.IN.2'),
                array('perkara' => 'GERAKAN TERORISME & RADIKALISME', 'tipe' => 'D.IN.2'),
                array('perkara' => 'KEJAHATAN SIBER', 'tipe' => 'D.IN.2'),
                array('perkara' => 'CEKAL', 'tipe' => 'D.IN.2'),
                array('perkara' => 'PENGAWASAN ORANG ASING', 'tipe' => 'D.IN.2'),
                array('perkara' => 'PENGAMANAN SUMBER DAYA ORGANISASI KEJAKSAAN', 'tipe' => 'D.IN.2'),
                array('perkara' => 'PENGAMANAN PENANGANAN PERKARA', 'tipe' => 'D.IN.2'),
                array('perkara' => 'PENGAWASAN PEREDARAN BARANG CETAKAN DALAM NEGERI', 'tipe' => 'D.IN.3'),
                array('perkara' => 'PENGAWASAN PEREDARAN IMPORT BARANG CETAKAN DALAM NEGERI', 'tipe' => 'D.IN.3'),
                array('perkara' => 'PENGAWASAN SISTEM PERBUKUAN', 'tipe' => 'D.IN.3'),
                array('perkara' => 'PENGAWASAN MEDIA KOMUNIKASI', 'tipe' => 'D.IN.3'),
                array('perkara' => 'PENGAWASAN ALIRAN KEPERCAYAAN DAN KEAGAMAAN DALAM MASYARAKAT', 'tipe' => 'D.IN.3'),
                array('perkara' => 'PENCEGAKAN PENYALAHGUNAAN DAN/ATAU PENODAAN AGAMA', 'tipe' => 'D.IN.3'),
                array('perkara' => 'KETAHANAN BUDAYA', 'tipe' => 'D.IN.3'),
                array('perkara' => 'PEMBERDAYAAN MASYARAKAT DESA', 'tipe' => 'D.IN.3'),
                array('perkara' => 'PENGAWASAN ORGANISASI MASYARAKAT DAN LEMBAGA SWADAYA MASYARAKAT', 'tipe' => 'D.IN.3'),
                array('perkara' => 'PENCEGAHAN KONFLIK SOSIAL', 'tipe' => 'D.IN.3'),
                array('perkara' => 'KETERTIBAN DAN KETENTRAMAN UMUM', 'tipe' => 'D.IN.3'),
                array('perkara' => 'PEMBINAAN MASYARAKAT TAAT HUKUM', 'tipe' => 'D.IN.3'),
                array('perkara' => 'LEMBAGA KEUANGAN', 'tipe' => 'D.IN.4'),
                array('perkara' => 'KEUANGAN NEGARA', 'tipe' => 'D.IN.4'),
                array('perkara' => 'MONETER', 'tipe' => 'D.IN.4'),
                array('perkara' => 'PENELUSURAN ASET', 'tipe' => 'D.IN.4'),
                array('perkara' => 'INVESTASI/ PENANAMAN MODAL', 'tipe' => 'D.IN.4'),
                array('perkara' => 'PERPAJAKAN', 'tipe' => 'D.IN.4'),
                array('perkara' => 'KEPABEANAN', 'tipe' => 'D.IN.4'),
                array('perkara' => 'CUKAI', 'tipe' => 'D.IN.4'),
                array('perkara' => 'PERDAGANGAN', 'tipe' => 'D.IN.4'),
                array('perkara' => 'PERINDUSTRIAN', 'tipe' => 'D.IN.4'),
                array('perkara' => 'KETENAGAKERJAAN', 'tipe' => 'D.IN.4'),
                array('perkara' => 'PERKEBUNAN', 'tipe' => 'D.IN.4'),
                array('perkara' => 'KEHUTANAN', 'tipe' => 'D.IN.4'),
                array('perkara' => 'LINGKUNGAN HIDUP', 'tipe' => 'D.IN.4'),
                array('perkara' => 'PERIKANAN', 'tipe' => 'D.IN.4'),
                array('perkara' => 'AGRARIA/TATA RUANG', 'tipe' => 'D.IN.4'),
                array('perkara' => 'INFRASTRUKTUR JALAN', 'tipe' => 'D.IN.5'),
                array('perkara' => 'INFRASTRUKTUR PERKERETAAPIAN', 'tipe' => 'D.IN.5'),
                array('perkara' => 'INFRASTRUKTUR KEBANDARUDARAAN', 'tipe' => 'D.IN.5'),
                array('perkara' => 'INFRASTRUKTUR TELEKOMUNIKASI', 'tipe' => 'D.IN.5'),
                array('perkara' => 'INFRASTRUKTUR KEPELABUHANAN', 'tipe' => 'D.IN.5'),
                array('perkara' => 'SMELTER', 'tipe' => 'D.IN.5'),
                array('perkara' => 'INFRASTRUKTUR PENGOLAHAN AIR', 'tipe' => 'D.IN.5'),
                array('perkara' => 'TANGGUL', 'tipe' => 'D.IN.5'),
                array('perkara' => 'BENDUNGAN', 'tipe' => 'D.IN.5'),
                array('perkara' => 'PERTANIAN', 'tipe' => 'D.IN.5'),
                array('perkara' => 'KELAUTAN KETENAGALISTRIKAN', 'tipe' => 'D.IN.5'),
                array('perkara' => 'ENERGI ALTERNATIF', 'tipe' => 'D.IN.5'),
                array('perkara' => 'MINYAK & GAS BUMI', 'tipe' => 'D.IN.5'),
                array('perkara' => 'ILMU PENGETAHUAN DAN TEKNOLOGI', 'tipe' => 'D.IN.5'),
                array('perkara' => 'PERUMAHAN', 'tipe' => 'D.IN.5'),
                array('perkara' => 'PARIWISATA', 'tipe' => 'D.IN.5'),
                array('perkara' => 'KAWASAN INDUSTRI PRIORITAS/ KAWASAN EKONOMI KHUSUS', 'tipe' => 'D.IN.5'),
                array('perkara' => 'POS LINTAS BATAS NEGARA & SARANA PENUNJANG', 'tipe' => 'D.IN.5'),
                array('perkara' => 'SEKTOR LAINNYA', 'tipe' => 'D.IN.5'),
                array('perkara' => 'PRODUKSI INTELIJEN', 'tipe' => 'D.IN.6'),
                array('perkara' => 'PEMANTAUAN', 'tipe' => 'D.IN.6'),
                array('perkara' => 'INTELIJEN SINYAL', 'tipe' => 'D.IN.6'),
                array('perkara' => 'INTELIJEN SIBER', 'tipe' => 'D.IN.6'),
                array('perkara' => 'KLANDESTINE', 'tipe' => 'D.IN.6'),
                array('perkara' => 'DIGITAL FORENSIK', 'tipe' => 'D.IN.6'),
                array('perkara' => 'TRANSMISI BERITA SANDI', 'tipe' => 'D.IN.6'),
                array('perkara' => 'KONTRA PENGINDERAAN', 'tipe' => 'D.IN.6'),
                array('perkara' => 'AUDIT & PENGUJIAN SISTEM KEAMANAN INFORMASI', 'tipe' => 'D.IN.6'),
                array('perkara' => 'PENGAMANAN SINYAL', 'tipe' => 'D.IN.6'),
                array('perkara' => 'PENGEMBANGAN SDM & SANDI', 'tipe' => 'D.IN.6'),
                array('perkara' => 'PENGEMBANGAN SDM INTELIJEN LAINNYA', 'tipe' => 'D.IN.6'),
                array('perkara' => 'PENGEMBANGAN TEKNOLOGI', 'tipe' => 'D.IN.6'),
                array('perkara' => 'PENGEMBANGAN PROSEDUR & APLIKASI', 'tipe' => 'D.IN.6')
            );
            
            $data_dummies7 = array(
                array('perkara' => 'PENERANGAN HUKUM', 'tipe' => 'D.IN.7'),
                array('perkara' => 'PENYULUHAN HUKUM', 'tipe' => 'D.IN.7'),
                array('perkara' => 'HUBUNGAN MEDIA MASSA', 'tipe' => 'D.IN.7'),
                array('perkara' => 'KERJASAMA LEMBAGA PEMERINTAH', 'tipe' => 'D.IN.7'),
                array('perkara' => 'KERJASAMA LEMBAGA NON PEMERINTAH', 'tipe' => 'D.IN.7'),
                array('perkara' => 'POS PELAYANAN HUKUM', 'tipe' => 'D.IN.7'),
                array('perkara' => 'PENERIMAAN PENGADUAN MASYARAKAT', 'tipe' => 'D.IN.7'),
                array('perkara' => 'PPID', 'tipe' => 'D.IN.7'),
            );
            $data_dummies = array_merge($data_dummies, $data_dummies7);

            $this->db->insert_batch($this->tableName, $data_dummies);
        }
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}