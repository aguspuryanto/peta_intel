<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peta extends CI_Model {
    public $table_name = "epak_peta";

    public function rules()
    {
        return [
            ['field' => 'no_perkara', 'label' => 'Perkara', 'rules' => 'required'],
            ['field' => 'nama_pelaku', 'label' => 'Nama Pelaku', 'rules' => 'required'],
            ['field' => 'penyebab', 'label' => 'Penyebab', 'rules' => 'required'],
            ['field' => 'waktu', 'label' => 'Waktu', 'rules' => 'required'],
            ['field' => 'lokasi', 'label' => 'Lokasi', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'kasus_posisi', 'label' => 'Kasus Posisi', 'rules' => 'required'],
            ['field' => 'peta_tipe', 'label' => 'Tipe Peta'],
            ['field' => 'keterangan', 'label' => 'Keterangan']
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
        
        $data = $this->db->get($this->table_name);
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