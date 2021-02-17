<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tutor extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('Tutor_model');
            $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Dashboard Tutor';
        $this->load->view('template/header2_tutor',$data);
        $this->load->view('template/footer2_tutor',$data);
    }

    public function Daftar_Tutor()
    {
        $data['title'] = 'Daftar Tutor';
        $this->session->sess_destroy();
        $data['KategoriMateri'] = $this->Tutor_model->getAllKategoriMateri();
        $this->load->view('Tutor/Daftar_Tutor', $data);
        $this->load->view('template/footer_tutor',$data);
    }

    public function Tambah_Tutor()
    {
        $data['title'] = 'Daftar Tutor';
        $data['KategoriMateri'] = $this->Tutor_model->getAllKategoriMateri();

        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required');
        $this->form_validation->set_rules('id_kategori_materi', 'id_kategori_materi', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        $nim=htmlspecialchars($this->input->post('nim'));
        $cek_nim = $this->Tutor_model->cekNim($nim);

        if($this->form_validation->run() == FALSE) {
            $this->session->sess_destroy();
            $this->load->view('Tutor/Daftar_Tutor', $data);
            $this->load->view('template/footer_tutor',$data);
        }
        else {
            if($cek_nim) {
                $data=$cek_nim->row_array();
                $this->session->set_userdata('id_mahasiswa',$data['id_mahasiswa']);
                $this->Tutor_model->Tambah_Tutor($nim);
                echo"<script>alert('Terdaftar');</script>";
                redirect('Login/Index','refresh');
                $this->session->sess_destroy();
            }
            else {
                echo"<script>alert('NIM Tidak Terdaftar');</script>";
            }
        }
        
        
        

        // if($this->form_validation->run() == FALSE) {
        //     $this->load->view('Tutor/Daftar_Tutor', $data);
        //     $this->load->view('template/footer_tutor',$data);
        // }
        // else {
        //     if($cek_nim->num_rows() > 0){
        //         $this->Tutor_model->Tambah_Tutor($nim);
                // echo"<script>alert('Kritik dan Saran Anda Berhasil Dikirim');</script>";
            //     redirect('Login/Index','refresh');
            // }
            // $cek_nim = $this->Tutor_model->cekNim($nim, $id_kategori_materi, $status);
            // $cek = $this->db->query("SELECT m.id_mahasiswa FROM mahasiswa m WHERE m.nim='".$this->input->post('nim')."' AND NOT EXISTS (SELECT * FROM tutor t WHERE t.id_mahasiswa = m.id_mahasiswa)")->num_rows();
            // if($cek==1){
            //     $this->Tutor_model->Tambah_Tutor();
            //     $this->load->view('login/index');

            // }
        // }
    }

    public function Data_Materi() {
        $data['title'] = 'Data Materi';
        
        $id_tutor = $this->session->userdata('id_tutor');
        $data['materi'] = $this->Tutor_model->getMateriByIdTutor($id_tutor);

        $this->load->view('template/header2_tutor',$data);
        $this->load->view('Tutor/Data_Materi', $data);
        $this->load->view('template/footer2_tutor',$data);
    }

    public function Tambah_Materi() {
        $data['title'] = 'Form Tambah Materi';
        $data['kategori_materi'] = $this->Tutor_model->getAllKategoriMateri();

        $this->form_validation->set_rules('nama_materi', 'nama_materi', 'required');
        $this->form_validation->set_rules('id_kategori_materi', 'id_kategori_materi', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('id_tutor', 'id_tutor', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Tambah_Materi', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            $this->Tutor_model->Tambah_Materi();
            redirect('Tutor/Data_Materi','refresh');
        }
    }

    public function Hapus_Materi($id_materi) {
        $this->Tutor_model->Hapus_Materi($id_materi);
        redirect('Tutor/Data_Materi','refresh');
    }

    public function Edit_Materi($id_materi) {
        $data['title'] = 'Form Edit Materi';
        $data['materi'] = $this->Tutor_model->getMateriById($id_materi);
        $data['kategori_materi'] = $this->Tutor_model->getAllKategoriMateri();

        $this->form_validation->set_rules('nama_materi', 'nama_materi', 'required');
        $this->form_validation->set_rules('id_kategori_materi', 'id_kategori_materi', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('id_tutor', 'id_tutor', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Edit_Materi', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            $this->Tutor_model->Edit_Materi($id_materi);
            redirect('Tutor/Data_Materi','refresh');
        }
    }

    public function Tugas_Mahasiswa() {
        $data['title'] = 'Pengumpulan Tugas Mahasiswa';
        $data['tugas'] = $this->Tutor_model->getAllTugasUnVerif();
        $data['tugasverif'] = $this->Tutor_model->getAllTugasVerif();

        $this->load->view('template/header2_tutor',$data);
        $this->load->view('Tutor/Tugas_mahasiswa', $data);
        $this->load->view('template/footer2_tutor',$data);
    }

    public function Verifikasi_Tugas($id_tugas) {
        $this->Tutor_model->Verifikasi_Tugas($id_tugas);
        redirect('Tutor/Tugas_Mahasiswa', 'refresh');
    }

    public function Hapus_Tugas($id_tugas) {
        $this->Tutor_model->Hapus_Tugas($id_tugas);
        redirect('Tutor/Tugas_Mahasiswa', 'refresh');
    }

    public function Kritik_Saran() {
        $data['title'] = 'Kritik dan Saran';

        $this->form_validation->set_rules('kritik_saran', 'Kritik dan Saran', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('id_tutor', 'id_tutor', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Kritik_Saran', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            $this->Tutor_model->Kritik_Saran();
            echo"<script>alert('Kritik dan Saran Anda Berhasil Dikirim');</script>";
            redirect('Tutor/Kritik_Saran','refresh');
        }
    }
}