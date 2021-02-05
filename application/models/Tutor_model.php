<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Tutor_model extends CI_Model {

        public function getAllKategoriMateri(){
            $query = $this->db->get('kategori_materi');
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
            // $config['file_name'] = $this->id_materi;
            $config['overwrite'] = true;
            // $config['max_size'] = 1024;

            $this->upload->initialize($config);
            $this->load->library('upload',$config);
            if($this->upload->do_upload('video')) {
                return $this->upload->data("file_name");
            }
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
    }
?>