<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('Admin_model');
            $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $this->load->view('template/header2_admin',$data);
        $this->load->view('template/footer2_admin',$data);
    }
    public function data_mahasiswa()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $this->Admin_model->getAllMahasiswa();
        $this->load->view('template/header2_admin',$data);
        $this->load->view('Admin/Data_Mahasiswa',$data);
        $this->load->view('template/footer2_admin',$data);
    }
    public function detail_data_mahasiswa($id)
    {
        $data['title'] = 'Detail Data Mahasiswa';
        $data['mahasiswa'] = $this->Admin_model->detail_mahasiswa($id);
        $this->load->view('template/header2_admin',$data);
        $this->load->view('Admin/Detail_Mahasiswa',$data);
        $this->load->view('template/footer2_admin',$data);
    }
    public function edit_data_mahasiswa($id) {
        $data['title'] = 'Edit Data Mahasiswa';
        $data['mahasiswa'] = $this->Admin_model->getMahasiswaById($id);
        $data['prodi'] = ['Manajemen Informatika', 'Teknik Informatika'];
        $data['jurusan'] = ['Teknologi Informasi'];

        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('kelas', 'kelas', 'required');
        $this->form_validation->set_rules('tahun_masuk', 'tahun_masuk', 'required');
        $this->form_validation->set_rules('github', 'github', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_admin',$data);
            $this->load->view('admin/Edit_Mahasiswa', $data);
            $this->load->view('template/footer2_admin');
        }
        else {
            $this->Admin_model->edit_data_mahasiswa($id);
            redirect('Admin/data_mahasiswa','refresh');
        }
    }
    public function tambah_data_mahasiswa(){
        $data['title'] = 'Tambah Data Mahasiswa';
        $data['prodi'] = ['Manajemen Informatika', 'Teknik Informatika'];
        $data['jurusan'] = ['Teknologi Informasi'];

        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('kelas', 'kelas', 'required');
        $this->form_validation->set_rules('tahun_masuk', 'tahun_masuk', 'required');
        $this->form_validation->set_rules('github', 'github', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_admin',$data);
            $this->load->view('admin/Tambah_Mahasiswa', $data);
            $this->load->view('template/footer2_admin', $data);
        }
        else {
            $this->Admin_model->tambah_data_mahasiswa();
            redirect('Admin/data_mahasiswa','refresh');
        }    
    }
    public function hapus_data_mahasiswa($id) {
        $this->Admin_model->hapus_data_mahasiswa($id);
        redirect('Admin/data_mahasiswa','refresh');
    }
    public function data_tutor()
    {
        $data['title'] = 'Data Tutor';
        $data['tutor'] = $this->Admin_model->getAllTutor();
        $this->load->view('template/header2_admin',$data);
        $this->load->view('Admin/Data_Tutor',$data);
        $this->load->view('template/footer2_admin',$data);
    }
    public function hapus_data_tutor($id) {
        $this->Admin_model->hapus_data_tutor($id);
        redirect('Admin/data_tutor','refresh');
    }
    public function data_kategori_materi()
    {
        $data['title'] = 'Data Kategori Materi';
        $data['kategoriMateri'] = $this->Admin_model->getAllKategoriMateri();
        $this->load->view('template/header2_admin',$data);
        $this->load->view('Admin/Data_Kategori_Materi',$data);
        $this->load->view('template/footer2_admin',$data);
    }
    public function edit_data_kategori_materi($id) {
        $data['title'] = 'Edit Data Kategori Materi';
        $data['kategoriMateri'] = $this->Admin_model->getKategoriMateriById($id);

        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required');        

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_admin',$data);
            $this->load->view('admin/Edit_Kategori_Materi', $data);
            $this->load->view('template/footer2_admin');
        }
        else {
            $this->Admin_model->edit_data_kategori_materi($id);
            redirect('Admin/data_kategori_materi','refresh');
        }
    }
    public function hapus_data_kategori_materi($id) {
        $this->Admin_model->hapus_data_kategori_materi($id);
        redirect('Admin/data_kategori_materi','refresh');
    }
    public function tambah_kategori_materi(){
        $data['title'] = 'Tambah Kategori Materi';

        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_admin',$data);
            $this->load->view('admin/Tambah_Kategori_Materi', $data);
            $this->load->view('template/footer2_admin', $data);
        }
        else {
            $this->Admin_model->tambah_kategori_materi();
            redirect('Admin/data_kategori_materi','refresh');
        }    
    }
    public function data_tutor_belum_verifikasi()
    {
        $data['title'] = 'Data Tutor Belum Terverifikasi';
        $data['tutor'] = $this->Admin_model->getUnregPendaftaran();
        $this->load->view('template/header2_admin',$data);
        $this->load->view('Admin/Verifikasi_Tutor',$data);
        $this->load->view('template/footer2_admin',$data);
    }
    public function status_pendaftaran($id) {
        $data['title'] = 'Data Tutor Belum Terverifikasi';
        $data['unreg'] = $this->Admin_model->getUnregPendaftaran();

        $this->form_validation->set_rules('status', 'Status', 'required');

        $action = $this->input->post('action');


        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/Verifikasi_Tutor',$data);
            $this->load->view('template/footer2_admin',$data);
        }
        else {
            if($action == 'terima') {
                // execute code to log in
                $this->Admin_model->status_pendaftaran($id);
                redirect('admin/data_tutor', 'refresh');
            }
            if($action == 'tolak') {
                // execute code to forget the password
                $this->Admin_model->hapus_data_tutor($id);
                redirect('admin/data_tutor', 'refresh');
            }
            
        }
    }
}