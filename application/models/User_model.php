<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function tambah_kritik(){
        $this->id_kritiksaran=uniqid();
        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "subject" => $this->input->post('subject', true),
            "kritik_saran" => $this->input->post('kritik_saran', true),
        ];
        $this->db->insert('kritik_saran', $data);
    }
    public function edit_profile(){
        // $this->id_mahasiswa = $post["id_mahasiswa"];
        // $this->nim = $post["nim"];
        // $this->nama = $post["nama"];
        // $this->jurusan = $post["jurusan"];
        // $this->prodi = $post["prodi"];
        // $this->kelas = $post["kelas"];
        // $this->tahun_masuk = $post["tahun_masuk"];
        // $this->github = $post["github"];
        
        // $this->db->update('mahasiswa',$this, array('id_mahasiswa' => $post['id_mahasiswa']));
        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "nim" => $this->input->post('nim', true),
            "nama" => $this->input->post('nama', true),
            "jurusan" => $this->input->post('jurusan', true),
            "prodi" => $this->input->post('prodi', true),
            "kelas" => $this->input->post('kelas', true),
            "tahun_masuk" => $this->input->post('tahun_masuk', true),
            "github" => $this->input->post('github', true),
        ];
        $this->db->where('id_mahasiswa', $data['id_mahasiswa']);
        $this->db->update('mahasiswa', $data);
        // $this->db->insert('mahasiswa', $data);
    }
    public function getAllKategoriMateri(){
        $this->db->select('*');
        $this->db->from('kategori_materi');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function daftar_materi($id){
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');
        $this->db->where('materi.id_kategori_materi', $id);
        $query = $this->db->get();
        return $query->result_array();
        // return $this->db->get_where('materi', array('id_kategori_materi' => $id))->result_array();
    }
    public function detail_materi($id){
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');
        $this->db->where('materi.id_materi', $id);
        $query = $this->db->get();
        return $query->result_array();
        // return $this->db->get_where('materi', array('id_kategori_materi' => $id))->result_array();
    }
    public function tampil_tugas($id){
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tugas.id_mahasiswa');
        $this->db->join('materi', 'tugas.id_materi = materi.id_materi');
        $this->db->where('materi.id_materi', $id);
        $query = $this->db->get();
        return $query->result_array();
        // return $this->db->get_where('materi', array('id_kategori_materi' => $id))->result_array();
    }
    public function tambah_tugas() {
        $this->id_tugas = uniqid();
        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "id_materi" => $this->input->post('id_materi', true),
            "tugas" => $this->input->post('tugas', true),
        ];
        $this->db->insert('tugas', $data);
    }
}
?>