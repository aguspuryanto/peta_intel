<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pilgub extends CI_Model {
    public $table_name = "epak_pilgub";

    public function rules()
    {
        return [
            ['field' => 'thn', 'label' => 'Tahun', 'rules' => 'required'],
            ['field' => 'prov_id', 'label' => 'Provinsi'],
            ['field' => 'kab_id', 'label' => 'Kabupaten', 'rules' => 'required'],
            ['field' => 'kec_id', 'label' => 'Kecamatan', 'rules' => ''],
            ['field' => 'nama_gub1', 'label' => 'Nama Gubernur 1', 'rules' => 'required'],
            ['field' => 'jmlsuara_gub1', 'label' => 'Jumlah Suara Gubernur 1'],
            ['field' => 'nama_gub2', 'label' => 'Nama Gubernur 2', 'rules' => 'required'],
            ['field' => 'jmlsuara_gub2', 'label' => 'Jumlah Suara Gubernur 2'],
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
        $this->db->join('epak_kabupaten c', 'c.id = a.kab_id');
        // $this->db->join('epak_kecamatan b', 'b.id = a.kec_id');
        $this->db->select('a.*, c.nama as nama_kab');
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