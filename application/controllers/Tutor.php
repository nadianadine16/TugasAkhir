<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tutor extends CI_Controller {
    // untuk memanggil kelas model atau library yang akan kita gunakan pada setiap function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Tutor_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->helper('file');
        $this->load->library('upload');
    }

    public function index()
    {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Dashboard Tutor';
            // menampilkan kategori tutor
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            // menampilkan foto tutor
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // menghitung materi tutor yang sedang login
            $data['materi'] = $this->Tutor_model->Hitung_Materi($this->session->userdata('id_tutor'));
            // menghitung jumlah forum
            $data['forum'] = $this->Tutor_model->Hitung_Forum();
            // menghitung jumlah konten yang dimiliki tutor yang sedang login
            $data['konten'] = $this->Tutor_model->Hitung_Konten();
            // menampilkan chart konten terfavorit
            $data['hitung_konten'] = $this->Tutor_model->getCountKontenFavorit();
            //menghitung session mhs yg aktif login
            $data['hasil']= $this->Tutor_model->getCountSessionMahasiswa();
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();
            
            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Index',$data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Profil($id_tutor) {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] ='Profil Tutor';        
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // menampilkan data profil tutor yang sedang login
            $data['tutor'] = $this->Tutor_model->Profil($id_tutor);
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

            $this->load->view('template/header2_tutor', $data);
            $this->load->view('Tutor/Profil', $data);
            $this->load->view('template/footer2_tutor', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Edit_Profil($id_tutor) {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Edit Profil';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // get data sesuai dengan id_tutor yang dipilih
            $data['tutor'] = $this->Tutor_model->Profil($id_tutor);
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();
    
            // form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('foto', '', 'callback_file_check_foto');        
            
            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_tutor',$data);
                $this->load->view('Tutor/Edit_Profil', $data);
                $this->load->view('template/footer2_tutor',$data);
            }
            else {
                // menuju ke tutor_model untuk melakukan aksi edit profil
                $this->Tutor_model->Edit_Profil();
                echo"<script>alert('Akun Anda Berhasil Diedit!');</script>";
                // kembali ke halaman profil tutor yang sedang login
                redirect('Tutor/Profil/'.$this->session->userdata('id_tutor'),'refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function file_check_foto($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['foto']['name']);
        if(isset($_FILES['foto']['name']) && $_FILES['foto']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                if (filesize($_FILES['foto']['tmp_name']) > 2097152) {
                    $this->form_validation->set_message('file_check_foto', 'The Image file size shoud not exceed 2MB!');
                    return false;
                }
            }
            else{
                $this->form_validation->set_message('file_check_foto', 'Please select only jpeg/jpg/png file.');
                return false;
            }
        }
    }

    public function Daftar_Tutor()
    {
        $data['title'] = 'Daftar Tutor';
        $this->session->sess_destroy();

        // menampilkan nim mahasiswa yang belum terdaftar menjadi tutor
        $data['mahasiswa'] = $this->Tutor_model->getNim();
        // menampilkan semua data kategori materi
        $data['KategoriMateri'] = $this->Tutor_model->getAllKategoriMateri();
        //menampilkan notifikasi pesan private chat yang belum dibaca
        $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
        //menghitung jumlah notifikasi pesan yang belum dibaca
        $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

        $this->load->view('Tutor/Daftar_Tutor', $data);
        $this->load->view('template/footer_tutor',$data);
    }

    public function Tambah_Tutor()
    {
        $data['title'] = 'Daftar Tutor';
        $data['KategoriMateri'] = $this->Tutor_model->getAllKategoriMateri();

        // form validation untuk memeriksa kelengkapan isian form
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('id_kategori_materi', 'Kategori', 'required');
        $this->form_validation->set_rules('surat_pernyataan', '', 'callback_file_check_surat');

        $nim = $this->input->post('nim');
        
        if($this->form_validation->run() == FALSE) {
            $this->load->view('Tutor/Daftar_Tutor', $data);
            $this->load->view('template/footer_tutor',$data);
        }
        else {
            // menuju ke tutor_model untuk melakukan aksi tambah tutor            
            $cek = $this->db->query("SELECT tutor.id_mahasiswa FROM tutor JOIN mahasiswa ON mahasiswa.id_mahasiswa= tutor.id_mahasiswa where mahasiswa.nim='".$this->input->post('nim')."'")->num_rows();
            $cek_mahasiswa = $this->db->query("SELECT mahasiswa.id_mahasiswa FROM mahasiswa where mahasiswa.nim='".$this->input->post('nim')."' LIMIT 1")->num_rows();
            if ($cek_mahasiswa>0) { //jika mahasiswa terdaftar pada tabel mahasiswa
                if ($cek<=0){ //jika mahasiswa tidak terdaftar sebagai tutor
                    $this->Tutor_model->Tambah_Tutor();
                    echo"<script>alert('Anda berhasil mendaftar');</script>";
                    redirect('Login/index','refresh');
                }
                else{                    
                    echo"<script>alert('Nim Telah Terdaftar');</script>";
                    redirect('Tutor/Daftar_Tutor','refresh');    
                }            
            }
            else{                
                echo"<script>alert('NIM Tidak Terdaftar');</script>";
                redirect('Tutor/Daftar_Tutor','refresh');
            }
        }
    }

    public function file_check_surat($str){
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['surat_pernyataan']['name']);
        if(isset($_FILES['surat_pernyataan']['name']) && $_FILES['surat_pernyataan']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                // return true;
                if (filesize($_FILES['surat_pernyataan']['tmp_name']) > 2097152) {
                    $this->form_validation->set_message('file_check_surat', 'The document file size shoud not exceed 2MB!');
                    return false;
                }
            }
            else{
                $this->form_validation->set_message('file_check_surat', 'Please select only pdf file.');
                return false;
            }
        }
        else{
            $this->form_validation->set_message('file_check_surat', 'Please choose a file to upload.');
            return false;
        }
    }

    public function Data_Materi() {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Data Materi';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // menyimpan session id_tutor pada variabel $id_tutor
            $id_tutor = $this->session->userdata('id_tutor');
            // get materi sesuai dengan id_tutor yang sedang login
            $data['materi'] = $this->Tutor_model->getMateriByIdTutor($id_tutor);
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Data_Materi', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Kontribusi_Saya() {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Forum yang Saya Jawab';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // menyimpan session id_tutor pada variabel $id_tutor
            $id_tutor = $this->session->userdata('id_tutor');
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();
            $data['forum'] = $this->Tutor_model->Forum_yang_dijawab($id_tutor);

            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Kontribusi_Saya', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Tambah_Materi() {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Form Tambah Materi';
            $data['kategori_materi'] = $this->Tutor_model->getAllKategoriMateri();
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

            // form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('nama_materi', 'Judul Materi', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
            $this->form_validation->set_rules('requirement', 'Requirement', 'required');
            $this->form_validation->set_rules('cover', '', 'callback_file_check');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_tutor',$data);
                $this->load->view('Tutor/Tambah_Materi', $data);
                $this->load->view('template/footer2_tutor',$data);
            }
            else {
                // menuju tutor_model untuk melakukan aksi tambah materi
                $this->Tutor_model->Tambah_Materi();
                echo"<script>alert('Materi Berhasil Ditambahkan!');</script>";
                // kembali ke halaman data materi
                redirect('Tutor/Data_Materi','refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['cover']['name']);
        if(isset($_FILES['cover']['name']) && $_FILES['cover']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                // return true;
                if (filesize($_FILES['cover']['tmp_name']) > 2097152) {
                    $this->form_validation->set_message('file_check', 'The Image file size shoud not exceed 2MB!');
                    return false;
                }
            }
            else{
                $this->form_validation->set_message('file_check', 'Please select only jpeg/jpg/png file.');
                return false;
            }
        }
        else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }

    public function file_check_edit($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['cover']['name']);
        if(isset($_FILES['cover']['name']) && $_FILES['cover']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                if (filesize($_FILES['cover']['tmp_name']) > 2097152) {
                    $this->form_validation->set_message('file_check_edit', 'The Image file size shoud not exceed 2MB!');
                    return false;
                }
            }
            else{
                $this->form_validation->set_message('file_check_edit', 'Please select only jpeg/jpg/png file.');
                return false;
            }
        }
    }

    public function Hapus_Materi($id_materi) {
        if (isset($_SESSION['id_tutor'])) {
            // menuju tutor_model untuk menghapus materi sesuai dengan id_materi
            $this->Tutor_model->Hapus_Materi($id_materi);
            echo"<script>alert('Materi Berhasil Dihapus!');</script>";
            // kembali ke halaman data materi
            redirect('Tutor/Data_Materi','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Edit_Materi($id_materi) {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Form Edit Materi';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // get data materi sesuai dengan id_materi yang dipilih
            $data['materi'] = $this->Tutor_model->getMateriById($id_materi);
            // menampilkan semua data kategori materi untuk form edit materi
            $data['kategori_materi'] = $this->Tutor_model->getAllKategoriMateri();
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();
            
            // form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('nama_materi', 'Judul Materi', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
            $this->form_validation->set_rules('requirement', 'Requirement', 'required');
            $this->form_validation->set_rules('cover', '', 'callback_file_check_edit');      

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_tutor',$data);
                $this->load->view('Tutor/Edit_materi', $data);
                $this->load->view('template/footer2_tutor',$data);
            }
            else {
                // menuju tutor_model untuk melakukan edit materi sesuai id_materi
                $this->Tutor_model->Edit_Materi($id_materi);
                echo"<script>alert('Materi Berhasil Diubah!');</script>";
                // kembali ke halaman data materi
                redirect('Tutor/Data_Materi','refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Detail_Materi($id_materi) {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Detail Materi';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // get data materi sesuai dengan id_materi
            $data['materi'] = $this->Tutor_model->getMateriByIdMateri($id_materi);
            // get data konten sesuai dengan id_materi yang dipilih
            $data['konten'] = $this->Tutor_model->Konten($id_materi);
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Detail_Materi', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Tambah_Konten($id_materi) {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Form Tambah Konten';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // get data materi sesuai id_materi
            $data['materi'] = $this->Tutor_model->getMateriByIdMateri($id_materi);
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

            // form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('soal', 'Soal Latihan', 'required');
            $this->form_validation->set_rules('video', 'Link Video', 'required');
            $this->form_validation->set_rules('file_pendukung', '', 'callback_file_check_create_konten');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_tutor',$data);
                $this->load->view('Tutor/Tambah_Konten', $data);
                $this->load->view('template/footer2_tutor',$data);
            }
            else {
                // menuju tutor_model untuk melakukan tambah konten
                $this->Tutor_model->Tambah_Konten();
                echo"<script>alert('Konten Berhasil Ditambahkan!');</script>";
                // kembali ke halaman detail materi sesuai id_materi
                redirect('Tutor/Detail_Materi/'.$id_materi ,'refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function file_check_create_konten($str){
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_pendukung']['name']);
        if(isset($_FILES['file_pendukung']['name']) && $_FILES['file_pendukung']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                // return true;
                if (filesize($_FILES['file_pendukung']['tmp_name']) > 2097152) {
                    $this->form_validation->set_message('file_check_create_konten', 'The document file size shoud not exceed 2MB!');
                    return false;
                }
            }
            else{
                $this->form_validation->set_message('file_check_create_konten', 'Please select only pdf file.');
                return false;
            }
        }
    }

    public function Edit_Konten($id_konten, $id_materi) {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Form Edit Konten';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // get data konten sesuai dengan id_konten
            $data['konten'] = $this->Tutor_model->getKontenById($id_konten);
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

            // form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('soal', 'Soal Latihan', 'required');
            $this->form_validation->set_rules('video', 'Link Video', 'required');
            $this->form_validation->set_rules('file_pendukung', '', 'callback_file_check_edit_konten');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_tutor',$data);
                $this->load->view('Tutor/Edit_Konten', $data);
                $this->load->view('template/footer2_tutor',$data);
            }
            else {
                // menuju tutor_model untuk melakukan edit konten sesuai dengan id_konten
                $this->Tutor_model->Edit_Konten($id_konten);
                echo"<script>alert('Konten Berhasil Diedit!');</script>";
                // kembali ke halaman detail materi sesuai id_materi yang dipilih
                redirect('Tutor/Detail_Materi/'.$id_materi ,'refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function file_check_edit_konten($str){
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_pendukung']['name']);
        if(isset($_FILES['file_pendukung']['name']) && $_FILES['file_pendukung']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                // return true;
                if (filesize($_FILES['file_pendukung']['tmp_name']) > 2097152) {
                    $this->form_validation->set_message('file_check_edit_konten', 'The document file size shoud not exceed 2MB!');
                    return false;
                }
            }
            else{
                $this->form_validation->set_message('file_check_edit_konten', 'Please select only pdf file.');
                return false;
            }
        }
    }

    public function Hapus_Konten($id_konten, $id_materi) {
        if (isset($_SESSION['id_tutor'])) {
            // menuju tutor_model untuk menghapus konten sesuai dengan id_konten dan id_materi
            $this->Tutor_model->Hapus_Konten($id_konten, $id_materi);
            echo"<script>alert('Konten Berhasil Dihapus!');</script>";
            // kembali ke halaman detail materi sesuai id_materi
            redirect('Tutor/Detail_Materi/'.$id_materi ,'refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Tugas_Mahasiswa() {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Pengumpulan Tugas Mahasiswa';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // menampilkan data tugas mahasiswa yang belum diverifikasi (status = diajukan)
            $data['tugas'] = $this->Tutor_model->getAllTugasUnVerif();
            // menampilkan data tugas mhs yng direvisi (status = revisi)
            $data['revisi_tugas'] = $this->Tutor_model->getAllRevisiTugas();
            // menampilkan semua tugas mhs yang telah diverifikasi (status = disetujui)
            $data['tugasverif'] = $this->Tutor_model->getAllTugasVerif();
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Tugas_mahasiswa', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            redirect('Login/logout');
        }
    }
    public function Detail_Revisi($id_tugas){
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Revisi Tugas Mahasiswa';
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));

            $data['detail_revisi'] = $this->Tutor_model->detailRevisi($id_tugas);
            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Detail_Revisi', $data);
            $this->load->view('template/footer2_tutor', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Revisi($id_tugas) {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Revisi Tugas Mahasiswa';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // get data tugas sesuai dengan id_tugas
            $data['tugas'] = $this->Tutor_model->getTugasById($id_tugas);
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

            // form validation memeriksa kelengkapan isian form
            $this->form_validation->set_rules('revisi', 'revisi', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_tutor',$data);
                $this->load->view('Tutor/Revisi', $data);
                $this->load->view('template/footer2_tutor', $data);
            }
            else {
                // menuju tutor_model untuk melakukan penambahan revisi sesuai dengan id_tugas
                $this->Tutor_model->Revisi($id_tugas);
                echo"<script>alert('Revisi Berhasil Dikirim!');</script>";
                // kembali ke halaman tugas mahasiswa
                redirect('Tutor/Tugas_mahasiswa','refresh');
            } 
        }
        else {
            redirect('Login/logout');
        }   
    }

    public function Verifikasi_Tugas($id_tugas) {
        if (isset($_SESSION['id_tutor'])) {
            // menuju tutor_model untuk memverifikasi tugas sesuai dengan id_tugas (status = disetujui)
            $this->Tutor_model->Verifikasi_Tugas($id_tugas);
            echo"<script>alert('Verifikasi Tugas Berhasil!');</script>";
            // kembali ke halaman tugas mahasiswa
            redirect('Tutor/Tugas_Mahasiswa', 'refresh');
        }
        else {
            redirect('Login/logout');
        }   
    }

    public function Hapus_Tugas($id_tugas) {
        if (isset($_SESSION['id_tutor'])) {
            // menuju tutor_model untuk menghapus tugas sesuai dengan id_tugas
            $this->Tutor_model->Hapus_Tugas($id_tugas);
            echo"<script>alert('Tugas Berhasil Dihapus!');</script>";
            // kembali ke halaman tugas mhs
            redirect('Tutor/Tugas_Mahasiswa', 'refresh');
        }
        else {
            redirect('Login/logout');
        } 
    }

    public function Kritik_Saran() {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Kritik dan Saran';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

            // form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('kritik_saran', 'Kritik dan Saran', 'required');
            $this->form_validation->set_rules('subject', 'Subject', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_tutor',$data);
                $this->load->view('Tutor/Kritik_Saran', $data);
                $this->load->view('template/footer2_tutor',$data);
            }
            else {
                // menuju tutor_model untuk mengirim kritik dan saran
                $this->Tutor_model->Kritik_Saran();
                echo"<script>alert('Kritik dan Saran Anda Berhasil Dikirim');</script>";
                // kembali ke halaman kritik dan saran
                redirect('Tutor/Kritik_Saran','refresh');
            }
        }
        else {
            redirect('Login/logout');
        } 
    }

    public function Forum() {
        if (isset($_SESSION['id_tutor'])) {
            $config['base_url'] = site_url('Tutor/Forum'); //site url
            $config['total_rows'] = $this->Tutor_model->Hitung_Forum(); //total row
            $config['per_page'] = 10;  //show record per halaman
            $config["uri_segment"] = 3;  // uri parameter
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);

            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $data['title'] ='Forum';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // menampilkan forum dengan data per page
            $data['forum'] = $this->Tutor_model->getAllForum($config["per_page"], $data['page']);
            // menampilkan pagination
            $data['pagination'] = $this->pagination->create_links();
            // menampilkan kategori forum
            $data['kategori_forum'] = $this->Tutor_model->Kategori_Forum();
            // memeriksan ada forum atau tidak
            $data['cek_forum'] = $this->Tutor_model->cek_forum();
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Forum', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            redirect('Login/logout');
        } 
    }

    public function Detail_Forum($id) {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] ='Forum';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // menampilkan detail forum sesuai dengan id_forum
            $data['detail_pertanyaan'] = $this->Tutor_model->detail_pertanyaan($id);
            // menampilkan jawaban forum sesuai dengan id_forum
            $data['jawaban'] = $this->Tutor_model->jawaban($id);
            // memeriksa apakah jawaban forum sedang kosong atau sudah terisi sesuai dengan id_forum
            $data['jawaban_forum'] = $this->Tutor_model->Cek_Jawaban($id);
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();
            //get data id_mahasiswa dari tutor yang sedang login
            $data['get_id_mahasiswa'] = $this->Tutor_model->get_id_mahasiswa($this->session->userdata('id_tutor'));

            $this->load->view('template/header2_tutor', $data);
            $this->load->view('Tutor/Detail_Forum', $data);
            $this->load->view('template/footer2_tutor', $data);
        }
        else {
            redirect('Login/logout');
        } 
    }

    public function Jawab_Forum($id) {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] ='Forum';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // menampilkan detail forum
            $data['detail_pertanyaan'] = $this->Tutor_model->detail_pertanyaan($id);
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();
            // menampilkan jawaban forum sesuai dengan id_forum
            $data['jawaban'] = $this->Tutor_model->jawaban($id);
            // memeriksa apakah jawaban forum sedang kosong atau sudah terisi sesuai dengan id_forum
            $data['jawaban_forum'] = $this->Tutor_model->Cek_Jawaban($id);
            //get data id_mahasiswa dari tutor yang sedang login
            $data['get_id_mahasiswa'] = $this->Tutor_model->get_id_mahasiswa($this->session->userdata('id_tutor'));

            // form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('chat', 'message', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_tutor', $data);
                $this->load->view('Tutor/Detail_Forum', $data);
                $this->load->view('template/footer2_tutor', $data);
            }
            else {
                // menuju tutor_model untuk menjawab forum sesuai dengan id_forum
                $this->Tutor_model->Jawab_Forum($id);
                echo"<script>alert('Jawaban Anda Berhasil Dikirim');</script>";
                // kembali ke halaman detail forum sesuai dengan id_forum
                redirect('Tutor/Detail_Forum/'.$id ,'refresh');
            }
        }
        else {
            redirect('Login/logout');
        } 
    }

    public function Detail_Mahasiswa($id_mahasiswa)
    {
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Detail Data Mahasiswa';
            // menampilkan data mahasiswa sesuai dengan id_mahasiswa
            $data['mahasiswa'] = $this->Tutor_model->detail_mahasiswa($id_mahasiswa);
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));

            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Detail_Mahasiswa',$data);
            $this->load->view('template/footer2_tutor',$data);
        } 
        else {
            redirect('Login/logout');
        }
    }

    public function Cari_Forum(){
        if (isset($_SESSION['id_tutor'])) {
            $data['title'] = 'Forum';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            // menampilkan kategori forum
            $data['kategori_forum'] = $this->Tutor_model->Kategori_Forum();
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();
            // menampilkan hasil forum yang dicari
            $data['forum'] = $this->Tutor_model->getAllForum_cari();            

            if($this->input->post('submit')){
                // mengambil data inputan saat pencarian
                $kategori = $this->input->post('id_kategori_materi');
                $keyword = $this->input->post('keyword');
                if ($this->input->post('id_kategori_materi') && $this->input->post('keyword') != "") {
                    $data['hasil_cari_kategori'] = $this->Tutor_model->keySearchForum($kategori);
                    $data['hasil_cari'] = $this->input->post('keyword');
                    // menuju tutor_model untuk mencari forum sesuai dengan kategori/pertanyaan
                    $data['forum'] = $this->Tutor_model->Cari_Forum($kategori, $keyword);
                }
                else if($this->input->post('id_kategori_materi') || $this->input->post('keyword') != "") {
                    $data['hasil_cari_kategori'] = $this->Tutor_model->keySearchForum($kategori);
                    $data['hasil_cari'] = $this->input->post('keyword');
                    // menuju tutor_model untuk mencari forum sesuai dengan kategori/pertanyaan
                    $data['forum'] = $this->Tutor_model->Cari_Forum($kategori, $keyword);
                }
                else{
                    echo"<script>alert('Salah satu kata kunci harus diisi');</script>";
                    redirect('Tutor/Forum','refresh');
                }
            }

            $this->load->view('template/header2_tutor', $data);
            $this->load->view("Tutor/Hasil_Cari_Forum",$data);
            $this->load->view('template/footer2_tutor', $data);  
        }
        else {
            redirect('Login/logout');
        } 
    }

    public function Cek_Status_Pendaftaran(){
        $data['title'] = 'Cek Status Pendaftaran Tutor';

        $this->load->view('Tutor/Cek_Status', $data);        
    }

    public function Cari() {
        // mengambil data input yang dimasukkan saat pencarian NIM calon tutor
        $keyword = $this->input->post('keyword');

        // menyimpan aksi pencarian NIM ke dalam variabel berhasil
        $berhasil=$this->Tutor_model->search1($keyword);
        // memeriksa calon tutor yang masih menunggu di verifikasi
        $data['tampil']=$this->Tutor_model->search2($keyword);
        // memeriksan bahwa calon tutor gagal
        $gagal['cekPendaftaranTolak']=$this->Tutor_model->search3($keyword);
        // memeriksa ketersediaan nim yang telah didaftarkan
        $cek = $this->Tutor_model->ketersediaanNim($keyword);
        //menampilkan notifikasi pesan private chat yang belum dibaca
        $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
        //menghitung jumlah notifikasi pesan yang belum dibaca
        $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

        if($berhasil){
            $this->load->view('Tutor/Hasil_Search_Berhasil',$data);
        }
        else if (empty($cek)) {
            echo"<script>alert('Masukkan NIM dengan benar');</script>";
            redirect('Tutor/Cek_Status_pendaftaran','refresh');
        }
        else{
            echo"<script>alert('Mohon maaf Anda gagal atau belum mendaftar menjadi tutor');</script>";
            redirect('Login/index','refresh');
        }
    }

    public function Private_Chat(){      
        if (isset($_SESSION['id_tutor'])) {  
            $config['base_url'] = site_url('Tutor/Private_Chat'); //site url
            $config['total_rows'] = $this->Tutor_model->hitung_mahasiswa(); //total row
            $config['per_page'] = 20;  //show record per halaman
            $config["uri_segment"] = 3;  // uri parameter
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);

            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $data['title'] = 'Private Chat';  
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor')); 
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();            
            // menampilkan semua data mahasiswa per page
            $data['mahasiswa'] = $this->Tutor_model->Mahasiswa($config["per_page"], $data['page']);
            // membuat pagination
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('template/header2_tutor', $data);
            $this->load->view("Tutor/TPrivate_Chat",$data);
            $this->load->view('template/footer2_tutor', $data);
        }
        else {
            redirect('Login/logout');
        }       
    }

    public function CariChat(){
        if (isset($_SESSION['id_tutor'])) {  
            // mengambil inputan dari form pencarian
            $keyword =  $this->input->post('keyword'); 

            $data['title'] = 'Private Chat';
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor')); 
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();
            // menampilkan data mahasiswa sesuai keyword per page      
            $data['hasilsearch'] = $this->Tutor_model->searchchat($keyword);
            $data['hasil_cari'] = $this->input->post('keyword');

            $this->load->view('template/header2_tutor', $data);
            $this->load->view("Tutor/Search_Private_Chat",$data);
            $this->load->view('template/footer2_tutor', $data);  
        }
        else {
            redirect('Login/logout');
        } 
    }

    public function Change_Status_Chat_Tutor($from){
        //mengubah status pesan menjadi sudah dibaca (status = 2)
        $this->Tutor_model->change_status_chat_tutor($from);
        redirect('Tutor/Chat/'.$from,'refresh'); //kembali ke halaman chat
    }

    public function Chat($to) //function untuk menampilkan dan membalas chat sesuai dengan id_user tujuan
    {
        if (isset($_SESSION['id_tutor'])) {  
            $data['title'] = 'Private Chat';  
            $id = $this->session->userdata('id_mahasiswa'); // menyimpan session id_mahasiswa ke dalam variabel $id
            $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
            $data['foto_tutor'] = $this->Tutor_model->Profil($this->session->userdata('id_tutor'));
            //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['notif_chat_tutor'] = $this->Tutor_model->notif_chat_tutor();
            //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['hitung_chat_tutor']= $this->Tutor_model->hitung_chat_tutor();

            if ($this->input->server('REQUEST_METHOD') === 'POST') { //jika mengirim pesan
                $message = $this->input->post('message'); //mengambil data dari inputas pesan

                $data  = [
                    'from' =>$id,
                    'to' =>$to,
                    'message'=>$message,				
                ];

                $this->db->insert('private_chat',$data); //insert ke tabel private_chat
                redirect('Tutor/Chat/'.$to); //kembali ke halaman chat sesuai dengan id_user tujuan
            }
            else {
                //kondisi yang akan ditampilkan oleh query
                $this->db->where_in('from', [$id,$to]);
                $this->db->where_in('to', [$id,$to]);
                $this->db->order_by('created_at', 'ASC');

                $data['to'] = $to;
                $data['chats'] = $this->db->get('private_chat')->result(); //menampilkan pesan
                $data['nama_tujuan'] = $this->Tutor_model->namaTujuan($to); //menampilkan nama mhs tujuan

                $this->load->view('template/header2_tutor', $data);
                $this->load->view('Tutor/TChat', $data);
                $this->load->view('template/footer2_tutor', $data);
            }
        }
        else {
            redirect('Login/logout');
        }
    }
    function upload_image(){
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 300;
                $config['new_image']= './assets/images/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'assets/images/'.$data['file_name'];
            }
        }
    }

    // Delete image Summernote
    function delete_image() {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }
    public function hitung_chat_tutor()
    {
        // $data['hitung'] = $this->User_model->hitung_chat();
        $data = $this->Tutor_model->notif_chat_tutor();
        echo json_encode($data);
    }
    public function notif2()
    {
        // $data['hitung'] = $this->User_model->hitung_chat();
        $data = $this->Tutor_model->mahasiswa1();
        echo json_encode($data);
    }
}
?>