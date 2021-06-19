<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin_model extends CI_Model {

        // untuk mendapatkan semua data mahasiswa
        public function getAllMahasiswa(){
            $this->db->select('*');
            $this->db->from('mahasiswa');

            $query = $this->db->get();
            return $query->result_array();
        }

        // get data mahasiswa sesuai id_mahasiswa untuk detail mahasiswa
        public function detail_mahasiswa($id){
            $this->db->select('*');
            $this->db->from('mahasiswa');
            $this->db->where('id_mahasiswa', $id);
            
            $query = $this->db->get();
            return $query->result_array();
        }

        // function untuk menambah data mahasiswa
        public function tambah_data_mahasiswa() {
            $this->id_mahasiswa = uniqid();
            $data = [
                "nim" => $this->input->post('nim', true),
                "nama" => $this->input->post('nama', true),
                "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
                "jurusan" => $this->input->post('jurusan', true),
                "prodi" => $this->input->post('prodi', true),
                "tahun_masuk" => $this->input->post('tahun_masuk', true),
                "github" => $this->input->post('github', true)
            ];

            $this->db->insert('mahasiswa', $data);
        }

        // get data mahasiswa sesuai id_mahasiswa untuk edit mahasiswa
        public function getMahasiswaById($id) {
            $query=$this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id));

            return $query->row_array();
        }

        // function edit data mahasiswa sesuai dengan id_mahasiswa
        public function edit_data_mahasiswa($id){
            $post=$this->input->post();
            $this->id_mahasiswa = $post["id_mahasiswa"];
            $this->nim = $post["nim"];
            $this->nama = $post["nama"];
            $this->jenis_kelamin = $post["jenis_kelamin"];
            $this->jurusan = $post["jurusan"];
            $this->prodi = $post["prodi"];
            $this->tahun_masuk = $post["tahun_masuk"];
            $this->github = $post["github"];
            
            $this->db->update('mahasiswa',$this, array('id_mahasiswa' => $post['id_mahasiswa']));
        }

        // function untuk menghapus data mahasiswa sesuai id_mahasiswa
        public function hapus_data_mahasiswa($id){
            return $this->db->delete('mahasiswa',array("id_mahasiswa"=>$id));
        }

        // function untuk mendapatkan semua data tutor yang elah diverifikasi
        public function getAllTutor(){
            $status = 2;
            $this->db->select('*');
            $this->db->from('tutor');
            $this->db->join('mahasiswa', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');        
            $this->db->where(array('status'=>$status));

            $query = $this->db->get();
            return $query->result_array();
        }

        // function untuk menghapus data tutor sesuai id_tutor
        public function hapus_data_tutor($id){
            return $this->db->delete('tutor',array("id_tutor"=>$id));
        }

        // untuk mendapatkan semua data kategori materi
        public function getAllKategoriMateri(){
            $this->db->select('*');
            $this->db->from('kategori_materi');

            $query = $this->db->get();
            return $query->result_array();
        }

        // function edit kategori materi sesuai id_kategori_materi
        public function edit_data_kategori_materi($id){
            $post=$this->input->post();
            $this->id_kategori_materi = $post["id_kategori_materi"];
            $this->nama_kategori = $post["nama_kategori"];
            
            $this->db->update('kategori_materi',$this, array('id_kategori_materi' => $post['id_kategori_materi']));
        }

        // get data kategori materi sesuai id_kategori_materi
        public function getKategoriMateriById($id) {
            $query=$this->db->get_where('kategori_materi',array('id_kategori_materi'=>$id));

            return $query->row_array();
        }

        // function hapus data kategori materi sesuai id_kategori_materi
        public function hapus_data_kategori_materi($id){
            return $this->db->delete('kategori_materi',array("id_kategori_materi"=>$id));
        }

        // function menambah data kategori materi
        public function tambah_kategori_materi() {
            $this->id_kategori_materi = uniqid();
            $data = [            
                "nama_kategori" => $this->input->post('nama_kategori', true),
            ];

            $this->db->insert('kategori_materi', $data);
        }

        // menampilkan daftar calon tutor yang belum diverifikasi
        public function getUnregPendaftaran() {
            $status = 1;
            $this->db->select('*');
            $this->db->from('tutor');
            $this->db->join('mahasiswa', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');
            $this->db->join('kategori_materi', 'tutor.id_kategori_materi = kategori_materi.id_kategori_materi');        
            $this->db->where(array('status'=>$status));

            $query = $this->db->get();
            return $query->result_array();
        }

        // function mengupdate status tutor saat verifikasi (diterima) sesuai dengan id_tutor
        public function status_pendaftaran($id) {
            $data = [
                "status" => $this->input->post("status", true)
            ];

            $this->db->where('id_tutor', $this->input->post('id_tutor'));
            $this->db->update('tutor', $data);
        }

        // mendapatkan semua data kritik dan saran
        public function getAllKritikSaran(){
            $this->db->select('*');
            $this->db->from('kritik_saran');
            $this->db->join('mahasiswa', 'kritik_saran.id_user = mahasiswa.id_mahasiswa');

            $query = $this->db->get();
            return $query->result_array();
        }

        // function menghapus kritik dan saran sesuai id_kritik_saran
        public function hapus_kritik_saran($id){
            return $this->db->delete('kritik_saran',array("id_kritiksaran"=>$id));
        }

        // function untuk memeriksa apakah password lama yang dimasukkan admin telah sesuai dengan database
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

        // function untuk aksi mengubah password
        public function Update_Password($password_baru){
            $data = array(
                'password' => $password_baru
            );

            $this->db->where('id_admin', $this->input->post('id_admin'));
            $this->db->update('admin', $data);
            return true;
        }

        // menghitung jumlah data mahasiswa
        public function getCountMahasiswa() {
            return $this->db->count_all('mahasiswa');
        }

        // menghitung jumlah data tutor
        public function getCountTutor() {
            $i = 2;
            $this->db->where('status', $i); // OTHER CONDITIONS IF ANY
            $this->db->from('tutor'); //TABLE NAME
            return $this->db->count_all_results();
        }

        // menghitung jumlah data kategori materi
        public function getCountKategoriMateri() {
            return $this->db->count_all('kategori_materi');
        }

        // menghitung jumlah data kritik dan saran
        public function getCountKritikSaran() {
            return $this->db->count_all('kritik_saran');
        }

        // menghitung jumlah data forum
        public function getCountForum() {
            return $this->db->count_all('forum');
        }

        public function Cek_Jawaban($id_forum) { //pemeriksaan jawaban forum kosong/tidak
            $this->db->select('*');
            $this->db->from('chat_forum');
            $this->db->join('forum', 'forum.id_forum = chat_forum.id_forum');
            $this->db->where('chat_forum.id_forum', $id_forum);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function jawaban($id) { //menampilkan jawaban forum sesuai id_forum
            $this->db->select('*');
            $this->db->from('chat_forum');
            $this->db->join('mahasiswa', 'chat_forum.id_user = mahasiswa.id_mahasiswa');
            $this->db->join('forum', 'forum.id_forum = chat_forum.id_forum');
            $this->db->where('forum.id_forum', $id);
            $this->db->order_by('chat_forum.send_time','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }    

        public function detail_pertanyaan($id_forum) { //menampilkan detail pertanyaan forum sesuai id_forum
            $this->db->select('*');
            $this->db->from('forum');
            $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');  
            $this->db->where('forum.id_forum', $id_forum);
            $query = $this->db->get();
            return $query->result_array();
        }

        // mendapatkan semua data forum
        public function getAllForum(){
            $this->db->select('*');
            $this->db->from('forum');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');
            $this->db->join('kategori_materi', 'kategori_materi.id_kategori_materi = forum.id_kategori_Materi'); 

            $query = $this->db->get();
            return $query->result_array();
        }

        // get data forum sesuai dengan id_forum
        public function getForumById($id){
            $this->db->select('*');
            $this->db->from('forum');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');
            $this->db->join('kategori_materi', 'kategori_materi.id_kategori_materi = forum.id_kategori_Materi');        
            $this->db->where('forum.id_forum', $id);
            
            $query = $this->db->get();
            return $query->result_array();
        }

        // get semua data jawaban forum sesuai dengan id_forum yang dipilih
        public function jawaban_forum($id) {
            $this->db->select('*');
            $this->db->from('chat_forum');
            $this->db->join('mahasiswa', 'chat_forum.id_user = mahasiswa.id_mahasiswa');
            $this->db->join('forum', 'forum.id_forum = chat_forum.id_forum');
            $this->db->where('forum.id_forum', $id);
            $this->db->order_by('chat_forum.created_at','ASC');

            $query = $this->db->get();
            return $query->result_array();
        }
        
        // function menghapus forum sesuai id_forum
        public function hapus_forum($id){
            return $this->db->delete('forum',array("id_forum"=>$id));
        }

        // get data tutor sesuai dengan id_tutor
        public function getTutorById($id){
            $this->db->select('*');
            $this->db->from('tutor');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');                        
            $this->db->join('kategori_materi', 'kategori_materi.id_kategori_materi = tutor.id_kategori_materi');        
            $this->db->where('tutor.id_tutor', $id);
            
            $query = $this->db->get();
            return $query->result_array();                             
        }

        // menghitung session 5 mahasiswa yang sering aktif
        public function getCountSessionMahasiswa(){
            $this->db->select('s.id_mahasiswa, m.nama, COUNT(s.id_mahasiswa) AS hitung');
            $this->db->from('session_mahasiswa_tutor AS s');
            $this->db->join('mahasiswa AS m', 'm.id_mahasiswa = s.id_mahasiswa');
            $this->db->group_by('s.id_mahasiswa');
            $this->db->order_by('hitung', 'desc');
            $this->db->limit(5);               

            $query = $this->db->get();
            return $query->result();                             
        }

        // menghitung session 5 tutor yang sering aktif
        public function getCountSessionTutor(){
            $query = $this->db->query('SELECT session_mahasiswa_tutor.id_tutor, mahasiswa.nama, 
            COUNT(session_mahasiswa_tutor.id_tutor) as hasilTutor FROM session_mahasiswa_tutor 
            JOIN tutor ON session_mahasiswa_tutor.id_tutor = tutor.id_tutor JOIN mahasiswa ON 
            mahasiswa.id_mahasiswa = tutor.id_mahasiswa GROUP BY session_mahasiswa_tutor.id_tutor 
            ORDER BY hasilTutor DESC LIMIT 5');

            return $query->result();                             
        }        
        
    }
?>