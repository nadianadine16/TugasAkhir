<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('Login_model');
            $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('login/index',$data);
    }
    public function prosesLogin(){
        $username=htmlspecialchars($this->input->post('uname1'));
        $password=htmlspecialchars($this->input->post('pwd1'));


        $cek_tutor = $this->Login_model->login_tutor($username,$password);
        $cek_mahasiswa=$this->Login_model->login_mahasiswa($username,$password);
        $cek_admin=$this->Login_model->login_admin($username,$password);


        if($cek_tutor->num_rows() > 0){
            $data=$cek_tutor->row_array();
            $this->session->set_userdata('id_tutor',$data['id_tutor']);
            $this->session->set_userdata('id_mahasiswa',$data['id_mahasiswa']);
            $this->session->set_userdata('nama',$data['nama']);
            $this->session->set_userdata('nim',$data['nim']);
            $this->session->set_userdata('id_kategori_materi',$data['id_kategori_materi']);
            $this->session->set_userdata('nama_kategori',$data['nama_kategori']);
            $this->session->set_userdata('status',$data['status']);
            if($this->session->userdata('status') == 1) {
                $data['title'] = 'Login';
                $data['pesan'] = 'Status Pendaftaran Sedang Diproses';
                $this->load->view('login/index', $data);
            }
            else if($this->session->userdata('status') == 2) {
                redirect('tutor/index');
            }
            
        }
        else if($cek_mahasiswa->num_rows() > 0){
            $data=$cek_mahasiswa->row_array();
            $this->session->set_userdata('id_mahasiswa',$data['id_mahasiswa']);
            $this->session->set_userdata('nama',$data['nama']);
            $this->session->set_userdata('nim',$data['nim']);
            $this->session->set_userdata('jurusan',$data['jurusan']);
            $this->session->set_userdata('prodi',$data['prodi']);
            $this->session->set_userdata('kelas',$data['kelas']);
            $this->session->set_userdata('tahun_masuk',$data['tahun_masuk']);
            $this->session->set_userdata('github',$data['github']);
            redirect('user/index');
        }
        else if($cek_admin->num_rows() > 0){
            $data=$cek_admin->row_array();
            $this->session->set_userdata('id_admin',$data['id_admin']);
            $this->session->set_userdata('nama',$data['nama']);
            $this->session->set_userdata('username',$data['username']);
            $this->session->set_userdata('password',$data['password']);
            redirect('admin/index');
        }
        else{
            $data['pesan'] = 'Username atau Password Anda Salah';
            $this->load->view('login/index', $data);
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('Login/index','refresh');
    }
}