<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() { // untuk memanggil kelas model atau library yang akan kita gunakan pada setiap function
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');

    }

    public function index() {
        if (isset($_SESSION['id_mahasiswa'])) {  
            $data['title'] ='Dashboard User';
            $data['kategori_materi'] = $this->User_model->getAllKategoriMateri();
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum
            $data['jumlah_tutor'] = $this->User_model->jumlah_tutor(); //menghitng jumlah data tutor
            $data['jumlah_materi'] = $this->User_model->jumlah_materi(); //menghitng jumlah data materi
            $data['jumlah_kategori'] = $this->User_model->jumlah_kategori(); //menghitng jumlah data kategori
            $data['jumlah_konten'] = $this->User_model->jumlah_konten(); //menghitng jumlah data konten

            $this->load->view('user/Utama', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function forum() {
        if(isset($_SESSION['id_mahasiswa'])) {
            $config['base_url'] = site_url('user/forum'); //site url
            $config['total_rows'] = $this->db->count_all('forum'); //total row
            $config['per_page'] = 8;  //show record per halaman
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
            $data['forum'] = $this->User_model->getAllForum($config["per_page"], $data['page']); //menampilkan dtaa forum per page
            $data['cek_forum'] = $this->User_model->cek_forum(); //memeriksa apakah forum kosong atau tidak
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum
            $data['pagination'] = $this->pagination->create_links(); //membuat pagination
            $data['kategori_forum'] = $this->User_model->getAllKategoriMateri();
            $id_mahasiswa = $this->session->userdata('id_mahasiswa');            
            $data['forum_cek'] = $this->User_model->Forum_yang_dibuat($id_mahasiswa);

            $this->load->view('template/header_user', $data);
            $this->load->view('user/forum', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function prosesContactus() {
        if(isset($_SESSION['id_mahasiswa'])) {
            
            //form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('id_user', 'id_user', 'required');
            $this->form_validation->set_rules('subject', 'subject', 'required');   
            $this->form_validation->set_rules('kritik_saran', 'kritik_saran', 'required');   
            
            if($this->form_validation->run() == FALSE) {
                redirect('User/index','refresh');
            }
            else {
                $this->User_model->tambah_kritik();
                echo"<script>alert('Terima kasih telah mengirim kritik dan saran');</script>";
                redirect('User/index','refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }
    
    public function Edit_Profil($id_mahasiswa) {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Edit Profil';
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum
            $data['profil_mhs'] = $this->User_model->profil_mahasiswa($id_mahasiswa); //get data mhs sesuai id_mhs

            $this->load->view('template/header_user', $data);
            $this->load->view('User/Edit_Profil', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Detail_Akun($id_mahasiswa) {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Detail Akun';        
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum
            $data['mahasiswa'] = $this->User_model->Detail_Akun($id_mahasiswa); //get data mahasiswa yang sedang login
            $data['tugas'] = $this->User_model->Tugas_Mahasiswa($id_mahasiswa); //get data tugas mhs yg sedang login
            $data['forum'] = $this->User_model->Forum_yang_dibuat($id_mahasiswa); //get data forum yg dibuat mhs sedang login

            $this->load->view('template/header_user', $data);
            $this->load->view('user/Detail_Akun', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function prosesEditProfile() {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] = 'Profil';
            
            //form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required');        
            $this->form_validation->set_rules('nim', 'nim', 'required');        
            $this->form_validation->set_rules('nama', 'nama', 'required');        
            $this->form_validation->set_rules('jurusan', 'jurusan', 'required');        
            $this->form_validation->set_rules('prodi', 'prodi', 'required');        
            $this->form_validation->set_rules('kelas', 'kelas', 'required');        
            $this->form_validation->set_rules('tahun_masuk', 'tahun_masuk', 'required');        
            $this->form_validation->set_rules('github', 'github', 'required');        
            
            if($this->form_validation->run() == FALSE) {
                redirect('user/profile','refresh');
            }
            else {
                $this->User_model->edit_profile();
                echo"<script>alert('Akun Anda Berhasil Diedit!');</script>";
                redirect('user/Detail_Akun/'.$this->session->userdata('id_mahasiswa'),'refresh'); //kembali ke halaman detail akun mhs yg sedang login
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function daftarMateribyKategori() {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Daftar Materi';
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            $kategori = htmlspecialchars($this->input->post('id_kategori_materi')); //mengambil data input id_kategori_materi

            //menyimpan data input ke dalam variabel $kategori dan disimpan kembali di $data_session
            $data_session = array( 
                'id_kategori_materi' => $kategori
            );

            $this->session->set_userdata($data_session); //set session kategori yg diambil
            //get data materi sesuai dgn kategori yg telah disimpan di variabel $kategori
            $data['daftar_materi'] = $this->User_model->daftar_materi_byKategori($kategori); 

            //jika ada action submit
            if($this->input->post('submit')){
                //get data kategori materi sesuai dengan $kategori yg dipilih
                $data['daftar_materi'] = $this->User_model->daftar_materi_byKategori($kategori); 
            }

            $this->load->view('template/header_user', $data);
            $this->load->view('user/Daftar_Materi', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function daftar_materi($id) {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Daftar Materi';
            $data['daftar_materi'] = $this->User_model->daftar_materi_byKategori($id); //get data materi sesuai dengan id__kategori_materi yg dipilih
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            $this->load->view('template/header_user', $data);
            $this->load->view('user/Daftar_Materi', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function daftarKonten($id) {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Daftar Konten';
            // $data['daftar_konten'] = $this->User_model->daftar_konten($id);
            // $data['materi'] = $this->User_model->getMateriByIdMateri($id);
            $data['materi'] = $this->User_model->getMateriByIdMateri($id);
            $data['konten'] = $this->User_model->Konten($id); //get data semua konten yg ada pada materi sesuai dgn id_materi yg dipilih
            //pemeriksaan tugas apakah kosong/tidak dengan menghitung jumlah tugas di setiap konten
            $data['count'] = $this->User_model->getCountTugas($id); 
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            $this->load->view('template/header_user', $data);
            $this->load->view('user/Daftar_Konten2', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function kumpulkanTugas($id) {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Kumpulkan Tugas';
            $data['detail_materi'] = $this->User_model->detail_konten($id); //get data materi sesuai dengan id_konten yg dipilih
            // $data['tampil'] = $this->User_model->tampil_tugas($id); //get data tugas pd konten sesuai id_konten yg dipilih
            $data['cek_tugas'] = $this->User_model->cek($id); //pemeriksaan apakah tabel tugas pada konten sudah ada data atau masih kosong
            $data['tugas_by_id'] = $this->User_model->tampil_tugas($id); //get data tugas sesuai dengan id_konten
            // $data['tugas'] = $this->User_model->Tugas_Mahasiswa($this->session->userdata('id_mahasiswa')); //get data tugas mhs sesuai dengan id_mhs yg sedang login
            $data['revisi_tugas'] = $this->User_model->Rev($this->session->userdata('id_mahasiswa'),$id); //get data revisi tugas dari setiap mhs yg sedang login sesuai dgn id_mhs dan id_konten
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            $cek = $this->User_model->cek_tugas($id);
            if($cek->num_rows() > 0){
                $this->load->view('template/header_user', $data);
                $this->load->view('user/Kumpulkan_Tugas3', $data);
                $this->load->view('template/footer_user', $data);    
            }
            else{
                $this->load->view('template/header_user', $data);
                $this->load->view('user/Kumpulkan_Tugas2', $data);
                $this->load->view('template/footer_user', $data);
            }   
        }
        else {
            redirect('Login/logout');
        }
    }

    public function tambah_tugas($id_konten) {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] = 'Tambah Tugas';
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            //form validasi untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('id_konten', 'id_konten', 'required');
            $this->form_validation->set_rules('tugas', 'tugas', 'required');
            $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header_user', $data);
                $this->load->view('user/Kumpulkan_Tugas2', $data);
                $this->load->view('template/footer_user', $data);
            }
            else {
                $this->User_model->tambah_tugas();
                echo"<script>alert('Tugas Berhasil Dikirim! Jawaban akan Segera Diperiksa.');</script>";
                redirect('User/kumpulkanTugas/'.$id_konten,'refresh'); //kembali ke halaman pengumpulan tugas sesuai dengan id_konten
            }   
        }
        else {
            redirect('Login/logout');
        } 
    }

    public function revisi_tugas($id_tugas, $id_konten) {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] = 'Revisi Tugas';
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            //form validasi untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('id_konten', 'id_konten', 'required');
            $this->form_validation->set_rules('tugas', 'tugas', 'required');
            $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header_user', $data);
                $this->load->view('user/Kumpulkan_Tugas3', $data);
                $this->load->view('template/footer_user', $data);
            }
            else {
                $this->User_model->revisi_tugas($id_tugas); //menuju ke model revisi_tugas sesuai dengan id_tugas yg dipilih
                echo"<script>alert('Tugas Berhasil Dikirim! Jawaban akan Segera Diperiksa.');</script>";
                redirect('User/kumpulkanTugas/'.$id_konten,'refresh'); //kembali ke halaman pengumpulan tugas sesuai dengan id_konten
            }    
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Tanya_Forum() {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Forum';
            $data['KategoriMateri'] = $this->User_model->getAllKategoriMateri(); //menampilkan semua daftar kategori materi
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required'); //form validasi untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('link_tanya', 'link_tanya');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header_user', $data);
                $this->load->view('user/Tanya_Forum', $data);
                $this->load->view('template/footer_user', $data);
            }
            else {
                $this->User_model->Tanya_Forum();
                echo"<script>alert('Pertanyaan Anda Berhasil Dikirim');</script>";
                redirect('User/Forum','refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Detail_Forum($id) {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Chat Forum';
            $data['detail_pertanyaan'] = $this->User_model->detail_pertanyaan($id); //menampilkan detail forum sesuai dengan id_forum
            $data['jawaban'] = $this->User_model->jawaban($id); //get data jawaban forum sesuai dengan id_forum yg dipilih
            $data['jawaban_forum'] = $this->User_model->Cek_Jawaban($id); //pengecekan jawaban forum apakah sudah terisi/masih kosong
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            $this->load->view('template/header_user', $data);
            $this->load->view('user/Detail_Forum', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Detail_Tutor($id) {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Detail Tutor';        
            $data['detail'] = $this->User_model->detailTutor($id); //get data tutor sesuai dengan id_tutor
            $data['materi'] = $this->User_model->Daftar_Materi_by_tutor($id); //get data semua  materi yg dimiliki tutor sesuai id_tutor
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            $this->load->view('template/header_user', $data);
            $this->load->view('user/Detail_Tutor', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function SeeAllTutor() {
        if(isset($_SESSION['id_mahasiswa'])) {
            $config['base_url'] = site_url('User/SeeAllTutor'); //site url
            $config['total_rows'] = $this->db->count_all('tutor'); //total row
            $config['per_page'] = 24;  //show record per halaman
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

            $data['title'] ='Daftar Tutor';
            $data['kategori_tutor'] = $this->User_model->getAllKategoriMateri(); //get semua data kategori materi
            $data['nama_tutor'] = $this->User_model->daftar_tutor($config["per_page"], $data['page']); //menampilkan daftar nama tutor per page
            $data['pagination'] = $this->pagination->create_links(); //membuat pagination
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            $this->load->view('template/header_user', $data);
            $this->load->view('user/SeeAllTutor', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Cari_Tutor() {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Daftar Tutor';
            $data['kategori_tutor'] = $this->User_model->getAllKategoriMateri(); //get semua data kategori materi
            $data['nama_tutor'] = $this->User_model->daftar_tutor2(); //menampilkan semua daftar tutor
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            if($this->input->post('submit')) { //jika ada aksi submit 
                $kategori = $this->input->post('id_kategori_materi'); //mengambil inputan id_kategori_materi 
                $keyword = $this->input->post('keyword'); //mengambil inputan keyword

                $data['hasil_cari_kategori'] = $this->User_model->keySearch($kategori);
                $data['hasil_cari'] = $this->input->post('keyword');

                //menampilkan tutor yg dicari sesuai dengan kategori/nama tutor (keyword)
                $data['nama_tutor'] = $this->User_model->Cari_Tutor($kategori, $keyword);
            }

            $this->load->view('template/header_user', $data);
            $this->load->view('user/Hasil_Cari_Tutor', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Jawab_Forum($id) {
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Forum';
            $data['detail_pertanyaan'] = $this->User_model->detail_pertanyaan($id); //menampilkan detail forum sesuai dengan id_forum
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            $this->form_validation->set_rules('chat', 'chat', 'required'); //form validasi untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('link_jawab', 'link_jawab');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header_user', $data);
                $this->load->view('user/Detail_Forum', $data);
                $this->load->view('template/footer_user', $data);
            }
            else {
                                                
                $this->User_model->Jawab_Forum($id);
                echo"<script>alert('Jawaban Anda Berhasil Dikirim');</script>";
                redirect('User/Detail_Forum/'.$id ,'refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Jawab_Private_Chat($id_mahasiswa, $id_tutor) { //$id_mahasiswa = from; $id_tutor = to;
        if(isset($_SESSION['id_mahasiswa'])) {
            $data['title'] ='Private Chat';        
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            $this->form_validation->set_rules('isi_pesan', 'isi_pesan', 'required'); //form validasi untuk memeriksa kelengkapan isian form

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header_user', $data);
                $this->load->view('user/Detail_Private_Chat', $data);
                $this->load->view('template/footer_user', $data);
            }
            else {
                $this->User_model->Jawab_Private_Chat($id_mahasiswa, $id_tutor);
                echo"<script>alert('Pesan Anda Berhasil Dikirim');</script>";
                redirect('User/Detail_Private_Chat/'.$id_tutor ,'refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }    

    public function cari() {
        if(isset($_SESSION['id_mahasiswa'])) {
            // $keyword=  $this->input->post('keyword'); //menagmbil inputan keyword

            $data['title'] = 'Forum';        
            // $data['forum'] = $this->User_model->search(); //menampilkan data forum sesuai dengan keyword yg dicari
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum
            $data['kategori_forum'] = $this->User_model->getAllKategoriMateri();
            // $data['hasil_cari_kategori'] = $this->input->post('id_kategori_materi');
            // $data['hasil_cari'] = $this->input->post('keyword');

            $data['forum'] = $this->User_model->getAllForum_cari();

            if($this->input->post('submit')){
                // mengambil data inputan saat pencarian
                $kategori = $this->input->post('id_kategori_materi');
                $keyword = $this->input->post('keyword');

                // menuju tutor_model untuk mencari forum sesuai dengan kategori/pertanyaan
                $data['hasil_cari_kategori'] = $this->User_model->keySearch($kategori);
                $data['hasil_cari'] = $this->input->post('keyword');
                $data['forum'] = $this->User_model->Search($kategori, $keyword);
            }

            $this->load->view('template/header_user', $data);
            $this->load->view("user/Search",$data);
            $this->load->view('template/footer_user', $data);  
        }
        else {
            redirect('Login/logout');
        }      
    }

    public function carimateri() {
        if(isset($_SESSION['id_mahasiswa'])) {
            $keyword=  $this->input->post('keyword'); //mengambil inputan dari keyword    

            $data['title'] = 'Daftar Materi';        
            $data['cari_materi'] = $this->User_model->cari_materi($keyword); //menampilkan materi sesuai dengan keyword yg dicari
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum
            $data['hasil_cari'] = $this->input->post('keyword');

            $this->load->view('template/header_user', $data);
            $this->load->view("user/SearchMateri",$data);
            $this->load->view('template/footer_user', $data);       
        }
        else {
            redirect('Login/logout');
        }      
    }

    public function cariChat() {
        if(isset($_SESSION['id_mahasiswa'])) {
            $keyword=  $this->input->post('keyword');  //mengambil inputan dari keyword

            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum
            $data['title'] = 'Private Chat';        
            $data['caritutor'] = $this->User_model->cari_tutor_chat($keyword); //menampilkan tutor yg dicari sesuai keyword untuk private chat
            $data['nama_tutor'] = $this->User_model->daftar_tutor2(); //get data semua tutor
            $data['hasil_cari'] = $this->input->post('keyword');

            if($this->input->post('submit')){ //jika ada aksi submit
                $keyword = $this->input->post('keyword'); //mengambil inputan dari keyword

                $data['nama_tutor'] = $this->User_model->cari_tutor_chat($keyword); //menampilkan daftar tutor sesuai dengan keyword yg dicari
            }

            $this->load->view('template/header_user', $data);
            $this->load->view("user/SearchChat",$data);
            $this->load->view('template/footer_user', $data);  
        }
        else {
            redirect('Login/logout');
        }        
    }

    public function Private_Chat() {
        if(isset($_SESSION['id_mahasiswa'])) {   
            $config['base_url'] = site_url('User/Private_Chat'); //site url
            $config['total_rows'] = $this->User_model->hitung_tutor(); //total row
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

            $data['title'] = 'Private Chat';      
            $id = $this->session->userdata('id_mahasiswa'); //menyimpan session mahasiswa
            $data['nama_tutor'] = $this->User_model->tutor($config["per_page"], $data['page']); //menampilkan nama tutor per page    
            $data['pagination'] = $this->pagination->create_links(); //membuat pagination
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum

            $this->load->view('template/header_user', $data);
            $this->load->view("user/Private_Chat",$data);
            $this->load->view('template/footer_user', $data);   
        }
        else {
            redirect('Login/logout');
        } 
    }    

    public function change_status_chat($from){ //mengubah status pesan menjadi sudah dibaca (status = 2) sesuai dgn $from
        $this->User_model->change_status_chat($from);
        redirect('User/Chat/'.$from,'refresh');
    }

    //mengubah status jawaban forum menjadi sudah dibaca sesuai dengan id_chat frorum
    public function change_status_jawaban($id_forum){
        // $idmhs = $this->session->userdata('id_mahasiswa');
        $cek=$this->db->query("SELECT id_mahasiswa From forum where id_forum=$id_forum LIMIT 1");                
        $a=$cek->row_array();

        if ($a['id_mahasiswa'] != $this->session->userdata('id_mahasiswa')) {
            // $this->User_model->change_status_jawaban($id_forum);
            redirect('User/Detail_Forum/'.$id_forum,'refresh');
        }
        else {
            $this->User_model->change_status_jawaban($id_forum);
            // redirect('User/Detail_Forum/'.$id_forum,'refresh');
            redirect('User/Detail_Forum/'.$id_forum,'refresh');
        }
    }
        
    public function Chat($to) {    
        if(isset($_SESSION['id_mahasiswa'])) {       
            $data['title'] = 'Private Chat';
            $data['notif_chat_user'] = $this->User_model->notif_chat(); //menampilkan notifikasi pesan private chat yang belum dibaca
            $data['hitung_chat']= $this->User_model->hitung_chat(); //menghitung jumlah notifikasi pesan yang belum dibaca
            $data['notif_jawaban_baru'] = $this->User_model->notif_jawaban_baru(); //menampilkan notifikasi jawaban forum baru
            $data['hitung_jawaban_baru']= $this->User_model->hitung_jawaban_baru(); //menghitung jumlah notifikasi jawaban baru forum
            $id = $this->session->userdata('id_mahasiswa'); //memnyimpan session mahasiswa

            $this->form_validation->set_rules('message', 'message', 'required'); //form validation untuk memeriksa kelengkapan isian form
            
            if($this->form_validation->run() == TRUE) {
                if ($this->input->server('REQUEST_METHOD') === 'POST') { //aksi post
                    $message = $this->input->post('message'); //mengambil inputan message

                    //menyimpan isi pesan
                    $data  = [
                        'from' =>$id,
                        'to' =>$to,
                        'message'=>$message,				
                    ];

                    $this->db->insert('private_chat',$data); //menambahkan ke database
                    redirect('User/Chat/'.$to); //kembali ke halaman chat dengan tujuan pada $to
                } 
            }
            else {
                //query untuk menampilkan pesan antar mahasiswa dan tutor
                $this->db->where_in('from', [$id,$to]);
                $this->db->where_in('to', [$id,$to]);
                $this->db->order_by('created_at', 'ASC');
                $data['to'] = $to;            
                $data['chats'] = $this->db->get('private_chat')->result();
                //menampilkan nama penerima pesan
                $data['nama_tujuan'] = $this->User_model->namaTujuan($to); 

                $this->load->view('template/header_user', $data);                             
                $this->load->view('User/Chat', $data);
                $this->load->view('template/footer_user', $data);
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
                $config['width']= 200;
                $config['height']= 200;
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
}
?>