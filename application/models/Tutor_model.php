<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tutor_model extends CI_Model {

    public function getAllKategoriMateri(){
        $this->db->select('*');
        $this->db->from('kategori_materi');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function cekNim($nim) {
        $mahasiswaNim=$this->db->query("SELECT m.id_mahasiswa FROM mahasiswa m WHERE m.nim= $nim AND NOT EXISTS (SELECT * FROM tutor t WHERE t.id_mahasiswa = m.id_mahasiswa)");		
        if($mahasiswaNim->num_rows()==1) {
            $this->id_tutor = uniqid();
            
        $data = [
            "id_mahasiswa" => $this->input->post($mahasiswaNim),
            "id_kategori_materi" => $this->input->post('id_kategori_materi', true),
            "status" => $this->input->post('status', true),
            
        ];
        $this->db->insert('tutor', $data);
            // return $mahasiswaNim->result();
        }
        else {
            return false;
        }
    }
    public function Tambah_Tutor(){
        $this->id_tutor = uniqid();
        
        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "id_kategori_materi" => $this->input->post('id_kategori_materi', true),
        ];
        $this->db->insert('tutor', $data);
    }
    public function search1($keyword){
        $status = 2;
        // $query=$this->db->query("SELECT * FROM mahasiswa m JOIN tutor t on t.id_mahasiswa = m.id_mahasiswa where m.nim = '$keyword' and t.status = '2' LIMIT 1 ");
		// return $query;
        $this->db->select('*');
        $this->db->from("mahasiswa AS t2");
        $this->db->join("tutor AS t1", "t2.id_mahasiswa = t1.id_mahasiswa");  # confirm user_order_id in both table
        $this->db->where('nim',$keyword);
        $this->db->where(array('status'=>$status));
        $this->db->limit(1);
        
        $query = $this->db->get();
        return $query->result();
    }
    public function search2($keyword){
        $status = 1;
        $this->db->select('*');
        $this->db->from("mahasiswa AS t2");
        $this->db->join("tutor AS t1", "t2.id_mahasiswa = t1.id_mahasiswa");  # confirm user_order_id in both table
        $this->db->where('nim',$keyword);
        $this->db->where(array('status'=>$status));
        $query = $this->db->get();
        return $query->result();
    }
    public function search3(){
        $this->db->select('*');
        $this->db->from('tutor');
        $this->db->join('mahasiswa', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');        
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>