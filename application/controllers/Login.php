<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    // untuk memanggil kelas model atau library yang akan kita gunakan pada setiap function
    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('Login_model');
            $this->load->library('form_validation');
    }

    // menampilkan halaman login
    public function index()
    {
        $data['title'] = 'Login';

        $this->load->view('login/index',$data);
    }

    // function proses login
    public function prosesLogin(){
        // get data input username dan password
        $username=htmlspecialchars($this->input->post('uname1'));
        $password=htmlspecialchars($this->input->post('pwd1'));

        // pengecekan apakah username dan password yang dimasukkan adalah milik tutor
        $cek_tutor = $this->Login_model->login_tutor($username,$password);
        // pengecekan apakah username dan password yang dimasukkan adalah milik mahasiswa
        $cek_mahasiswa=$this->Login_model->login_mahasiswa($username,$password);
        // pengecekan apakah username dan password yang dimasukkan adalah milik admin
        $cek_admin=$this->Login_model->login_admin($username,$password);

        // jika kondisi $cek_tutor benar
        if($cek_tutor->num_rows() > 0){
            $data=$cek_tutor->row_array();

            // set session tutor
            $this->session->set_userdata('id_tutor',$data['id_tutor']);
            $this->session->set_userdata('id_mahasiswa',$data['id_mahasiswa']);
            $this->session->set_userdata('nama',$data['nama']);
            $this->session->set_userdata('nim',$data['nim']);
            $this->session->set_userdata('id_kategori_materi',$data['id_kategori_materi']);            
            $this->session->set_userdata('status',$data['status']);

            if($this->session->userdata('status') == 1) {
                $data['title'] = 'Login';
                $data['pesan'] = 'Status Pendaftaran Sedang Diproses';
                $this->load->view('login/index', $data);
            }
            else if($this->session->userdata('status') == 2) {
                // menambah session tutor
                $login_tutor=$this->Login_model->tambah_session_tutor();  
                // set session login tutor          
                $this->session->set_userdata('id_hitung',$login_tutor['id_hitung']);  
                // menuju galaman utama tutor 
                redirect('Tutor/index');
            }
        }
        // jika kondisi $cek_mahasiswa benar
        else if($cek_mahasiswa->num_rows() > 0){
            $data=$cek_mahasiswa->row_array();

            // set session mahasiswa
            $this->session->set_userdata('id_mahasiswa',$data['id_mahasiswa']);
            $this->session->set_userdata('nama',$data['nama']);
            $this->session->set_userdata('nim',$data['nim']);
            $this->session->set_userdata('jenis_kelamin',$data['jenis_kelamin']);
            $this->session->set_userdata('jurusan',$data['jurusan']);
            $this->session->set_userdata('prodi',$data['prodi']);
            $this->session->set_userdata('tahun_masuk',$data['tahun_masuk']);
            $this->session->set_userdata('github',$data['github']);             
            
            // menambah jumlah session mahasiswa
            $login_mahasiswa=$this->Login_model->tambah_session_mahasiswa();
            
            // set session hasil jumlah session mahasiswa
            $this->session->set_userdata('id_hitung',$login_mahasiswa['id_hitung']);   
            // masuk ke halaman utama user (mahasiswa)
            redirect('User/index');            
        }
        // jika kondisi $cek_admin benar
        else if($cek_admin->num_rows() > 0){
            $data=$cek_admin->row_array();

            // set session admin
            $this->session->set_userdata('id_admin',$data['id_admin']);
            $this->session->set_userdata('nama',$data['nama']);
            $this->session->set_userdata('username',$data['username']);
            $this->session->set_userdata('password',$data['password']);

            // masuk ke halaman utama admin
            redirect('Admin/index');
        }
        else {
            $data['title']= 'Login';
            $data['pesan'] = 'Username atau Password Anda Salah';

            $this->load->view('Login/index', $data);
        }
    }

    public function logout() {
        // edit session untuk menambah waktu logout
        $logout_mahasiswa = $this->Login_model->edit_session_mahasiswa();
        // menghapus session ketika logout
        // $_SESSION=array();
        if (isset($_SESSION['id_admin'])) {
        $array_items = array('id_admin' => 'id_admin', 'nama' => 'nama', 'username' => 'username', 'password' => 'password');
        $this->session->unset_userdata($array_items);
        // $this->session->sess_destroy();
        redirect('Login/index','refresh');
        }
        else if (isset($_SESSION['id_tutor'])) {
            $array_items1 = array('id_tutor' => 'id_tutor', 'id_mahasiswa' => 'id_mahasiswa', 'nama' => 'nama', 'nim' => 'nim', 'id_kategori_materi' => 'id_kategori_materi','status'=> 'status');
            $this->session->unset_userdata($array_items1);
            // $this->session->sess_destroy();
            redirect('Login/index','refresh');
        }
        else{
            $array_items2 = array('id_mahasiswa' => 'id_mahasiswa', 'nama' => 'nama', 'nim' => 'nim', 'jenis_kelamin' => 'jenis_kelamin','jurusan'=> 'jurusan', 'prodi' => 'prodi', 'tahun_masuk'=>'tahun_masuk','github'=>'github');
            $this->session->unset_userdata($array_items2);
            // $this->session->sess_destroy();
            redirect('Login/index','refresh');
        }                
        // $this->session->sess_destroy();
        session_unset();
        session_destroy();
        redirect('Login/index','refresh');
        // kembali ke halaman login
        
    }
}