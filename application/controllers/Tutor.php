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
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $data['materi'] = $this->Tutor_model->Hitung_Materi($this->session->userdata('id_tutor'));
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
        $this->form_validation->set_rules('id_kategori_materi', 'id_kategori_materi', 'required');
        
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
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $id_tutor = $this->session->userdata('id_tutor');
        $data['materi'] = $this->Tutor_model->getMateriByIdTutor($id_tutor);

        $this->load->view('template/header2_tutor',$data);
        $this->load->view('Tutor/Data_Materi', $data);
        $this->load->view('template/footer2_tutor',$data);
    }

    public function Tambah_Materi() {
        $data['title'] = 'Form Tambah Materi';
        $data['kategori_materi'] = $this->Tutor_model->getAllKategoriMateri();
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $this->form_validation->set_rules('nama_materi', 'nama_materi', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('requirement', 'requirement', 'required');
        $this->form_validation->set_rules('id_tutor', 'id_tutor', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Tambah_Materi', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            $this->Tutor_model->Tambah_Materi();
            echo"<script>alert('Materi Berhasil Ditambahkan!');</script>";
            redirect('Tutor/Data_Materi','refresh');
        }
    }

    public function Hapus_Materi($id_materi) {
        $this->Tutor_model->Hapus_Materi($id_materi);
        redirect('Tutor/Data_Materi','refresh');
    }

    public function Edit_Materi($id_materi) {
        $data['title'] = 'Form Edit Materi';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $data['materi'] = $this->Tutor_model->getMateriById($id_materi);
        $data['kategori_materi'] = $this->Tutor_model->getAllKategoriMateri();
        
        $this->form_validation->set_rules('nama_materi', 'nama_materi', 'required');
        $this->form_validation->set_rules('id_kategori_materi', 'id_kategori_materi', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('requirement', 'requirement', 'required');
        $this->form_validation->set_rules('id_tutor', 'id_tutor', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Edit_Materi', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            $this->Tutor_model->Edit_Materi($id_materi);
            echo"<script>alert('Materi Berhasil Diubah!');</script>";
            redirect('Tutor/Data_Materi','refresh');
        }
    }

    public function Detail_Materi($id_materi) {
        $data['title'] = 'Detail Materi';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $data['materi'] = $this->Tutor_model->getMateriByIdMateri($id_materi);
        $data['konten'] = $this->Tutor_model->Konten($id_materi);
        // $data['hitung_konten'] = $this->Tutor_model->Hitung_Konten($id_materi);

        $this->load->view('template/header2_tutor',$data);
        $this->load->view('Tutor/Detail_Materi', $data);
        $this->load->view('template/footer2_tutor',$data);
    }

    public function Tambah_Konten($id_materi) {
        $data['title'] = 'Form Tambah Konten';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $data['materi'] = $this->Tutor_model->getMateriByIdMateri($id_materi);

        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('soal', 'soal', 'required');
        $this->form_validation->set_rules('video', 'video', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Tambah_Konten', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            $this->Tutor_model->Tambah_Konten();
            echo"<script>alert('Konten Berhasil Ditambahkan!');</script>";
            redirect('Tutor/Detail_Materi/'.$id_materi ,'refresh');
        }
    }

    public function Edit_Konten($id_konten, $id_materi) {
        $data['title'] = 'Form Edit Konten';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $data['konten'] = $this->Tutor_model->getKontenById($id_konten);

        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('soal', 'soal', 'required');
        $this->form_validation->set_rules('video', 'video', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/header2_tutor',$data);
            $this->load->view('Tutor/Edit_Konten', $data);
            $this->load->view('template/footer2_tutor',$data);
        }
        else {
            $this->Tutor_model->Edit_Konten($id_konten);
            // echo"<script>alert('Konten Berhasil Di Edit!');</script>";
            redirect('Tutor/Detail_Materi/'.$id_materi ,'refresh');
        }
    }

    public function Hapus_Konten($id_konten, $id_materi) {
        $this->Tutor_model->Hapus_Konten($id_konten, $id_materi);
        echo"<script>alert('Konten Berhasil Dihapus!');</script>";
        redirect('Tutor/Detail_Materi/'.$id_materi ,'refresh');
    }

    public function Cari_Materi() {
        $data['title'] = 'Data Materi';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));

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
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $data['tugas'] = $this->Tutor_model->getAllTugasUnVerif();
        $data['revisi_tugas'] = $this->Tutor_model->getAllRevisiTugas();
        $data['tugasverif'] = $this->Tutor_model->getAllTugasVerif();

        $this->load->view('template/header2_tutor',$data);
        $this->load->view('Tutor/Tugas_mahasiswa', $data);
        $this->load->view('template/footer2_tutor',$data);
    }

    public function Verifikasi_Tugas($id_tugas) {
        $this->Tutor_model->Verifikasi_Tugas($id_tugas);
        echo"<script>alert('Verifikasi Tugas Berhasil!');</script>";
        redirect('Tutor/Tugas_Mahasiswa', 'refresh');
    }

    public function Hapus_Tugas($id_tugas) {
        $this->Tutor_model->Hapus_Tugas($id_tugas);
        echo"<script>alert('Tugas Berhasil Dihapus!');</script>";
        redirect('Tutor/Tugas_Mahasiswa', 'refresh');
    }

    public function Kritik_Saran() {
        $data['title'] = 'Kritik dan Saran';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));

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

    public function Forum() {
        $data['title'] ='Forum';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $data['forum'] = $this->Tutor_model->getAllForum();
        $data['kategori_forum'] = $this->Tutor_model->getAllKategoriForum();

        $this->load->view('template/header2_tutor',$data);
        $this->load->view('Tutor/Forum', $data);
        $this->load->view('template/footer2_tutor',$data);
    }

    public function Detail_Forum($id) {
        $data['title'] ='Forum';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $data['detail_pertanyaan'] = $this->Tutor_model->detail_pertanyaan($id);
        $data['jawaban'] = $this->Tutor_model->jawaban($id);

        $this->load->view('template/header2_tutor', $data);
        $this->load->view('Tutor/Detail_Forum', $data);
        $this->load->view('template/footer2_tutor', $data);
    }

    public function Jawab_Forum($id) {
        $data['title'] ='Forum';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
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
    public function Cari_Forum(){
        $data['title'] = 'Forum';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $data['kategori_forum'] = $this->Tutor_model->getAllKategoriForum();

        if($this->input->post('submit')){
            $kategori = $this->input->post('id_kategori');

            $data['forum'] = $this->Tutor_model->Search($kategori);
        }

        $this->load->view('template/header2_tutor', $data);
        $this->load->view("tutor/Hasil_Cari_Forum",$data);
        $this->load->view('template/footer2_tutor', $data);     
    }

    public function Cek_Status_Pendaftaran(){
        $data['title'] = 'Cek Status Pendaftaran Tutor';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));

        $this->load->view('Tutor/Cek_Status', $data);        
    }

    public function cari() {
        $keyword = $this->input->post('keyword');
        $berhasil=$this->Tutor_model->search1($keyword);
        $data['tampil']=$this->Tutor_model->search2($keyword);
        $gagal['cekPendaftaranTolak']=$this->Tutor_model->search3($keyword);

        if($berhasil){
            $this->load->view('tutor/hasil_search_berhasil',$data);
        }
        else{
            echo"<script>alert('Mohon maaf anda gagal / belum mendaftar menjadi tutor');</script>";
            redirect('Tutor/Cek_Status_pendaftaran','refresh');
        }
        // if($query = $this->Tutor_model->search1($this->input->post('keyword'))){

        //     $berhasil['cekPendaftaranBerhasil'] = $query;
        //     $this->load->view('tutor/hasil_search_berhasil',$berhasil);
        // }
        // else if($query = $this->Tutor_model->search2($this->input->post('keyword'))){
        //     $proses['cekPendaftaranProses'] = $query;
        //     $this->load->view('tutor/hasil_search_proses',$proses);
        // }
        
    }

    public function Private_Chat(){        
        $data['title'] = 'Private Chat';  
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));    
        $data['mahasiswa'] = $this->Tutor_model->Mahasiswa();

        $this->load->view('template/header2_tutor', $data);
        $this->load->view("Tutor/TPrivate_Chat",$data);
        $this->load->view('template/footer2_tutor', $data);        
    }

    public function Detail_Private_Chat($send_to){
        $data['title'] = 'Private Chat';
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));
        $pengirim = $this->session->userdata('id_tutor');

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$isi_pesan = $this->input->post('isi_pesan');

			$data  = [
				'send_by' =>$pengirim,
				'send_to' =>$send_to,
				'isi_pesan'=>$isi_pesan,
                "time" => date('Y-m-d H:i:s', time())
			];

			$this->db->insert('private_chat',$data);
			redirect('Tutor/Detail_Private_Chat/'.$send_to);
		} else {
			$this->db->where_in('send_by', [$pengirim,$send_to]);
			$this->db->where_in('send_to', [$pengirim,$send_to]);
			$this->db->order_by('time', 'ASC');
			$data['send_to'] = $send_to;
			$data['chat'] = $this->db->get('private_chat')->result();
            $data['nama_tujuan'] = $this->Tutor_model->namaTujuan($send_to);

			$this->load->view('template/header2_tutor', $data);
            $this->load->view('Tutor/TDetail_Private_Chat', $data);
            $this->load->view('template/footer2_tutor', $data);
		}
    }
    public function Chat($to)
    {        
        $data['title'] = 'Private Chat';  
		$id = $this->session->userdata('id_mahasiswa');
        $data['kategori_header'] = $this->Tutor_model->Kategori_header($this->session->userdata('id_kategori_materi'));    

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$message = $this->input->post('message');

			$data  = [
				'from' =>$id,
				'to' =>$to,
				'message'=>$message,				
			];

			$this->db->insert('private_chat',$data);
			redirect('Tutor/Chat/'.$to);
		} else {
			$this->db->where_in('from', [$id,$to]);
			$this->db->where_in('to', [$id,$to]);
			$this->db->order_by('created_at', 'ASC');
			$data['to'] = $to;
			$data['chats'] = $this->db->get('private_chat')->result();
            $data['nama_tujuan'] = $this->Tutor_model->namaTujuan($to);

			$this->load->view('template/header2_tutor', $data);
            $this->load->view('Tutor/TChat', $data);
            $this->load->view('template/footer2_tutor', $data);
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
				$result .= '<div class="text-right"><span class="mr-2 text-primary" style="font-size:18px;">'.$item->message.'</span><br><span style="font-size:11px;" class="text-secondary mr-2">'.date('d-m-Y H:i:s',strtotime($item->created_at)).'</span></div>';
			} 
			else {
				$result .= '<div class="text-left"><span class="ml-2" style="font-size:18px;">'.$item->message.'</span><br><span style="font-size:11px;" class="text-secondary ml-2">'.date('d-m-Y H:i:s',strtotime($item->created_at)).'</span></div>';
			}

		}        
		$result .= '</div>';
		echo $result;
	}
}
?>