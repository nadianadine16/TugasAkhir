<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Tutor_model extends CI_Model {

        public function Hitung_Forum() {
            return $this->db->count_all('forum');
        }

        public function Hitung_Materi() {
            return $this->db->get_where('materi', array('id_tutor' => $this->session->userdata('id_tutor') ))->num_rows();
        }

        public function Hitung_Tugas_Mahasiswa() {
            return $this->db->get_where('tugas', array('id_materi' => $this->session->userdata('id_materi') ))->num_rows();
        }
        
        public function getAllKategoriMateri() {
            $query = $this->db->get('kategori_materi');
            return $query->result_array();
        }

        public function getNim() {
            $query = $this->db->get('mahasiswa');
            return $query->result_array();
        }

        public function cekNim($nim) {
            $query=$this->db->query("SELECT m.id_mahasiswa FROM mahasiswa m WHERE m.nim= $nim AND NOT EXISTS (SELECT * FROM tutor t WHERE t.id_mahasiswa = m.id_mahasiswa)");
            return $query;
        }

        public function Tambah_Tutor() {
            $status = 1;

            $this->id_tutor = uniqid();
            $data = [
                "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
                "id_kategori_materi" => $this->input->post('id_kategori_materi', true),
                "status" => $this->input->post('status', $status),
                "surat_pernyataan" => $this->upload_surat_pernyataan()
            ];

            $this->db->insert('tutor', $data);
        }

        public function upload_surat_pernyataan() {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'pdf|docx';
            $config['overwrite'] = true;

            $this->upload->initialize($config);
            $this->load->library('upload',$config);
            if($this->upload->do_upload('surat_pernyataan')) {
                return $this->upload->data("file_name");
            }
        }
        
        public function Tambah_Materi() {
            $this->id_materi = uniqid();
            $data = [
                "nama_materi" => $this->input->post('nama_materi', true),
                "id_tutor" => $this->input->post('id_tutor', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "requirement" => $this->input->post('requirement', true),
                "isi" => $this->input->post('isi', true),
                "id_kategori_materi" => $this->input->post('id_kategori_materi', true)
            ];
            $this->db->insert('materi', $data);
        }

        public function Detail_materi($id_materi) {
            $this->db->select('*');
            $this->db->from('konten');
            $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->where('materi.id_materi', $id_materi);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function Konten($id_materi) {
            $this->db->select('*');
            $this->db->from('konten');
            $this->db->join('materi', 'materi.id_materi = konten.id_materi');
            $this->db->where('konten.id_materi', $id_materi);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function getMateriByIdTutor($id_tutor) {
            $this->db->select('*');
            $this->db->from('materi');
            $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
            $this->db->where('tutor.id_tutor', $id_tutor);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function getMateriByIdMateri($id_materi) {
            $this->db->select('*');
            $this->db->from('materi');
            $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->where('materi.id_materi', $id_materi);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function Tambah_Konten() {
            $this->id_konten = uniqid();
            $data = [
                "judul" => $this->input->post('judul', true),
                "id_materi" => $this->input->post('id_materi', true),
                "soal" => $this->input->post('soal', true),
                "video" => $this->upload_video(),
                "file_pendukung" => $this->upload_file_pendukung(),
            ];
            $this->db->insert('konten', $data);
        }

        public function upload_video() {
            $config['upload_path'] = './upload/materi/';
            $config['allowed_types'] = 'mp4|3gp|flv';
            $config['overwrite'] = true;

            $this->upload->initialize($config);
            $this->load->library('upload',$config);
            if($this->upload->do_upload('video')) {
                return $this->upload->data("file_name");
            }
        } 

        public function upload_file_pendukung() {
            $config['upload_path'] = './upload/materi/';
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = true;

            $this->upload->initialize($config);
            $this->load->library('upload',$config);
            if($this->upload->do_upload('file_pendukung')) {
                return $this->upload->data("file_name");
            }
        } 

        public function Hapus_materi($id_materi) {
            return $this->db->delete('materi',array("id_materi"=>$id_materi));
        }

        public function Hapus_Konten($id_konten) {
            return $this->db->delete('konten',array("id_konten"=>$id_konten));
        }

        public function getMateriById($id_materi) {
            $query=$this->db->get_where('materi',array('id_materi'=>$id_materi));
            return $query->row_array();
        }

        public function getKontenById($id_konten) {
            $query=$this->db->get_where('konten',array('id_konten'=>$id_konten));
            return $query->row_array();
        }

        public function Edit_Materi($id_materi) {
            $post=$this->input->post();
            $this->id_materi = $post["id_materi"];
            $this->nama_materi = $post["nama_materi"];
            $this->deskripsi = $post["deskripsi"];
            $this->isi = $post["isi"];
            $this->requirement = $post["requirement"];
            $this->id_tutor = $post["id_tutor"];
            $this->id_kategori_materi = $post["id_kategori_materi"];
            
            $this->db->update('materi',$this, array('id_materi' => $post['id_materi']));
        }

        public function Edit_Konten($id_konten) {
            $post=$this->input->post();
            $this->id_konten = $post["id_konten"];
            $this->id_materi = $post["id_materi"];
            $this->soal = $post["soal"];
            $this->video = $this->upload_video();
            $this->file_pendukung = $this->upload_file_pendukung();
            
            $this->db->update('konten',$this, array('id_konten' => $post['id_konten']));
        }

        public function getAllTugasUnVerif() {
            $status = 1;

            $this->db->select('*');
            $this->db->from('tugas');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tugas.id_mahasiswa');
            $this->db->join('materi', 'materi.id_materi = tugas.id_materi');
            $this->db->where('tugas.status', $status);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function getAllTugasVerif() {
            $status = 2;

            $this->db->select('*');
            $this->db->from('tugas');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tugas.id_mahasiswa');
            $this->db->join('materi', 'materi.id_materi = tugas.id_materi');
            $this->db->where('tugas.status', $status);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function Verifikasi_Tugas($id_tugas) {
            $this->db->set('status', 2);
            $this->db->where('id_tugas',$id_tugas);
        
            $this->db->update("tugas");
        }

        public function Hapus_Tugas($id_tugas) {
            return $this->db->delete('tugas',array("id_tugas"=>$id_tugas));
        }

        public function Kritik_Saran() {
            $this->id_kritiksaran = uniqid();
            $data = [
                "subject" => $this->input->post('subject', true),
                "id_user" => $this->input->post('id_user', true),
                "kritik_saran" => $this->input->post('kritik_saran', true)
            ];
            $this->db->insert('kritik_saran', $data);
        }

        public function Cari_Materi($kayword) {
            $keyword=$this->input->post('keyword');

            $this->db->select('*');
            $this->db->from('materi');
            $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->like('materi.nama_materi', $keyword);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function getAllForum(){
            $this->db->select('*');
            $this->db->from('forum');
            $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');  
            // $this->db->limit($limit,$start);                                              
            $query = $this->db->get();
            return $query->result_array();
        }

        public function detail_pertanyaan($id_forum) {
            $this->db->select('*');
            $this->db->from('forum');
            $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');  
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
                "created" => date('Y-m-d H:i:s', time())
            ];
    
            $this->db->insert('chat_forum', $data);
        }
    
        public function jawaban($id) {
            $this->db->select('*');
            $this->db->from('chat_forum');
            $this->db->join('mahasiswa', 'chat_forum.id_user = mahasiswa.id_mahasiswa');
            $this->db->join('forum', 'forum.id_forum = chat_forum.id_forum');
            $this->db->where('forum.id_forum', $id);
            $this->db->order_by('chat_forum.created','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function getAllKategoriForum(){
            $this->db->select('kategori_materi.id_kategori_materi, kategori_materi.nama_kategori, COUNT(forum.id_kategori_materi) AS total');
            $this->db->from('kategori_materi');
            $this->db->join('forum', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->group_by('forum.id_kategori_materi');         
            $query = $this->db->get();
            return $query->result_array();            
        }        

        public function search($keyword){
            $keyword=$this->input->post('id_kategori');
            $this->db->select('*');
            $this->db->from('forum');
            $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');            
            $this->db->like('kategori_materi.id_kategori_materi', $keyword);        
            $this->db->order_by('forum.created_at', 'DESC');        
            $query = $this->db->get();
            return $query->result_array();
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