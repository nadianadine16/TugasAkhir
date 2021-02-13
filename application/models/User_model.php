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
}
?>