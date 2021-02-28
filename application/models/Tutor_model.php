<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Tutor_model extends CI_Model {

        public function getAllKategoriMateri() {
            $query = $this->db->get('kategori_materi');
            return $query->result_array();
        }

        public function cekNim($nim) {
            $query=$this->db->query("SELECT m.id_mahasiswa FROM mahasiswa m WHERE m.nim= $nim AND NOT EXISTS (SELECT * FROM tutor t WHERE t.id_mahasiswa = m.id_mahasiswa)");
            return $query;		
            // if($mahasiswaNim->num_rows()==1) {
            //     $this->id_tutor = uniqid();
                
            // $data = [
            //     "id_mahasiswa" => $this->input->post($mahasiswaNim),
            //     "id_kategori_materi" => $this->input->post('id_kategori_materi', true),
            //     "status" => $this->input->post('status', true),
                
            // ];
            // $this->db->insert('tutor', $data);
                // return $mahasiswaNim->result();
            // }
            // else {
            //     return false;
            // }
        }

        public function Tambah_Tutor($nim) {
            $status = 1;

            $this->id_tutor = uniqid();
            $data = [
                "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
                "id_kategori_materi" => $this->input->post('id_kategori_materi', true),
                "status" => $this->input->post('status', $status)
            ];

            $this->db->insert('tutor', $data);
        }

        
        public function Tambah_Materi() {
            $this->id_materi = uniqid();
            $data = [
                "nama_materi" => $this->input->post('nama_materi', true),
                "id_tutor" => $this->input->post('id_tutor', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "id_kategori_materi" => $this->input->post('id_kategori_materi', true),
                "video" => $this->upload_video()
            ];
            $this->db->insert('materi', $data);
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

        public function detail_materi($id_materi) {
            $this->db->select('*');
            $this->db->from('materi');
            $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->where('materi.id_materi', $id_materi);
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

        public function Hapus_materi($id_materi) {
            return $this->db->delete('materi',array("id_materi"=>$id_materi));
        }

        public function getMateriById($id_materi) {
            $query=$this->db->get_where('materi',array('id_materi'=>$id_materi));
            return $query->row_array();
        }

        public function Edit_Materi($id_materi) {
            $post=$this->input->post();
            $this->id_materi = $post["id_materi"];
            $this->nama_materi = $post["nama_materi"];
            $this->deskripsi = $post["deskripsi"];
            $this->id_tutor = $post["id_tutor"];
            $this->id_kategori_materi = $post["id_kategori_materi"];
            $this->video = $this->upload_video();
            
            $this->db->update('materi',$this, array('id_materi' => $post['id_materi']));
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
                "id_tutor" => $this->input->post('id_tutor', true),
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

        public function getAllForum($limit, $start){
            $this->db->select('*');
            $this->db->from('forum');
            $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');  
            $this->db->limit($limit,$start);                                              
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
        public function getAllKategoriForum(){
            $this->db->select('kategori_materi.id_kategori_materi, kategori_materi.nama_kategori, COUNT(forum.id_kategori_materi) AS total');
            $this->db->from('kategori_materi');
            $this->db->join('forum', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->group_by('forum.id_kategori_materi');         
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
    }
?>