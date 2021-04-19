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
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] ='Dashboard User';
        $data['kategori_materi'] = $this->User_model->getAllKategoriMateri();
        $data['nama_tutor'] = $this->User_model->daftar_tutor();
        $data['daftar_materi_limit'] = $this->User_model->daftar_materi_limit();

        $this->load->view('template/header_user', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function forum()
    {
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
        $data['forum'] = $this->User_model->getAllForum($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

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
     
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
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
        $data['title'] ='Profil';
        $this->load->view('template/header_user', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function prosesEditProfile()
    {
        $data['title'] = 'Profil';
     
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

    public function daftarMateri(){
        $data['title'] ='Daftar Materi';
        $data['daftar_materi'] = $this->User_model->daftar_materi();

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Daftar_Materi', $data);
        $this->load->view('template/footer_user', $data);
    }
    public function daftarMateribyKategori($id){
        $data['title'] ='Daftar Materi';
        $data['daftar_materi'] = $this->User_model->daftar_materi_byKategori($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Daftar_Materi', $data);
        $this->load->view('template/footer_user', $data);
    }
    public function daftarKonten($id){
        $data['title'] ='Daftar Konten';
        $data['daftar_konten'] = $this->User_model->daftar_konten($id);
        $data['materi'] = $this->User_model->getMateriByIdMateri($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Daftar_Konten', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function detailKonten($id){
        $data['title'] ='Detail Materi';
        $data['detail_materi'] = $this->User_model->detail_konten($id);        

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Detail_Materi', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function kumpulkanTugas($id){
        $data['title'] ='Kumpulkan Tugas';
        $data['detail_materi'] = $this->User_model->detail_konten($id);
        $data['tampil'] = $this->User_model->tampil_tugas($id);

        $cek = $this->User_model->cek_tugas($id);
        if($cek){
            $this->load->view('template/header_user', $data);
            $this->load->view('user/Kumpulkan_Tugas', $data);
            $this->load->view('template/footer_user', $data);    
        }
        else{
            $this->load->view('template/header_user', $data);
            $this->load->view('user/Kumpulkan_Tugas2', $data);
            $this->load->view('template/footer_user', $data);
        }

        
    }

    public function tambah_tugas(){
        $data['title'] = 'Tambah Tugas';

        $this->form_validation->set_rules('id_konten', 'id_konten', 'required');
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
        $data['title'] ='Chat Forum';
        $data['detail_pertanyaan'] = $this->User_model->detail_pertanyaan($id);
        $data['jawaban'] = $this->User_model->jawaban($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Detail_Forum', $data);
        $this->load->view('template/footer_user', $data);
    }
    public function Detail_Private_Chat($send_to){
        $data['title'] = 'Private Chat';
        $pengirim = $this->session->userdata('id_mahasiswa');
        
        // $tampil_chat = $this->User_model->GetChat($send_to,$pengirim);
        // $data['nama_tutor'] = $this->User_model->daftar_tutor();        
        // $data['jawaban'] = $this->User_model->pesan_private_chat($send_to,$pengirim);
        // $data['to'] = $id;

        // $this->load->view('template/header_user', $data);
        // $this->load->view('user/Detail_Private_Chat', $data);
        // $this->load->view('template/footer_user', $data);
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$isi_pesan = $this->input->post('isi_pesan');
            date_default_timezone_set('Asia/Jakarta');
			$data  = [
				'send_by' =>$pengirim,
				'send_to' =>$send_to,
				'isi_pesan'=>$isi_pesan,
                "time" => date('Y-m-d H:i:s', time())
			];

			$this->db->insert('private_chat',$data);
			redirect('User/Detail_Private_Chat/'.$send_to);
		} else {
			$this->db->where_in('send_by', [$pengirim,$send_to]);
			$this->db->where_in('send_to', [$pengirim,$send_to]);
			$this->db->order_by('time', 'ASC');
			$data['send_to'] = $send_to;
			$data['chat'] = $this->db->get('private_chat')->result();
            $data['nama_tujuan'] = $this->User_model->namaTujuan($send_to);

			$this->load->view('template/header_user', $data);
            $this->load->view('user/Detail_Private_Chat', $data);
            $this->load->view('template/footer_user', $data);
		}

    }

    public function ajax($send_to){
		$id = $this->session->userdata('id');

		$this->db->where_in('from', [$id,$to]);
		$this->db->where_in('to', [$id,$to]);
		$this->db->order_by('created_at', 'ASC');
		$data['to'] = $to;
		$data['chats'] = $this->db->get('chats')->result();

		$result = '<div class="border rounded">';
		
		foreach ($data['chats'] as $item) { 
			if ($item->from == $id) {
				$result .= '<div class="text-right"><span class="mr-2 text-primary" style="font-size:22px;">'.$item->message.'</span><br><span style="font-size:11px;" class="text-secondary mr-2">'.date('d-m-Y H:i:s',strtotime($item->created_at)).'</span></div>';
			} 
			else {
				$result .= '<div class="text-left"><span class="ml-2" style="font-size:22px;">'.$item->message.'</span><br><span style="font-size:11px;" class="text-secondary ml-2">'.date('d-m-Y H:i:s',strtotime($item->created_at)).'</span></div>';
			}

		}
		$result .= '</div>';
		echo $result;
	}

    public function Detail_Tutor($id) {
        $data['title'] ='Detail Tutor';        
        $data['detail'] = $this->User_model->detailTutor($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Detail_Tutor', $data);
        $this->load->view('template/footer_user', $data);
    }
    public function SeeAllTutor() {
        $data['title'] ='List Tutor';
        $data['nama_tutor'] = $this->User_model->daftar_tutor();

        $this->load->view('template/header_user', $data);
        $this->load->view('user/SeeAllTutor', $data);
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
    public function Jawab_Private_Chat($id_mahasiswa, $id_tutor) {
        $data['title'] ='Private Chat';        

        $this->form_validation->set_rules('isi_pesan', 'isi_pesan', 'required');

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
    public function cari(){
        $keyword=  $this->input->post('keyword');        
        $data['title'] = 'Forum';        
        $data['forum'] = $this->User_model->search();

        $this->load->view('template/header_user', $data);
        $this->load->view("user/Search",$data);
        $this->load->view('template/footer_user', $data);        
    }
    public function Private_Chat(){        
        $data['title'] = 'Private Chat';      
        $data['nama_tutor'] = $this->User_model->tutor();

        $this->load->view('template/header_user', $data);
        $this->load->view("user/Private_Chat",$data);
        $this->load->view('template/footer_user', $data);        
    }
}
?>