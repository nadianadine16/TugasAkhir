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
        $data['mahasiswa'] = $this->Admin_model->getCountMahasiswa();
        $data['tutor'] = $this->Admin_model->getCountTutor();
        $data['kategori_materi'] = $this->Admin_model->getCountKategoriMateri();
        $data['kritik_saran'] = $this->Admin_model->getCountKritikSaran();
        $data['forum'] = $this->Admin_model->getCountForum();
        $this->load->view('template/header2_admin',$data);
        $this->load->view('Admin/index',$data);
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
        // $this->form_validation->set_rules('github', 'github', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_admin',$data);
            $this->load->view('admin/Edit_Mahasiswa', $data);
            $this->load->view('template/footer2_admin');
        }
        else {
            $this->Admin_model->edit_data_mahasiswa($id);
            echo"<script>alert('Data Mahasiswa Berhasil Diedit!');</script>";
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
        $this->form_validation->set_rules('github', 'github');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_admin',$data);
            $this->load->view('admin/Tambah_Mahasiswa', $data);
            $this->load->view('template/footer2_admin', $data);
        }
        else {
            $this->Admin_model->tambah_data_mahasiswa();
            echo"<script>alert('Data Mahasiswa Berhasil Ditambahkan!');</script>";
            redirect('Admin/data_mahasiswa','refresh');
        }    
    }

    public function hapus_data_mahasiswa($id) {
        $this->Admin_model->hapus_data_mahasiswa($id);
        echo"<script>alert('Data Mahasiswa Berhasil Dihapus!');</script>";
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
        echo"<script>alert('Data Tutor Berhasil Dihapus!');</script>";
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
            echo"<script>alert('Kategori Materi Berhasil Diedit!');</script>";
            redirect('Admin/data_kategori_materi','refresh');
        }
    }

    public function hapus_data_kategori_materi($id) {
        $this->Admin_model->hapus_data_kategori_materi($id);
        echo"<script>alert('Kategori Materi Berhasil Dihapus!');</script>";
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
            echo"<script>alert('Kategori Materi Berhasil Ditambahkan!');</script>";
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
                echo"<script>alert('Tutor Telah Diterima!');</script>";
                redirect('admin/data_tutor', 'refresh');
            }
            if($action == 'tolak') {
                // execute code to forget the password
                $this->Admin_model->hapus_data_tutor($id);
                echo"<script>alert('Tutor Telah Ditolak!');</script>";
                redirect('admin/data_tutor', 'refresh');
            }
            
        }
    }

    public function data_kritik_saran()
    {
        $data['title'] = 'Data Kritik Saran';
        $data['kritik_saran'] = $this->Admin_model->getAllKritikSaran();
        $this->load->view('template/header2_admin',$data);
        $this->load->view('Admin/Data_Kritik_Saran',$data);
        $this->load->view('template/footer2_admin',$data);
    }

    public function hapus_kritik_saran($id) {
        $this->Admin_model->hapus_kritik_saran($id);
        echo"<script>alert('Kritik dan Saran Berhasil Dihapus!');</script>";
        redirect('Admin/Data_Kritik_Saran','refresh');
    }

    public function profile()
    {
        $data['title'] = 'Ubah Password';
        $this->form_validation->set_rules('id_admin', 'id_admin', 'required');
        $this->form_validation->set_rules('password_lama', 'password_lama', 'required');
        $this->form_validation->set_rules('password_baru', 'password_baru', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/Ganti_Password',$data);
            $this->load->view('template/footer2_admin',$data);
        }
        else {
            $query = $this->Admin_model->checkPasswordLama($this->input->post('password_lama'));
            if($query){
                $query = $this->Admin_model->Update_Password($this->input->post('password_baru'));
                if($query){
                    echo"<script>alert('Password Berhasil Diubah!');</script>";
                    redirect('Admin/index','refresh');
                }
                else{
                    echo"<script>alert('Ubah Password Gagal!');</script>";
                    redirect('Admin/profile','refresh');
                }
            }
            else{
                echo"<script>alert('Password yang Anda Masukkan Salah!');</script>";
                redirect('Admin/profile','refresh');
            }    
        }
    }

    public function forum() {
        $data['title'] = 'Forum';
        $data['forum'] = $this->Admin_model->getAllForum();

        $this->load->view('template/header2_admin',$data);
        $this->load->view('Admin/Forum',$data);
        $this->load->view('template/footer2_admin',$data);
    }

    public function Detail_Forum($id) {
        $data['title'] = 'Forum';
        $data['detail_forum'] = $this->Admin_model->getForumById($id);
        $data['jawaban_forum'] = $this->Admin_model->jawaban_forum($id);

        $this->load->view('template/header2_admin',$data);
        $this->load->view('Admin/Detail_Forum',$data);
        $this->load->view('template/footer2_admin',$data);
    }

    public function hapus_forum($id) {
        $this->Admin_model->hapus_forum($id);
        echo"<script>alert('Forum Berhasil Dihapus!');</script>";
        redirect('Admin/Forum','refresh');
    }
    public function detail_data_tutor($id){
        $data['title'] = 'Detail Tutor';
        $data['detail_tutor'] = $this->Admin_model->getTutorById($id);        

        $this->load->view('template/header2_admin',$data);
        $this->load->view('Admin/Detail_Tutor',$data);
        $this->load->view('template/footer2_admin',$data);
    }
}