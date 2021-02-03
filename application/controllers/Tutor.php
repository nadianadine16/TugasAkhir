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
        
        $data['KategoriMateri'] = $this->Tutor_model->getAllKategoriMateri();
        $this->load->view('Tutor/Daftar_Tutor', $data);
        $this->load->view('template/footer_tutor',$data);
    }
    public function Tambah_Tutor()
    {
        $data['title'] = 'Daftar Tutor';
        $data['KategoriMateri'] = $this->Tutor_model->getAllKategoriMateri();

        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('id_kategori_materi', 'id_kategori_materi', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        
        $nim=htmlspecialchars($this->input->post('nim'));
        $id_kategori_materi=htmlspecialchars($this->input->post('id_kategori_materi'));
        $status=htmlspecialchars($this->input->post('status'));
        // $cek_nim = $this->Tutor_model->cekNim($nim);

        if($this->form_validation->run() == FALSE) {
            $this->load->view('Tutor/Daftar_Tutor', $data);
            $this->load->view('template/footer_tutor',$data);
        }
        else{
            $cek_nim = $this->Tutor_model->cekNim($nim, $id_kategori_materi, $status);
            // $cek = $this->db->query("SELECT m.id_mahasiswa FROM mahasiswa m WHERE m.nim='".$this->input->post('nim')."' AND NOT EXISTS (SELECT * FROM tutor t WHERE t.id_mahasiswa = m.id_mahasiswa)")->num_rows();
            // if($cek==1){
            //     $this->Tutor_model->Tambah_Tutor();
            //     $this->load->view('login/index');

            // }
        }
    }
    
}