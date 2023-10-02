<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota_dprd extends CI_Model {
    public $table_name = "epak_anggotadprd";

    public function rules()
    {
        return [
            ['field' => 'periode', 'label' => 'Periode', 'rules' => 'required'],
            ['field' => 'nama_anggota', 'label' => 'Nama Anggota', 'rules' => 'required'],
            ['field' => 'partai_id', 'label' => 'Nama Partai', 'rules' => 'required'],
            ['field' => 'dapil_id', 'label' => 'Nama Dapil', 'rules' => 'required'],
            ['field' => 'jml_suara', 'label' => 'Jumlah Suara', 'rules' => 'required'],
            ['field' => 'keterangan', 'label' => 'Keterangan'],
        ];
    }    

    public function save($data) {
        $this->db->trans_begin();
        $this->db->insert($this->table_name, $data);
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return 0;
        } else {
            $this->db->trans_commit();
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
    }

    public function select_all($options = "") {
        if($options) {
            $this->db->where($options);
        }
        $this->db->join('epak_partai d', 'd.id = a.partai_id');
        $this->db->join('epak_dapil c', 'c.id = a.dapil_id');
        // $this->db->join('epak_kecamatan b', 'b.id = a.kec_id');
        $this->db->select('a.*, c.nama_dapil, d.nama_partai');
        $data = $this->db->get($this->table_name . ' a');
        return $data->result();
    }

    public function selectId($id) {
        $this->db->where('id', $id);
        $data = $this->db->get($this->table_name);
        return $data->row();
    }

    public function total_rows() {
        $data = $this->db->get($this->table_name);
        return $data->num_rows();
    }
}