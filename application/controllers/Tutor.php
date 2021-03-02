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
            $this->load->library('pagination');
    }
    public function index()
    {
        $data['title'] = 'Dashboard Tutor';
        $data['materi'] = $this->Tutor_model->Hitung_Materi($this->session->userdata('id_tutor'));
        // $data['private_chat'] = $this->Tutor_model->Hitung_Private_Chat();
        $data['forum'] = $this->Tutor_model->Hitung_Forum();

        $this->load->view('template/header2_tutor',$data);
        $this->load->view('Tutor/Index',$data);
        $this->load->view('template/footer2_tutor',$data);
    }

    public function Daftar_Tutor()
    {
        $data['title'] = 'Daftar Tutor';
        $this->session->sess_destroy();
        $data['mahasiswa'] = $this->Tutor_model->getNim();
        $data['KategoriMateri'] = $this->Tutor_model->getAllKategoriMateri();
        $this->load->view('Tutor/Daftar_Tutor', $data);
        $this->load->view('template/footer_tutor',$data);
    }

    public function Tambah_Tutor()
    {
        $data['title'] = 'Daftar Tutor';

        $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required');
        $this->form_validation->set_rules('file', 'File', 'required'); 
        
        if($this->form_validation->run() == FALSE) {
            echo"<script>alert('Tidak Terdaftar');</script>";
            redirect('Tutor/Daftar_Tutor','refresh');
        }
        else {
            $this->Tutor_model->Tambah_Tutor();
            echo"<script>alert('Terdaftar');</script>";
            redirect('Login/index','refresh');
        }
        // $data['mahasiswa'] = $this->Tutor_model->getNim();
        // $data['KategoriMateri'] = $this->Tutor_model->getAllKategoriMateri();

        // $this->form_validation->set_rules('nim', 'nim', 'required');
        // $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required');
        // $this->form_validation->set_rules('id_kategori_materi', 'id_kategori_materi', 'required');
        // $this->form_validation->set_rules('status', 'status', 'required');

        // $nim=htmlspecialchars($this->input->post('id_mahasiswa'));
        // $cek_nim = $this->Tutor_model->cekNim($nim);

        // if($this->form_validation->run() == FALSE) {
        //     // $this->session->sess_destroy();
        //     $this->load->view('Tutor/Daftar_Tutor', $data);
        //     $this->load->view('template/footer_tutor',$data);
        // }
        // else {
        // if($cek_nim) {
        //     $data=$cek_nim->row_array();
            // $this->session->set_userdata('id_mahasiswa',$data['id_mahasiswa']);
        //     $this->Tutor_model->Tambah_Tutor($nim);
        //     echo"<script>alert('Terdaftar');</script>";
        //     redirect('Login/Index','refresh');
        //     $this->session->sess_destroy();
        // }
        // else {
        //     echo"<script>alert('NIM Tidak Terdaftar');</script>";
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

    public function Detail_Materi($id_materi) {
        $data['title'] = 'Detail Materi';
        $data['materi'] = $this->Tutor_model->detail_materi($id_materi);

        $this->load->view('template/header2_tutor',$data);
        $this->load->view('Tutor/Detail_Materi', $data);
        $this->load->view('template/footer2_tutor',$data);
    }

    public function Cari_Materi() {
        $data['title'] = 'Data Materi';
        
        $id_tutor = $this->session->userdata('id_tutor');
        $data['materi'] = $this->Tutor_model->getMateriByIdTutor($id_tutor);
        
        if($this->input->post('submit')){
            $keyword =  $this->input->post('keyword');

            $data['materi'] = $this->Tutor_model->Cari_Materi($keyword);
        }
        $this->load->view('template/header2_tutor',$data);
        $this->load->view('Tutor/Hasil_Cari_Materi', $data);
        $this->load->view('template/footer2_tutor',$data);
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
        $this->form_validation->set_rules('id_user', 'id_user', 'required');

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

    public function KategoriForum() {
        $data['title'] = 'Kategori Forum';
        $data['Kategori_forum'] = $this->Tutor_model->getAllKategoriForum();        

        $this->load->view('template/header2_tutor',$data);
        $this->load->view('Tutor/Kategori_Forum', $data);
        $this->load->view('template/footer2_tutor',$data);
    }

    public function Forum() {
        $config['base_url'] = site_url('tutor/forum'); //site url
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
        $data['title'] = 'Forum';
        $data['forum'] = $this->Tutor_model->getAllForum($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('template/header2_tutor',$data);
        $this->load->view('Tutor/Forum', $data);
        $this->load->view('template/footer2_tutor',$data);
    }

    public function Detail_Forum($id) {
        $data['title'] ='Forum';
        $data['detail_pertanyaan'] = $this->Tutor_model->detail_pertanyaan($id);
        $data['jawaban'] = $this->Tutor_model->jawaban($id);

        $this->load->view('template/header2_tutor', $data);
        $this->load->view('Tutor/Detail_Forum', $data);
        $this->load->view('template/footer2_tutor', $data);
    }

    public function Jawab_Forum($id) {
        $data['title'] ='Forum';
        $data['detail_pertanyaan'] = $this->Tutor_model->detail_pertanyaan($id);

        $this->form_validation->set_rules('chat', 'chat', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_tutor', $data);
            $this->load->view('tutor/Detail_Forum', $data);
            $this->load->view('template/footer2_tutor', $data);
        }
        else {
            $this->Tutor_model->Jawab_Forum($id);
            echo"<script>alert('Jawaban Anda Berhasil Dikirim');</script>";
            redirect('Tutor/Detail_Forum/'.$id ,'refresh');
        }
    }
    public function cari(){
        $keyword=  $this->input->post('keyword');        
        $data['title'] = 'Forum';        
        $data['forum'] = $this->Tutor_model->search();

        $this->load->view('template/header2_tutor', $data);
        $this->load->view("tutor/Search",$data);
        $this->load->view('template/footer2_tutor', $data);     
    }
}
?>