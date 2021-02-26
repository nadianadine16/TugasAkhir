<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] ='Dashboard User';
        $this->load->view('template/header_user', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function forum()
    {
        $data['title'] ='Forum';
        $data['forum'] = $this->User_model->getAllForum();

        $this->load->view('template/header_user', $data);
        $this->load->view('user/forum', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function contactus()
    {
        $data['title'] ='Contact Us';
        $this->load->view('template/header_user', $data);
        $this->load->view('user/contactus', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function prosesContactus()
    {
        $data['title'] = 'Contact Us';
     
        $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required');
        $this->form_validation->set_rules('subject', 'subject', 'required');   
        $this->form_validation->set_rules('kritik_saran', 'kritik_saran', 'required');   
        
        if($this->form_validation->run() == FALSE) {
            redirect('user/contactus','refresh');
        }
        else {
            $this->User_model->tambah_kritik();
            redirect('user/index','refresh');
        }
    }
    
    public function profile()
    {
        $data['title'] ='Profile';
        $this->load->view('template/header_user', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function prosesEditProfile()
    {
        $data['title'] = 'Profile';
     
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
            redirect('user/index','refresh');
        }
    }

    public function kategoriMateri(){
        $data['title'] ='Daftar Kategori Materi';
        $data['kategori_materi'] = $this->User_model->getAllKategoriMateri();
        $this->load->view('template/header_user', $data);
        $this->load->view('user/Kategori_Materi', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function daftarMateri($id){
        $data['title'] ='Daftar Materi';
        $data['daftar_materi'] = $this->User_model->daftar_materi($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Daftar_Materi', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function detailMateri($id){
        $data['title'] ='Detail Materi';
        $data['detail_materi'] = $this->User_model->detail_materi($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Detail_Materi', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function kumpulkanTugas($id){
        $data['title'] ='Detail Materi';
        $data['detail_materi'] = $this->User_model->detail_materi($id);
        $data['tampil'] = $this->User_model->tampil_tugas($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Kumpulkan_Tugas', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function tambah_tugas(){
        $data['title'] = 'Tambah Tugas';

        $this->form_validation->set_rules('id_materi', 'id_materi', 'required');
        $this->form_validation->set_rules('tugas', 'tugas', 'required');
        $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header_user', $data);
            $this->load->view('user/Kumpulkan_Tugas', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            $this->User_model->tambah_tugas();
            redirect('User/index','refresh');
        }    
    }

    public function Tanya_Forum() {
        $data['title'] ='Forum';
        $data['KategoriMateri'] = $this->User_model->getAllKategoriMateri();

        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required');

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

    public function Detail_Forum($id) {
        $data['title'] ='Forum';
        $data['detail_pertanyaan'] = $this->User_model->detail_pertanyaan($id);
        $data['jawaban'] = $this->User_model->jawaban($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Detail_Forum', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function Jawab_Forum($id) {
        $data['title'] ='Forum';
        $data['detail_pertanyaan'] = $this->User_model->detail_pertanyaan($id);

        $this->form_validation->set_rules('chat', 'chat', 'required');

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
}
?>