<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Tutor_model extends CI_Model {

        public function Hitung_Forum() { //function untuk menghitung forum
            return $this->db->count_all('forum');
        }

        public function Hitung_Materi() { //menghitung materi sesuai id_tutor yang sedang login
            return $this->db->get_where('materi', array('id_tutor' => $this->session->userdata('id_tutor') ))->num_rows();
        }

        public function Hitung_Konten() { //menghitung konten sesuai dengan id tutor yang sedan login
            $this->db->select('*');
            $this->db->from('konten');
            $this->db->join('materi', 'materi.id_materi = konten.id_materi');
            $this->db->join('tutor', 'tutor.id_tutor = materi.id_tutor');
            $this->db->where('tutor.id_tutor', $this->session->userdata('id_tutor'));
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function Hitung_Tugas_Mahasiswa() { //menghitung tugas mhs sesuai dengan id_maeri yang dimiliki tutor yg
            return $this->db->get_where('tugas', array('id_materi' => $this->session->userdata('id_materi') ))->num_rows();
        }
        
        public function getAllKategoriMateri() { //menampilkan semua data kategori mater
            $query = $this->db->get('kategori_materi');
            return $query->result_array();
        }

        public function getNim() { //menampilkan NIM yang tidak terdaftar sebagai tutor
            $query=$this->db->query("SELECT * FROM mahasiswa WHERE NOT EXISTS (SELECT * FROM tutor WHERE tutor.id_mahasiswa = mahasiswa.id_mahasiswa)");
            return $query->result_array();
        }

        public function Tambah_Tutor() { //mendaftar tutor
            $status = 1;            
            $kategori_materi = $this->input->post('id_kategori_materi');
            $surat_pernyataan = $this->upload_surat_pernyataan();            
            $this->id_tutor = uniqid();
            $sql = "insert into tutor (id_mahasiswa, id_kategori_materi, surat_pernyataan, status)
                    values ((SELECT id_mahasiswa FROM mahasiswa where nim='".$this->input->post('nim')."'), '$kategori_materi', '$surat_pernyataan', '$status')";
            $this->db->query($sql);            
        }

        public function upload_surat_pernyataan() {
            $config['upload_path'] = './upload/surat_pernyataan/'; //file akan disimpan di dalam folder upload
            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|xls|xlsx'; //ekstensi yang diizinkan hanya pdf
            $config['overwrite'] = true;

            $this->upload->initialize($config);
            $this->load->library('upload',$config);
            if($this->upload->do_upload('surat_pernyataan')) {
                return $this->upload->data("file_name");
            }
        }
        
        public function Tambah_Materi() {  //menambah materi
            $this->id_materi = uniqid();
            $data = [
                "nama_materi" => $this->input->post('nama_materi', true),
                "id_tutor" => $this->input->post('id_tutor', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "requirement" => $this->input->post('requirement', true),
                "id_kategori_materi" => $this->input->post('id_kategori_materi', true),
                "cover" => $this->upload_cover()
            ];
            $this->db->insert('materi', $data);
        }

        public function upload_cover() { //mengupload cover materi
            $config['upload_path'] = './upload/cover_materi/'; //file akan disimpan di dalam folder upload/cover_materi
            $config['allowed_types'] = 'jpg|png|jpeg'; //ekstensi yang diizinkan hanya jpg dan png
            $config['overwrite'] = true;

            $this->upload->initialize($config);
            $this->load->library('upload',$config);
            if($this->upload->do_upload('cover')) {
                return $this->upload->data("file_name");
            }
            return $this->input->post('old_image', true);
        }

        public function Detail_materi($id_materi) { //get data materi sesuai dengan id_materi
            $this->db->select('*');
            $this->db->from('konten');
            $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->where('materi.id_materi', $id_materi);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function Konten($id_materi) { //menampilkan semua data konten sesuai id_materi yang dipilih
            $this->db->select('*');
            $this->db->from('konten');
            $this->db->join('materi', 'materi.id_materi = konten.id_materi');
            $this->db->where('konten.id_materi', $id_materi);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function Cek_Jawaban($id_forum) { //pemeriksaan jawaban forum kosong/tidak
            $this->db->select('*');
            $this->db->from('chat_forum');
            $this->db->join('forum', 'forum.id_forum = chat_forum.id_forum');
            $this->db->where('chat_forum.id_forum', $id_forum);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function getMateriByIdTutor($id_tutor) { //get materi sesuai dengan id_tutor yang sedang login
            $this->db->select('*');
            $this->db->from('materi');
            $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
            $this->db->where('tutor.id_tutor', $id_tutor);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function getMateriByIdMateri($id_materi) { //get materi sesuai dengan id_materi
            $this->db->select('*');
            $this->db->from('materi');
            $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->where('materi.id_materi', $id_materi);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function Tambah_Konten() { //menambah konten
            $this->id_konten = uniqid();
            $data = [
                "judul" => $this->input->post('judul', true),
                "id_materi" => $this->input->post('id_materi', true),
                "soal" => $this->input->post('soal', true),
                "video" => $this->input->post('video', true),
                "file_pendukung" => $this->upload_file_pendukung()
            ];
            $this->db->insert('konten', $data);
        }

        public function upload_file_pendukung() { //mengupload file pendukung di setiap konten
            $config['upload_path'] = './upload/materi/'; //file pendukung akan tersimpan di dalam folder upload/materi
            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|xls|xlsx'; //ekstensi yang dizinkan hanya pdf
            $config['overwrite'] = true;

            $this->upload->initialize($config);
            $this->load->library('upload',$config);
            if($this->upload->do_upload('file_pendukung')) {
                return $this->upload->data("file_name");
            }
            return $this->input->post('old_file', true);
        } 

        public function Hapus_materi($id_materi) { //menghapus materi sesuai id_materi yg dipilih
            return $this->db->delete('materi',array("id_materi"=>$id_materi));
        }

        public function Hapus_Konten($id_konten) { //menghapus konten sesuai id_konten yg dipilih
            return $this->db->delete('konten',array("id_konten"=>$id_konten));
        }

        public function getMateriById($id_materi) { //get materi sesuai id_materi
            $query=$this->db->get_where('materi',array('id_materi'=>$id_materi));
            return $query->row_array();
        }

        public function getKontenById($id_konten) { //get konten sesuai id_konten
            $query=$this->db->get_where('konten',array('id_konten'=>$id_konten));
            return $query->row_array();
        }

        public function Edit_Materi($id_materi) { //edit materi sesuai id_materi
            $post=$this->input->post();
            $this->id_materi = $post["id_materi"];
            $this->nama_materi = $post["nama_materi"];
            $this->deskripsi = $post["deskripsi"];
            $this->requirement = $post["requirement"];
            $this->id_tutor = $post["id_tutor"];
            $this->id_kategori_materi = $post["id_kategori_materi"];
            $this->cover = $this->upload_cover();
            
            $this->db->update('materi',$this, array('id_materi' => $post['id_materi']));
        }

        public function Edit_Konten($id_konten) { //edit konten sesuai id_konten
            $post=$this->input->post();
            $this->id_konten = $post["id_konten"];
            $this->id_materi = $post["id_materi"];
            $this->judul = $post["judul"];
            $this->soal = $post["soal"];
            $this->video = $post["video"];
            $this->file_pendukung = $this->upload_file_pendukung();
            
            $this->db->update('konten',$this, array('id_konten' => $post['id_konten']));
        }

        public function getAllTugasUnVerif() { //get semua data tugas mhs yg blm di verifikasi (status = Diajukan)
            $status = 'Diajukan';

            $this->db->select('*');
            $this->db->from('tugas');
            $this->db->join('konten', 'konten.id_konten = tugas.id_konten');
            $this->db->join('materi', 'materi.id_materi = konten.id_materi');
            $this->db->join('tutor', 'tutor.id_tutor = materi.id_tutor');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tugas.id_mahasiswa');
            $this->db->where('tugas.status', $status);
            $this->db->where('materi.id_tutor', $this->session->userdata('id_tutor'));

            $query = $this->db->get();
            return $query->result_array();
        }

        public function getAllRevisiTugas() { //get semua data tugas mhs yg direvisi (status = revisi)
            $status = 'Revisi';

            $this->db->select('*');
            $this->db->from('tugas');
            $this->db->join('konten', 'konten.id_konten = tugas.id_konten');
            $this->db->join('materi', 'materi.id_materi = konten.id_materi');
            $this->db->join('tutor', 'tutor.id_tutor = materi.id_tutor');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tugas.id_mahasiswa');
            $this->db->where('tugas.status', $status);
            $this->db->where('materi.id_tutor', $this->session->userdata('id_tutor'));

            $query = $this->db->get();
            return $query->result_array();
        }

        public function getAllTugasVerif() { //get semua data tugas mhs yg diverifikasi (status = disetujui)
            $status = 'Disetujui';

            $this->db->select('*');
            $this->db->from('tugas');
            $this->db->join('konten', 'konten.id_konten = tugas.id_konten');
            $this->db->join('materi', 'materi.id_materi = konten.id_materi');
            $this->db->join('tutor', 'tutor.id_tutor = materi.id_tutor');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tugas.id_mahasiswa');
            $this->db->where('tugas.status', $status);
            $this->db->where('materi.id_tutor', $this->session->userdata('id_tutor'));

            $query = $this->db->get();
            return $query->result_array();
        }

        public function Verifikasi_Tugas($id_tugas) { //proses verifikasi tugas
            $this->db->set('status', 'Disetujui'); //mengubah status tugas menjadi disetujui sesuai id_tugas
            $this->db->where('id_tugas',$id_tugas);
        
            $this->db->update("tugas");
        }

        public function Hapus_Tugas($id_tugas) { //menghapus tugas sesuai id_tugas yg dipilih
            return $this->db->delete('tugas',array("id_tugas"=>$id_tugas));
        }

        public function Kritik_Saran() { //mengirim kritik dan saran
            $this->id_kritiksaran = uniqid();
            $data = [
                "subject" => $this->input->post('subject', true),
                "id_user" => $this->input->post('id_user', true),
                "kritik_saran" => $this->input->post('kritik_saran', true)
            ];
            $this->db->insert('kritik_saran', $data);
        }

        public function getAllForum($limit, $start){ //menampilkan forum per page
            $this->db->select('*');
            $this->db->from('forum');
            $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');  
            $this->db->order_by('forum.created_at', 'DESC');    
            $this->db->limit($limit,$start);

            $query = $this->db->get();
            return $query->result_array();
        }

        public function getAllForum_cari(){ //menampilkan forum untuk di halaman pencarian
            $this->db->select('*');
            $this->db->from('forum');
            $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');  
            $this->db->order_by('forum.created_at', 'DESC');    

            $query = $this->db->get();
            return $query->result_array();
        }
        public function keySearchForum($kategori){
        $this->db->select('kategori_materi.nama_kategori');
        $this->db->from('kategori_materi');
        $this->db->join('forum', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->where('forum.id_kategori_materi', $kategori);
        $this->db->limit(1);
                        
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
    
        public function Jawab_Forum($id) { //menjawab forum sesuai forum yang dipilih
            $this->id_chat_forum = uniqid();
            date_default_timezone_set('Asia/Jakarta');
    
            $data = [
                "id_forum" => $this->input->post('id_forum', $id),
                "id_user" => $this->input->post('id_user', true),
                "chat" => $this->input->post('chat', true),
                "send_time" => date('Y-m-d H:i:s', time())                
            ];
    
            $this->db->insert('chat_forum', $data);
        }

        public function upload_gambar_jawab() { //upload foto profil tutor
            $config['upload_path'] = './upload/gambar_jawab/'; //file akan disimpan di dalam folder upload
            $config['allowed_types'] = 'jpg|png|jpeg'; //ekstensi yg diizinkan adalah jpg dan png
            $config['overwrite'] = true;
    
            $this->upload->initialize($config);
            $this->load->library('upload',$config);
            if($this->upload->do_upload('gambar_jawab')) {
                return $this->upload->data("file_name");
            }
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

        public function get_id_mahasiswa($id_tutor) { //query untuk mengambil data id_mahasiswa pada tutor yg sedang login
            $this->db->select('*');
            $this->db->from('tutor');
            $this->db->where('id_tutor', $id_tutor);

            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function Kategori_Forum() { //get semua data kategori forum
            $query = $this->db->get('kategori_materi');
            return $query->result_array();
        }

        public function cek_forum() { //memeriksa apakah forum kosong atau tidak
            $this->db->select('*');
            $this->db->from('forum');
                   
            $query = $this->db->get();
            return $query->result_array();
        } 

        public function Cari_Forum($kategori, $keyword){ //menampilkan hasil cari forum berdasarkan katgeori/pertanyaan 
            $kategori=$this->input->post('id_kategori_materi');
            $keyword=$this->input->post('keyword');

            $this->db->select('*');
            $this->db->from('forum');
            $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');            
            $this->db->like('forum.id_kategori_materi', $kategori); 
            $this->db->like('forum.pertanyaan', $keyword);        
            $this->db->order_by('forum.created_at', 'DESC'); 

            $query = $this->db->get();
            return $query->result_array();
        }

        public function search1($keyword){ //get data NIM yang dicari sesuai keyword dengan limit 1
            $this->db->select('*');
            $this->db->from("mahasiswa AS t2");
            $this->db->join("tutor AS t1", "t2.id_mahasiswa = t1.id_mahasiswa");
            $this->db->where('nim',$keyword);
            $this->db->limit(1);
    
            $query = $this->db->get();
            if($query->num_rows()==1) {
                return $query->result_array();
            }
            else {
                return false;
            }
        }

        public function search2($keyword){ //get data NIM calon tutor yg masih blm di verifikasi
            $this->db->select('*');
            $this->db->from("mahasiswa AS t2");
            $this->db->join("tutor AS t1", "t2.id_mahasiswa = t1.id_mahasiswa");
            $this->db->where('nim',$keyword);            
            $query = $this->db->get();
            return $query->result();
        }

        public function search3(){ //memeriksa apakah tutor diterima/tidak
            $this->db->select('*');
            $this->db->from('tutor');
            $this->db->join('mahasiswa', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');        
            $query = $this->db->get();
            return $query->result_array();
        }

        public function ketersediaanNim($keyword){ //cek NIM terdaftar/tidak dalam data mhs sesuai keyword
            $this->db->select('*');
            $this->db->from('mahasiswa');
            $this->db->where('nim', $keyword);
            $query = $this->db->get();                        
            return $query->result_array();            
        }

        public function mahasiswa($limit, $start) { //menampilkan data mhs per page untuk halaman private chat         
            $idmhs = $this->session->userdata('id_mahasiswa');
            $query = $this->db->query("SELECT t1.id_mahasiswa,t1.nama, t1.nim, t1.prodi, t1.jurusan, 
            IFNULL(t2.total, 0) AS strength, IFNULL(t3.waktu, 0) AS time FROM mahasiswa t1 
            LEFT OUTER JOIN (SELECT private_chat.from, COUNT(private_chat.id_pesan) AS total FROM private_chat 
            WHERE private_chat.to = '$idmhs' AND private_chat.status_chat = 1 GROUP BY private_chat.from ) t2 
            ON t1.id_mahasiswa = t2.from LEFT OUTER JOIN ( SELECT private_chat.from, MAX(private_chat.created_at) as waktu 
            FROM private_chat GROUP BY private_chat.from) t3 ON t3.from=t1.id_mahasiswa 
            WHERE NOT EXISTS (SELECT * FROM tutor WHERE tutor.id_mahasiswa = t1.id_mahasiswa) ORDER BY time desc
            LIMIT $limit OFFSET $start");            

            return $query->result_array();
        }

        public function searchchat($keyword) { //get hasil cari data mahasiswa sesuai keyword untuk private chat
            $keyword=$this->input->post('keyword');          
            $this->db->select('*');
            $this->db->from('mahasiswa');
            $this->db->where('NOT EXISTS (SELECT * FROM tutor WHERE tutor.id_mahasiswa = mahasiswa.id_mahasiswa)', '', FALSE);
            $this->db->like('mahasiswa.nama',$keyword);
            
            $query = $this->db->get();
            return $query->result_array();            
        }

        public function hitung_mahasiswa_for_search($keyword) { //menghitung jumlah mahasiswa untuk hasil serach mhs di private chat         
            $query=$this->db->query("SELECT count(*) FROM mahasiswa WHERE NOT EXISTS (SELECT * FROM tutor WHERE tutor.id_mahasiswa = mahasiswa.id_mahasiswa) AND mahasiswa.nama like '%$keyword%'");
            return $query->num_rows();
        }

        public function hitung_mahasiswa() { //menghitung jumlah mahasiswa untuk ditampilkan di private chat
            $query=$this->db->query("SELECT * FROM mahasiswa WHERE NOT EXISTS (SELECT * FROM tutor WHERE tutor.id_mahasiswa = mahasiswa.id_mahasiswa)");
            return $query->num_rows();
        }

        public function hitung_forum_for_search() { //menghitung jumlah forum untuk hasil serach forum
            $query=$this->db->query("SELECT * FROM forum");
            return $query->num_rows();
        }

        public function namaTujuan($send_to){ //get nama untuk tujuan mengirim chat
            $this->db->select('nama');
            $this->db->from('mahasiswa');
            $this->db->where('id_mahasiswa', $send_to);
            $query = $this->db->get();
            return $query->result_array();                    
        }

        public function kategori_header($id) { //get kategori yang dimiliki tutor yg sedang login
            $this->db->select('nama_kategori');
            $this->db->from('kategori_materi');
            $this->db->where('id_kategori_materi', $id);
            $query = $this->db->get();
            return $query->result_array(); 
        }

        public function Profil($id_tutor) //get data sesuai dengan id_tutor yg dipilih
        {
            $this->db->select('*');
            $this->db->from('tutor'); 
            $this->db->join('mahasiswa', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');
            $this->db->join('kategori_materi', 'kategori_materi.id_kategori_materi = tutor.id_kategori_materi');
            $this->db->where('tutor.id_tutor', $id_tutor);
            $query = $this->db->get();
            return $query->result_array();                        
        }

        public function Edit_Profil() { //mengubah profil tutor
            $data = [
                "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
                "nim" => $this->input->post('nim', true),
                "nama" => $this->input->post('nama', true),
                "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
                "jurusan" => $this->input->post('jurusan', true),
                "prodi" => $this->input->post('prodi', true),
                "kelas" => $this->input->post('kelas', true),
                "tahun_masuk" => $this->input->post('tahun_masuk', true),
                "github" => $this->input->post('github', true),
                "foto" => $this->upload_foto()
            ];
            $this->db->where('id_mahasiswa', $data['id_mahasiswa']);
            $this->db->update('mahasiswa', $data);
        }

        public function upload_foto() { //upload foto profil tutor
            $config['upload_path'] = './upload/profil/'; //file akan disimpan di dalam folder upload
            $config['allowed_types'] = 'jpg|png|jpeg'; //ekstensi yg diizinkan adalah jpg dan png
            $config['overwrite'] = true;

            $this->upload->initialize($config);
            $this->load->library('upload',$config);
            if($this->upload->do_upload('foto')) {
                return $this->upload->data("file_name");
            }
            return $this->input->post('old_profil', true);
        }

        public function revisi($id_tugas) { //menambah revisi tugas mhs sesuai dengan id_tugas
            $post=$this->input->post();

            $this->id_tugas = $post["id_tugas"];
            $this->revisi = $post["revisi"];
            $this->status = $post["status"];
            
            $this->db->update('tugas',$this, array('id_tugas' => $post['id_tugas']));
        }

        public function getTugasById($id_tugas) { //get data tugas sesuai dengan did_tugas
            $query=$this->db->get_where('tugas',array('id_tugas'=>$id_tugas));
            return $query->row_array();
        }
        public function detailRevisi($id_tugas){
            $this->db->select('*');
            $this->db->from('tugas');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tugas.id_mahasiswa');
            $this->db->join('konten', 'konten.id_konten = tugas.id_konten');
            $this->db->where('tugas.id_tugas', $id_tugas);
            $query = $this->db->get();
            return $query->result_array();                                                                             
        }

        // menghitung session 5 mahasiswa yang sering aktif
        public function getCountSessionMahasiswa() {
            $this->db->select('s.id_mahasiswa, m.nama, COUNT(s.id_mahasiswa) AS hitung');
            $this->db->from('session_mahasiswa_tutor AS s');
            $this->db->join('mahasiswa AS m', 'm.id_mahasiswa = s.id_mahasiswa');
            $this->db->group_by('s.id_mahasiswa');
            $this->db->order_by('hitung', 'desc');
            $this->db->limit(5);               

            $query = $this->db->get();
            return $query->result();                             
        }

        public function getCountKontenFavorit() { //query untuk menghitung konten terfavorit berdasarkan banyaknya jumlah pengumpulan tugas
            $id = $this->session->userdata('id_tutor');
            $query = $this->db->query("SELECT tugas.id_konten, konten.judul, COUNT(tugas.id_konten) AS hasil
            FROM tugas
            JOIN konten
            ON konten.id_konten = tugas.id_konten
            JOIN materi
            ON materi.id_materi = konten.id_materi
            JOIN tutor
            ON tutor.id_tutor = materi.id_tutor
            WHERE materi.id_tutor = '$id'
            GROUP BY tugas.id_konten
            ORDER BY hasil DESC
            LIMIT 5");
            return $query->result();                             
        }

        public function notif_chat_tutor() { //query untuk menampilkan pesan baru dari mhs yang belum dibaca (status = 1) oleh tutor
            $id_mahasiswa = $this->session->userdata('id_mahasiswa');
            $query = $this->db->query("SELECT *
            FROM private_chat
            JOIN mahasiswa 
            ON mahasiswa.id_mahasiswa = private_chat.from
            WHERE private_chat.to = '$id_mahasiswa' AND private_chat.status_chat = 1
            ORDER BY private_chat.created_at DESC");
            return $query->result_array();            
        }
        
        public function change_status_chat_tutor($from) { //query untuk mengupdate status pesan menjadi 2 yg berarti sudah dibaca
            $to = $this->session->userdata('id_mahasiswa');
            $this->db->query("UPDATE private_chat SET status_chat = 2 WHERE id_pesan IN (SELECT id_pesan from (select*from private_chat) as p where (p.from = $from) AND (p.to = $to))");        
        }

        public function hitung_chat_tutor() { //query untuk menghitung jumlah pesan yg belum dibaca oleh tutor
            $idmhs = $this->session->userdata('id_mahasiswa');
            $query = $this->db->query("SELECT COUNT(private_chat.from) AS total from private_chat WHERE private_chat.to = '$idmhs' AND private_chat.status_chat=1");        
            if ($query->num_rows() > 0 )
            {
              $row = $query->row();
              return $row->total;
            }
            return 0;      
        }     
        public function cek_tutor($nim)   {
            $query = $this->db->query("SELECT tutor.id_mahasiswa FROM tutor JOIN mahasiswa ON mahasiswa.id_mahasiswa= tutor.id_mahasiswa WHERE mahasiswa.nim = '$nim'");        
            if ($query->num_rows() > 0 )
            {
              $row = $query->row();
              return $row->total;
            }
            return 0;      
        }
    }
?>