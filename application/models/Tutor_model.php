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
}
?>