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

        $this->load->view('user/Utama', $data);
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
        $data['cek_forum'] = $this->User_model->cek_forum();
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
    
    public function Edit_Profil($id_mahasiswa)
    {
        $data['title'] ='Edit Profil';
        $this->load->view('template/header_user', $data);
        $this->load->view('User/Edit_Profil', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function Detail_Akun($id_mahasiswa) {
        $data['title'] ='Detail Akun';        
        $data['mahasiswa'] = $this->User_model->Detail_Akun($id_mahasiswa);
        $data['tugas'] = $this->User_model->Tugas_Mahasiswa($id_mahasiswa);
        $data['forum'] = $this->User_model->Forum_yang_dibuat($id_mahasiswa);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Detail_Akun', $data);
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
            echo"<script>alert('Akun Anda Berhasil Diedit!');</script>";
            redirect('user/Detail_Akun/'.$this->session->userdata('id_mahasiswa'),'refresh');
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
    public function daftarMateribyKategori(){
        $data['title'] ='Daftar Materi';
        $kategori = htmlspecialchars($this->input->post('id_kategori_materi'));
        $data_session = array(
            'id_kategori_materi' => $kategori
            );
        $this->session->set_userdata($data_session);
        $data['daftar_materi'] = $this->User_model->daftar_materi_byKategori($kategori);

        if($this->input->post('submit')){
            $data['daftar_materi'] = $this->User_model->daftar_materi_byKategori($kategori);
        }

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Daftar_Materi', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function daftar_materi($id) {
        $data['title'] ='Daftar Materi';
        $data['daftar_materi'] = $this->User_model->daftar_materi_byKategori($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Daftar_Materi', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function daftarKonten($id){
        $data['title'] ='Daftar Konten';
        // $data['daftar_konten'] = $this->User_model->daftar_konten($id);
        // $data['materi'] = $this->User_model->getMateriByIdMateri($id);
        $data['materi'] = $this->User_model->getMateriByIdMateri($id);
        $data['konten'] = $this->User_model->Konten($id);
        $data['count'] = $this->User_model->getCountTugas($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Daftar_Konten2', $data);
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
        $data['cek_tugas'] = $this->User_model->cek($id);
        $data['tugas_by_id'] = $this->User_model->tampil_tugas($id);
        $data['tugas'] = $this->User_model->Tugas_Mahasiswa($this->session->userdata('id_mahasiswa'));
        $data['revisi_tugas'] = $this->User_model->Rev($this->session->userdata('id_mahasiswa'),$id);

        $cek = $this->User_model->cek_tugas($id);
        if($cek){
            $this->load->view('template/header_user', $data);
            $this->load->view('user/Kumpulkan_Tugas3', $data);
            $this->load->view('template/footer_user', $data);    
        }
        else{
            $this->load->view('template/header_user', $data);
            $this->load->view('user/Kumpulkan_Tugas2', $data);
            $this->load->view('template/footer_user', $data);
        }   
    }

    public function tambah_tugas($id_konten){
        $data['title'] = 'Tambah Tugas';

        $this->form_validation->set_rules('id_konten', 'id_konten', 'required');
        $this->form_validation->set_rules('tugas', 'tugas', 'required');
        $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header_user', $data);
            $this->load->view('user/Kumpulkan_Tugas2', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            $this->User_model->tambah_tugas();
            echo"<script>alert('Tugas Berhasil Dikirim! Jawaban akan Segera Diperiksa.');</script>";
            redirect('User/kumpulkanTugas/'.$id_konten,'refresh');
        }    
    }

    public function revisi_tugas($id_tugas, $id_konten) {
        $data['title'] = 'Revisi Tugas';

        $this->form_validation->set_rules('id_konten', 'id_konten', 'required');
        $this->form_validation->set_rules('tugas', 'tugas', 'required');
        $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header_user', $data);
            $this->load->view('user/Kumpulkan_Tugas3', $data);
            $this->load->view('template/footer_user', $data);
        }
        else {
            $this->User_model->revisi_tugas($id_tugas);
            echo"<script>alert('Tugas Berhasil Dikirim! Jawaban akan Segera Diperiksa.');</script>";
            redirect('User/kumpulkanTugas/'.$id_konten,'refresh');
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
        $data['jawaban_forum'] = $this->User_model->Cek_Jawaban($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Detail_Forum', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function Detail_Tutor($id) {
        $data['title'] ='Detail Tutor';        
        $data['detail'] = $this->User_model->detailTutor($id);
        $data['materi'] = $this->User_model->Daftar_Materi_by_tutor($id);

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Detail_Tutor', $data);
        $this->load->view('template/footer_user', $data);
    }
    public function SeeAllTutor() {
        $config['base_url'] = site_url('User/SeeAllTutor'); //site url
        $config['total_rows'] = $this->db->count_all('tutor'); //total row
        $config['per_page'] = 24;  //show record per halaman
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
        $data['title'] ='Daftar Tutor';
        $data['kategori_tutor'] = $this->User_model->getAllKategoriMateri();
        $data['nama_tutor'] = $this->User_model->daftar_tutor($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('template/header_user', $data);
        $this->load->view('user/SeeAllTutor', $data);
        $this->load->view('template/footer_user', $data);
    }

    public function Cari_Tutor() {
        $data['title'] ='Daftar Tutor';
        $data['kategori_tutor'] = $this->User_model->getAllKategoriMateri();
        $data['nama_tutor'] = $this->User_model->daftar_tutor2();

        if($this->input->post('submit')){
            $kategori = $this->input->post('id_kategori_materi');
            $keyword = $this->input->post('keyword');

            $data['nama_tutor'] = $this->User_model->Cari_Tutor($kategori, $keyword);
        }

        $this->load->view('template/header_user', $data);
        $this->load->view('user/Hasil_Cari_Tutor', $data);
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
    public function carimateri(){
        $keyword=  $this->input->post('keyword');        
        $data['title'] = 'Daftar Materi';        
        $data['cari_materi'] = $this->User_model->search3();

        $this->load->view('template/header_user', $data);
        $this->load->view("user/SearchMateri",$data);
        $this->load->view('template/footer_user', $data);        
    }
    public function cariChat(){
        $keyword=  $this->input->post('keyword'); 

        $data['title'] = 'Private Chat';        
        $data['caritutor'] = $this->User_model->search2($keyword);
        $data['nama_tutor'] = $this->User_model->daftar_tutor2();

        if($this->input->post('submit')){
            $keyword = $this->input->post('keyword');

            $data['nama_tutor'] = $this->User_model->Search_Chat($keyword);
        }

        $this->load->view('template/header_user', $data);
        $this->load->view("user/SearchChat",$data);
        $this->load->view('template/footer_user', $data);        
    }

    public function Private_Chat(){       
        $config['base_url'] = site_url('User/Private_Chat'); //site url
        $config['total_rows'] = $this->User_model->hitung_tutor(); //total row
        $config['per_page'] = 10;  //show record per halaman
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
        $data['title'] = 'Private Chat';      
        $id = $this->session->userdata('id_mahasiswa');
        $data['nama_tutor'] = $this->User_model->tutor($config["per_page"], $data['page']);        
        $data['pagination'] = $this->pagination->create_links();
                
        $this->load->view('template/header_user', $data);
        $this->load->view("user/Private_Chat",$data);
        $this->load->view('template/footer_user', $data);        
    }    

    public function Chat($to)
    {        
        $data['title'] = 'Private Chat';  
		$id = $this->session->userdata('id_mahasiswa');
        $this->form_validation->set_rules('message', 'message', 'required');
        
        if($this->form_validation->run() == TRUE) {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $message = $this->input->post('message');

                $data  = [
                    'from' =>$id,
                    'to' =>$to,
                    'message'=>$message,				
                ];

                $this->db->insert('private_chat',$data);
                redirect('User/Chat/'.$to);
            } 
        }else {
			$this->db->where_in('from', [$id,$to]);
			$this->db->where_in('to', [$id,$to]);
			$this->db->order_by('created_at', 'ASC');
			$data['to'] = $to;
			$data['chats'] = $this->db->get('private_chat')->result();
            $data['nama_tujuan'] = $this->User_model->namaTujuan($to);
            

			$this->load->view('template/header_user', $data);                             
            $this->load->view('User/Chat', $data);
            $this->load->view('template/footer_user', $data);
		}
    }
    public function ajax($to){
		$id = $this->session->userdata('id_mahasiswa');

		$this->db->where_in('from', [$id,$to]);
		$this->db->where_in('to', [$id,$to]);
		$this->db->order_by('created_at', 'ASC');
		$data['to'] = $to;
		$data['chats'] = $this->db->get('private_chat')->result();

		$result = '<div class="border rounded" id="border_rounded" style="height:400px;display:block; overflow:auto; font-size: 15px; font-family: Times, Times New Roman, Georgia, serif;">';
		
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
    
    
}
?>