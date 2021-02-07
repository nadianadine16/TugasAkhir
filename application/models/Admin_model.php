<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function getAllMahasiswa(){
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function detail_mahasiswa($id){
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('id_mahasiswa', $id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tambah_data_mahasiswa() {
        $this->id_mahasiswa = uniqid();
        $data = [
            "nim" => $this->input->post('nim', true),
            "nama" => $this->input->post('nama', true),
            "jurusan" => $this->input->post('jurusan', true),
            "prodi" => $this->input->post('prodi', true),
            "kelas" => $this->input->post('kelas', true),
            "tahun_masuk" => $this->input->post('tahun_masuk', true),
            "github" => $this->input->post('github', true),
        ];
        $this->db->insert('mahasiswa', $data);
    }
    public function getMahasiswaById($id) {
        $query=$this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id));
        return $query->row_array();
    }
    public function edit_data_mahasiswa($id){
        $post=$this->input->post();
        $this->id_mahasiswa = $post["id_mahasiswa"];
        $this->nim = $post["nim"];
        $this->nama = $post["nama"];
        $this->jurusan = $post["jurusan"];
        $this->prodi = $post["prodi"];
        $this->kelas = $post["kelas"];
        $this->tahun_masuk = $post["tahun_masuk"];
        $this->github = $post["github"];
        
        $this->db->update('mahasiswa',$this, array('id_mahasiswa' => $post['id_mahasiswa']));
    }
    public function hapus_data_mahasiswa($id){
        return $this->db->delete('mahasiswa',array("id_mahasiswa"=>$id));
    }
    public function getAllTutor(){
        $status = 2;
        $this->db->select('*');
        $this->db->from('tutor');
        $this->db->join('mahasiswa', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');        
        $this->db->where(array('status'=>$status));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function hapus_data_tutor($id){
        return $this->db->delete('tutor',array("id_tutor"=>$id));
    }
    public function getAllKategoriMateri(){
        $this->db->select('*');
        $this->db->from('kategori_materi');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function edit_data_kategori_materi($id){
        $post=$this->input->post();
        $this->id_kategori_materi = $post["id_kategori_materi"];
        $this->nama_kategori = $post["nama_kategori"];
        
        $this->db->update('kategori_materi',$this, array('id_kategori_materi' => $post['id_kategori_materi']));
    }
    public function getKategoriMateriById($id) {
        $query=$this->db->get_where('kategori_materi',array('id_kategori_materi'=>$id));
        return $query->row_array();
    }
    public function hapus_data_kategori_materi($id){
        return $this->db->delete('kategori_materi',array("id_kategori_materi"=>$id));
    }
    public function tambah_kategori_materi() {
        $this->id_kategori_materi = uniqid();
        $data = [            
            "nama_kategori" => $this->input->post('nama_kategori', true),
        ];
        $this->db->insert('kategori_materi', $data);
    }
    public function getUnregPendaftaran() {
        $status = 1;
        $this->db->select('*');
        $this->db->from('tutor');
        $this->db->join('mahasiswa', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');        
        $this->db->where(array('status'=>$status));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function status_pendaftaran($id) {
        $data = [
            "status" => $this->input->post("status", true)
        ];
        $this->db->where('id_tutor', $this->input->post('id_tutor'));
        $this->db->update('tutor', $data);
    }
    public function getAllKritikSaran(){
        $this->db->select('*');
        $this->db->from('kritik_saran');
        $this->db->join('mahasiswa', 'kritik_saran.id_mahasiswa = mahasiswa.id_mahasiswa');        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function checkPasswordLama($password_lama){
        $id_admin = $this->input->post('id_admin');
        $this->db->where('id_admin', $id_admin);
        $this->db->where('password', $password_lama);
        $query = $this->db->get('admin');
        if($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }
    public function Update_Password($password_baru){
        $data = array(
            'password' => $password_baru
         );
        $this->db->where('id_admin', $this->input->post('id_admin'));
        $this->db->update('admin', $data);
        return true;
    }
}
?>