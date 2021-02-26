<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function tambah_kritik() {
        $this->id_kritiksaran=uniqid();
        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "subject" => $this->input->post('subject', true),
            "kritik_saran" => $this->input->post('kritik_saran', true),
        ];
        $this->db->insert('kritik_saran', $data);
    }

    public function edit_profile() {
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
    }

    public function getAllKategoriMateri() {
        $this->db->select('*');
        $this->db->from('kategori_materi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function daftar_materi($id) {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');
        $this->db->where('materi.id_kategori_materi', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail_materi($id) {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');
        $this->db->where('materi.id_materi', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tampil_tugas($id) {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tugas.id_mahasiswa');
        $this->db->join('materi', 'tugas.id_materi = materi.id_materi');
        $this->db->where('materi.id_materi', $id);
        $query = $this->db->get();
        return $query->result_array();
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

    public function Tanya_Forum() {
        $this->id_forum = uniqid();
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "id_kategori_materi" => $this->input->post('id_kategori_materi', true),
            "pertanyaan" => $this->input->post('pertanyaan', true),
            "created_at" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('forum', $data);
    }

    public function getAllForum() {
        $this->db->select('*');
        $this->db->from('forum');
        $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail_pertanyaan($id_forum) {
        $this->db->select('*');
        $this->db->from('forum');
        $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->where('forum.id_forum', $id_forum);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Jawab_Forum($id) {
        $this->id_chat_forum = uniqid();
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            "id_forum" => $this->input->post('id_forum', $id),
            "id_user" => $this->input->post('id_user', true),
            "chat" => $this->input->post('chat', true),
            "created_at" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('chat_forum', $data);
    }

    public function jawaban($id) {
        $this->db->select('*');
        $this->db->from('chat_forum');
        $this->db->join('mahasiswa', 'chat_forum.id_user = mahasiswa.id_mahasiswa');
        $this->db->join('forum', 'forum.id_forum = chat_forum.id_forum');
        $this->db->where('forum.id_forum', $id);
        $this->db->order_by('chat_forum.created_at','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>