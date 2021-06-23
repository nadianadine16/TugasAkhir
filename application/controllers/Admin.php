<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    // untuk memanggil kelas model atau library yang akan kita gunakan pada setiap function
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
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Dashboard Admin';
            // menampilkan jumlah data mahasiswa
            $data['mahasiswa'] = $this->Admin_model->getCountMahasiswa();
            // menampilkan jumlah data tutor
            $data['tutor'] = $this->Admin_model->getCountTutor();
            // menampilkan jumlah data kategori materi
            $data['kategori_materi'] = $this->Admin_model->getCountKategoriMateri();
            // menampilkan jumlah data kritik dan saran
            $data['kritik_saran'] = $this->Admin_model->getCountKritikSaran();
            // menampilkan jumlah data forum
            $data['forum'] = $this->Admin_model->getCountForum();
            // menampilkan jumlah session mahasiswa sering aktif
            $data['hasil']= $this->Admin_model->getCountSessionMahasiswa(); 
            // menampilkan jumlah session tutor sering aktif       
            $data['hasil_tutor']= $this->Admin_model->getCountSessionTutor();

            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/index',$data);
            $this->load->view('template/footer2_admin',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Data_Mahasiswa()
    {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Data Mahasiswa';
            // menampilkan semua data mahasiswa
            $data['mahasiswa'] = $this->Admin_model->getAllMahasiswa();
            $data['tahun_angkatan'] = $this->Admin_model->tahunAngkatan();

            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/Data_Mahasiswa',$data);
            $this->load->view('template/footer2_admin',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Detail_Data_Mahasiswa($id)
    {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Detail Data Mahasiswa';
            // menampilkan data mahasiswa sesuai dengan id_mahasiswa
            $data['mahasiswa'] = $this->Admin_model->detail_mahasiswa($id);

            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/Detail_Mahasiswa',$data);
            $this->load->view('template/footer2_admin',$data);
        } 
        else {
            redirect('Login/logout');
        }
    }

    public function Edit_Data_Mahasiswa($id) {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Edit Data Mahasiswa';
            // get data mahasiswa sesuai dengan id_mahasiswa yang dipilih
            $data['mahasiswa'] = $this->Admin_model->getMahasiswaById($id);

            // perulangan pada form edit mahasiswa
            $data['prodi'] = ['Manajemen Informatika', 'Teknik Informatika'];
            $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

            // form validation untuk memeriksa semua isian form apakah semua isian sudah terisi data
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required');
            $this->form_validation->set_rules('github', 'Github');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_admin',$data);
                $this->load->view('Admin/Edit_Mahasiswa', $data);
                $this->load->view('template/footer2_admin');
            }
            else {
                // menuju ke admin_model edit data mahasiswa sesuai dengan id_mahasiswa yang dipilih
                $this->Admin_model->edit_data_mahasiswa($id);
                echo"<script>alert('Data Mahasiswa Berhasil Diedit!');</script>";
                redirect('Admin/Data_Mahasiswa','refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Tambah_Data_Mahasiswa(){
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Tambah Data Mahasiswa';

            // perulangan pada form edit mahasiswa
            $data['prodi'] = ['Manajemen Informatika', 'Teknik Informatika'];
            $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

            // form validation untuk memeriksa semua isian form apakah semua isian sudah terisi data
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required');
            $this->form_validation->set_rules('github', 'Github');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_admin',$data);
                $this->load->view('Admin/Tambah_Mahasiswa', $data);
                $this->load->view('template/footer2_admin', $data);
            }
            else {
                // menuju ke admin_model tambah data mahasiswa
                $this->Admin_model->tambah_data_mahasiswa();
                echo"<script>alert('Data Mahasiswa Berhasil Ditambahkan!');</script>";
                redirect('Admin/Data_Mahasiswa','refresh');
            }    
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Hapus_Data_Mahasiswa($id) {
        if (isset($_SESSION['id_admin'])) {
            // menuju ke admin_model hapus data mahasiswa sesuai id_mahasiswa
            $this->Admin_model->hapus_data_mahasiswa($id);
            echo"<script>alert('Data Mahasiswa Berhasil Dihapus!');</script>";

            // kembali ke halaman data mahasiswa
            redirect('Admin/Data_Mahasiswa','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }
    public function Hapus_tahun_masuk()
    {                
        $hapus=$this->input->post('tahun_masuk');
        $this->Admin_model->Hapus_tahun_masuk($hapus);
        echo"<script>alert('Data berhasil dihapus!');</script>";
        redirect('Admin/Data_Mahasiswa','refresh');
    }

    public function Data_Tutor()
    {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Data Tutor';
            // menampilkan semua data tutor
            $data['tutor'] = $this->Admin_model->getAllTutor();

            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/Data_Tutor',$data);
            $this->load->view('template/footer2_admin',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Hapus_Data_Tutor($id) {
        if (isset($_SESSION['id_admin'])) {
            // menghapus data tutor sesuai dengan id_tutor
            $this->Admin_model->hapus_data_tutor($id);
            echo"<script>alert('Data Tutor Berhasil Dihapus!');</script>";

            // kembali ke halaman data tutor
            redirect('Admin/Data_Tutor','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Data_Kategori_Materi()
    {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Data Kategori Materi';
            // menampilkan semua data kategori materi
            $data['kategoriMateri'] = $this->Admin_model->getAllKategoriMateri();

            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/Data_Kategori_Materi',$data);
            $this->load->view('template/footer2_admin',$data);
        }
        else {
            redirect('Login/logout');
        }
    }
    
    public function Edit_Data_Kategori_Materi($id) {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Edit Data Kategori Materi';
            // get data kategori materi sesuai dengan id_kategori_materi
            $data['kategoriMateri'] = $this->Admin_model->getKategoriMateriById($id);

            // form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');        

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_admin',$data);
                $this->load->view('Admin/Edit_Kategori_Materi', $data);
                $this->load->view('template/footer2_admin');
            }
            else {
                // menuju admin_model edit data kategori materi sesuai id_kategori_materi
                $this->Admin_model->edit_data_kategori_materi($id);
                echo"<script>alert('Kategori Materi Berhasil Diedit!');</script>";

                // kembali ke halaman data kategori materi
                redirect('Admin/Data_Kategori_Materi','refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Hapus_Data_Kategori_Materi($id) {
        if (isset($_SESSION['id_admin'])) {
            // menuju ke admin_model hapus data kategori materi sesuai id_kategori_materi
            $this->Admin_model->hapus_data_kategori_materi($id);
            echo"<script>alert('Kategori Materi Berhasil Dihapus!');</script>";

            // kembali ke halaman data kategori materi
            redirect('Admin/Data_Kategori_Materi','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Tambah_Kategori_Materi(){
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Tambah Kategori Materi';

            // form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_admin',$data);
                $this->load->view('Admin/Tambah_Kategori_Materi', $data);
                $this->load->view('template/footer2_admin', $data);
            }
            else {
                // menuju admin_model tambah data kategori materi
                $this->Admin_model->tambah_kategori_materi();
                echo"<script>alert('Kategori Materi Berhasil Ditambahkan!');</script>";

                // kembali ke halaman data kategori materi
                redirect('Admin/Data_Kategori_Materi','refresh');
            }    
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Data_Tutor_Belum_Verifikasi()
    {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Data Tutor Belum Terverifikasi';
            // mendapatkan semua data tutor yang belum diterima (status = 1)
            $data['tutor'] = $this->Admin_model->getUnregPendaftaran();

            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/Verifikasi_Tutor',$data);
            $this->load->view('template/footer2_admin',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    // function untuk proses verifikasi tutor sesuai dengan id_tutor yang dipilih
    public function Status_Pendaftaran($id) {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Data Tutor Belum Terverifikasi';
            // mendapatkan semua data tutor yang belum diterima (status = 1)
            $data['unreg'] = $this->Admin_model->getUnregPendaftaran();

            // form validation status untuk pengubahan status tutor
            $this->form_validation->set_rules('status', 'Status', 'required');

            // mengambil input action dari form
            $action = $this->input->post('action');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_admin',$data);
                $this->load->view('Admin/Verifikasi_Tutor',$data);
                $this->load->view('template/footer2_admin',$data);
            }
            else {
                if($action == 'terima') {
                    // menuju admin_model status pendaftaran diterima sesuai dengan id_tutor yang dipilih
                    $this->Admin_model->status_pendaftaran($id);
                    echo"<script>alert('Tutor Berhasil Diterima!');</script>";

                    // kembali ke halaman data tutor
                    redirect('Admin/Data_Tutor', 'refresh');
                }
                if($action == 'tolak') {
                    // menuju admin_model hapus data tutor sesuai dengan id_tutor yang dipilih
                    $this->Admin_model->hapus_data_tutor($id);
                    echo"<script>alert('Tutor Berhasil Ditolak!');</script>";

                    // kembali ke halaman data tutor
                    redirect('Admin/Data_Tutor', 'refresh');
                }
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Data_Kritik_Saran()
    {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Data Kritik Saran';
            // menmbil semua data kritik dan saran
            $data['kritik_saran'] = $this->Admin_model->getAllKritikSaran();

            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/Data_Kritik_Saran',$data);
            $this->load->view('template/footer2_admin',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Hapus_Kritik_Saran($id) {
        if (isset($_SESSION['id_admin'])) {
            // menuju admin model hapus kritik dan saran sesuai id_kritik_saran
            $this->Admin_model->hapus_kritik_saran($id);
            echo"<script>alert('Kritik dan Saran Berhasil Dihapus!');</script>";

            // kembali ke halaman data kritik dan saran
            redirect('Admin/Data_Kritik_Saran','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    // function untuk mengubah password
    public function Profile()
    {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Ubah Password';

            // form validation untuk memeriksa kelengkapan isian form
            $this->form_validation->set_rules('id_admin', 'id_admin', 'required');
            $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
            $this->form_validation->set_rules('password_baru', 'Password Baru', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header2_admin',$data);
                $this->load->view('Admin/Ganti_Password',$data);
                $this->load->view('template/footer2_admin',$data);
            }
            else {
                // query untuk memeriksa apakah password sesuai dengan yang ada di database
                $query = $this->Admin_model->checkPasswordLama($this->input->post('password_lama'));
                if($query){
                    // query untuk mengubah password lama menjadi password baru
                    $query = $this->Admin_model->Update_Password($this->input->post('password_baru'));
                    if($query){
                        echo"<script>alert('Password Berhasil Diubah!');</script>";
                        redirect('Admin/index','refresh');
                    }
                    else{
                        echo"<script>alert('Ubah Password Gagal!');</script>";
                        redirect('Admin/Profile','refresh');
                    }
                }
                else{
                    echo"<script>alert('Password lama yang Anda masukkan tidak sesuai!');</script>";
                    redirect('Admin/Profile','refresh');
                }    
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Forum() {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Forum';
            // mendapatkan semua data forum
            $data['forum'] = $this->Admin_model->getAllForum();

            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/Forum',$data);
            $this->load->view('template/footer2_admin',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Detail_Forum($id) {
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Forum';
            // get data forum sesuai dengan id_forum
            $data['detail_pertanyaan'] = $this->Admin_model->detail_pertanyaan($id);
            // menampilkan jawaban forum sesuai dengan id_forum
            $data['jawaban'] = $this->Admin_model->jawaban($id);
            // memeriksa apakah jawaban forum sedang kosong atau sudah terisi sesuai dengan id_forum
            $data['jawaban_forum'] = $this->Admin_model->Cek_Jawaban($id);

            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/Detail_Forum',$data);
            $this->load->view('template/footer2_admin',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Hapus_Forum($id) {
        if (isset($_SESSION['id_admin'])) {
            // menuju admin_model hapus forum sesuai dengan id_forum
            $this->Admin_model->hapus_forum($id);
            echo"<script>alert('Forum Berhasil Dihapus!');</script>";

            // kembali ke halaman data forum
            redirect('Admin/Forum','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Detail_Data_Tutor($id){
        if (isset($_SESSION['id_admin'])) {
            $data['title'] = 'Detail Tutor';
            // get data tutor sesuai dengan id_tutor yang dipilih
            $data['detail_tutor'] = $this->Admin_model->getTutorById($id);        

            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/Detail_Tutor',$data);
            $this->load->view('template/footer2_admin',$data);
        }
        else {
            redirect('Login/logout');
        }
    }
    public function Create()
    {
        $data['title'] = "Upload File Excel";
            $this->load->view('template/header2_admin',$data);
            $this->load->view('Admin/create', $data);
            $this->load->view('template/footer2_admin',$data);
        
    }

    public function file_check($str){
        $allowed_mime_type_arr = array('xlsx' => ('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'), 'xls' => ('application/vnd.ms-excel'));        
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                // return true;
                if (filesize($_FILES['file']['tmp_name']) > 2097152) {
                    $this->form_validation->set_message('file_check', 'The Image file size shoud not exceed 2 MB!');
                    return false;
                }
            }
            else{
                $this->form_validation->set_message('file_check', 'Please select only xls or xlsx file.');
                return false;
            }
        }
        else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }

    public function excel()
    {                
        $this->form_validation->set_rules('file', '', 'callback_file_check');

        if($this->form_validation->run() == FALSE) {
            $data['title'] = "Upload File Excel";
            $this->load->view('template/header2_admin', $data);
            $this->load->view('Admin/create', $data);
            $this->load->view('template/footer2_admin', $data);
        }
        else {                    
        if(isset($_FILES["file"]["name"])){
                // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size =$_FILES['file']['size'];
            $file_type=$_FILES['file']['type'];                
            
            $object = PHPExcel_IOFactory::load($file_tmp);
    
            foreach($object->getWorksheetIterator() as $worksheet){
    
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
    
                for($row=2; $row<=$highestRow; $row++){
    
                    $nim = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $jenis_kelamin = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $jurusan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $prodi = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $tahun_masuk = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                    $cek_nim=$this->Admin_model->cek_nim($nim);
                    if($cek_nim->num_rows() > 0){
                        $message = array(
                            'message'=>'<div class="alert alert-danger">Ups.. Sepertinya ada NIM yang sudah terdaftar</div>',
                        );
            
                        $this->session->set_flashdata($message);
                        redirect('Admin/data_mahasiswa');
                    }

                    $data[] = array(
                        'nim'               => $nim,
                        'nama'              =>$nama,
                        'jenis_kelamin'     =>$jenis_kelamin,
                        'jurusan'           =>$jurusan,
                        'prodi'             =>$prodi,
                        'tahun_masuk'       =>$tahun_masuk,
                    );                   
                } 
            }            
    
            $this->db->insert_batch('mahasiswa', $data);
    
            $message = array(
                'message'=>'<div class="alert alert-success">Import File Berhasil</div>',
            );

            $this->session->set_flashdata($message);
            redirect('Admin/data_mahasiswa');
        }
        else
        {
            $message = array(
                'message'=>'<div class="alert alert-danger">Import File Gagal</div>',
            );

            $this->session->set_flashdata($message);
            redirect('Admin/data_mahasiswa');
        }
    }
    }
}