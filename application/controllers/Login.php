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
            $this->session->set_userdata('nama',$data['nama']);
            $this->session->set_userdata('nim',$data['nim']);
            redirect('tutor/index');
        }
        else if($cek_mahasiswa->num_rows() > 0){
            $data=$cek_mahasiswa->row_array();
            $this->session->set_userdata('id_mahasiswa',$data['id_mahasiswa']);
            $this->session->set_userdata('nama',$data['nama']);
            $this->session->set_userdata('nim',$data['nim']);
            redirect('user/index');
        }
        else if($cek_admin->num_rows() > 0){
            $data=$cek_admin->row_array();
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