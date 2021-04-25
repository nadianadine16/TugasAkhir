<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function tambah_kritik() {
        $this->id_kritiksaran=uniqid();
        $data = [
            "id_user" => $this->input->post('id_user', true),
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
    public function daftar_tutor() {
        $this->db->select('*');
        $this->db->from('tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tutor(){
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('tutor', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');                        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function namaTujuan($send_to){
        $this->db->select('nama');
        $this->db->from('mahasiswa');
        $this->db->where('id_mahasiswa', $send_to);
        $query = $this->db->get();
        return $query->result_array();        
        
    }
    public function daftar_materi_limit() {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');        
        $this->db->limit(4);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function daftar_materi() {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function daftar_materi_byKategori($id) {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');        
        $this->db->where('kategori_materi.id_kategori_materi', $id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function Konten($id) {
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->join('materi', 'materi.id_materi = konten.id_materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');
        $this->db->where('materi.id_materi', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getMateriByIdMateri($id_materi) {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'tutor.id_tutor = materi.id_tutor');
        $this->db->join('mahasiswa', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->db->where('materi.id_materi', $id_materi);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail_konten($id) {
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->join('materi', 'materi.id_materi = konten.id_materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');
        $this->db->where('konten.id_konten', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tampil_tugas($id) {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tugas.id_mahasiswa');
        $this->db->join('konten', 'tugas.id_konten = konten.id_konten');
        $this->db->where('konten.id_konten', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function cek_tugas($id) {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tugas.id_mahasiswa');
        $this->db->join('konten', 'tugas.id_konten = konten.id_konten');
        $this->db->where('konten.id_konten', $id);
        $query = $this->db->get();
        if($query->num_rows()==1) {
            return $query->result_array();
        }
        else {
            return false;
        }
        // return $query->result_array();
    }

    public function tambah_tugas() {
        $this->id_tugas = uniqid();
        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "id_konten" => $this->input->post('id_konten', true),
            "tugas" => $this->input->post('tugas', true)
        ];
        $this->db->insert('tugas', $data);
    }

    public function revisi_tugas($id_tugas) {
        $data = [
            "id_tugas" => $this->input->post('id_tugas', true),
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "id_konten" => $this->input->post('id_konten', true),
            "tugas" => $this->input->post('tugas', true),
            "status" => $this->input->post('status', true),
            "revisi" => NULL
        ];
        $this->db->where('id_tugas', $data['id_tugas']);
        $this->db->update('tugas', $data);
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

    public function getAllForum($limit, $start) {
        $this->db->select('*');
        $this->db->from('forum');
        $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');    
        $this->db->limit($limit,$start);
        $this->db->order_by('forum.created_at', 'DESC');
        
        
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
    public function Jawab_Private_Chat($id_mahasiswa, $id_tutor) {
        $this->id_pesan = uniqid();
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', $id_mahasiswa),
            "id_tutor" => $this->input->post('id_tutor', $id_tutor),
            "isi_pesan" => $this->input->post('isi_pesan', true),
            "time" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('private_chat', $data);
    }

    public function detailTutor($id)
    {
        $this->db->select('*');
        $this->db->from('tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');                        
        $this->db->join('kategori_materi', 'kategori_materi.id_kategori_materi = tutor.id_kategori_materi');        
        $this->db->where('tutor.id_tutor', $id);
        $query = $this->db->get();
        return $query->result_array();                        
    }

    public function Detail_Akun($id_mahasiswa)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');       
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $query = $this->db->get();
        return $query->result_array();                        
    }

    public function Tugas_Mahasiswa($id_mahasiswa) {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('konten', 'tugas.id_konten = konten.id_konten');       
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->order_by('tugas', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function cek($id_konten) {
        $this->db->select('*');
        $this->db->from('tugas');     
        $this->db->where('id_konten', $id_konten);
        $this->db->where('id_mahasiswa', $this->session->userdata('id_mahasiswa'));
        $query = $this->db->get();
        return $query->result_array();
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
    public function pesan_private_chat($id, $pengirim) {
        $condition= "`send_to`= '$id' AND `send_by` = '$pengirim' OR `send_to`= '$pengirim' AND `send_by` = '$id'";
        $this->db->select('*');
        $this->db->from('private_chat');    
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = private_chat.send_to');
        
        $this->db->where($condition);        
        $query = $this->db->get();
        return $query->result_array();                        
    }             
    public function search(){
        $keyword=$this->input->post('keyword');
        $this->db->select('*');
        $this->db->from('forum');
        $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');            
        $this->db->like('kategori_materi.nama_kategori', $keyword);        
        $this->db->or_like('forum.pertanyaan', $keyword);
        $this->db->order_by('forum.created_at', 'DESC');        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countMateri($id){
        $this->db->select('COUNT(id_materi)');
        $this->db->from('materi');
        $this->db->where('id_kategori_materi', $id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getData($rowno,$rowperpage,$search="") {
 
        $this->db->select('*');
        $this->db->from('posts');
    
        if($search != ''){
          $this->db->like('title', $search);
          $this->db->or_like('content', $search);
        }
    
        $this->db->limit($rowperpage, $rowno); 
        $query = $this->db->get();
     
        return $query->result_array();
      }
    
      // Select total records
      public function getrecordCount($search = '') {
    
        $this->db->select('count(*) as allcount');
        $this->db->from('posts');
     
        if($search != ''){
          $this->db->like('title', $search);
          $this->db->or_like('content', $search);
        }
    
        $query = $this->db->get();
        $result = $query->result_array();
     
        return $result[0]['allcount'];
      }

      public function GetChat($send_to,$pengirim) {
        $this->db->where_in('from', [$id,$to]);
        $this->db->where_in('to', [$id,$to]);
        $this->db->order_by('created_at', 'ASC');        
      }     
      public function jumlah_tutor() {
        return $this->db->count_all('tutor');
      }

      public function jumlah_materi() {
        return $this->db->count_all('materi');
      }

      public function jumlah_kategori() {
        return $this->db->count_all('kategori_materi');
      }

      public function jumlah_konten() {
        return $this->db->count_all('konten');
      }

      public function cek_forum() {
        $this->db->select('*');
        $this->db->from('forum');
               
        $query = $this->db->get();
        return $query->result_array();
      }
    
}
?>