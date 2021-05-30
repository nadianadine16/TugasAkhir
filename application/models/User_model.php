<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function tambah_kritik() { //function untuk mengirim kritik dan saran
        $this->id_kritiksaran=uniqid();
        
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "subject" => $this->input->post('subject', true),
            "kritik_saran" => $this->input->post('kritik_saran', true)
        ];

        $this->db->insert('kritik_saran', $data);
    }

    public function edit_profile() { //function untuk mengupdate data mahasiswa
        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "nim" => $this->input->post('nim', true),
            "nama" => $this->input->post('nama', true),
            "jurusan" => $this->input->post('jurusan', true),
            "prodi" => $this->input->post('prodi', true),
            "kelas" => $this->input->post('kelas', true),
            "tahun_masuk" => $this->input->post('tahun_masuk', true),
            "github" => $this->input->post('github', true),
        ];

        $this->db->where('id_mahasiswa', $data['id_mahasiswa']);
        $this->db->update('mahasiswa', $data);
    }

    public function getAllKategoriMateri() { //function untuk mendapatkan semua data kategori materi
        $this->db->select('*');
        $this->db->from('kategori_materi');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function daftar_tutor($limit, $start) { //function untuk menampilkan semua daftar tutor per page
        $status= '2';
        
        $this->db->select('*');
        $this->db->from('tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');
        $this->db->join('kategori_materi', 'kategori_materi.id_kategori_materi = tutor.id_kategori_materi');
        $this->db->where('status', $status);
        $this->db->limit($limit,$start);

        $query = $this->db->get();
        return $query->result_array();
    }

    //SEMENTARA BUAT HASIL CARI TUTOR BLM ADA PAGINATION
    public function daftar_tutor2() { //function untuk menampilkan semua daftar tutor
        $status= '2';
        
        $this->db->select('*');
        $this->db->from('tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');
        $this->db->join('kategori_materi', 'kategori_materi.id_kategori_materi = tutor.id_kategori_materi');
        $this->db->where('status', $status);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function Cari_Tutor($kategori, $keyword) { //function untukmenampilkan hasil pencarian tutor sesuai dengan kategori dan nama tutor
        $kategori=$this->input->post('id_kategori_materi'); //menambil inputan kategori
        $keyword=$this->input->post('keyword'); //mengambil keyword

        $this->db->select('*');
        $this->db->from('tutor');
        $this->db->join('kategori_materi', 'tutor.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');            
        $this->db->like('tutor.id_kategori_materi', $kategori); 
        $this->db->like('mahasiswa.nama', $keyword);         

        $query = $this->db->get();
        return $query->result_array();
    }

    public function tutor($limit, $start) { //function untuk menampilkan daftar nama tutor per page
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('tutor', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');  
        $this->db->join('kategori_materi', 'kategori_materi.id_kategori_materi = tutor.id_kategori_materi');
        $this->db->limit($limit,$start);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cari_tutor_chat($keyword2) { //function untuk menampilkan daftar tutor yg dicari pada halaman chat
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('tutor', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');         
        $this->db->join('kategori_materi', 'kategori_materi.id_kategori_materi = tutor.id_kategori_materi');                       
        $this->db->like('mahasiswa.nama',$keyword2);
        $this->db->or_like('kategori_materi.nama_kategori',$keyword2);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function hitung_tutor() { //function untuk memnghitung jumlah tutor
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('tutor', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');                        
        
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function namaTujuan($send_to) { //function untuk menampilkan nama mahasiswa penerima pesan
        $this->db->select('nama');
        $this->db->from('mahasiswa');
        $this->db->where('id_mahasiswa', $send_to);

        $query = $this->db->get();
        return $query->result_array();        
    }

    public function Cek_Jawaban($id_forum) { //function untuk memeriksa jawaban forum apakah kosong/sudah terisi data
        $this->db->select('*');
        $this->db->from('chat_forum');
        $this->db->join('forum', 'forum.id_forum = chat_forum.id_forum');
        $this->db->where('chat_forum.id_forum', $id_forum);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function daftar_materi($id) { //function untuk menampilkan materi sesuai dengan id_kategori_materi
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');        
        $this->db->where('kategori_materi.id_kategori_materi', $id);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cari_materi($id_kategori_materi) { //function untuk menampilkan pencarian materi sesuai keyword
        $keyword = $this->input->post('keyword'); //mengambil inputan keyword materi

        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');        
        $this->db->like('materi.nama_materi', $keyword);  
        $this->db->where ('kategori_materi.id_kategori_materi', $id_kategori_materi);  

        $query = $this->db->get();
        return $query->result_array();
    }

    public function daftar_materi_byKategori($id) { //function untuk menampilkan materi sesuai dengan kategori materi yg dipilih
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');        
        $this->db->where('kategori_materi.id_kategori_materi', $id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function Konten($id) { //function untuk menampilkan daftar konten sesuai dengan id_materi yg dipilih
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->join('materi', 'materi.id_materi = konten.id_materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');
        $this->db->where('materi.id_materi', $id);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMateriByIdMateri($id_materi) { //function untuk menampilkan materi sesuai dengan id_materi yg dipilih
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'tutor.id_tutor = materi.id_tutor');
        $this->db->join('mahasiswa', 'tutor.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->db->where('materi.id_materi', $id_materi);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail_konten($id) { //function untuk menampilkan detail_konten sesuai dengan id_konten yg dipilih
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->join('materi', 'materi.id_materi = konten.id_materi');
        $this->db->join('kategori_materi', 'materi.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('tutor', 'materi.id_tutor = tutor.id_tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');
        $this->db->where('konten.id_konten', $id);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function tampil_tugas($id) { //function untuk menampilkan tugas sesuai dengan id_konten dan id_mhs 
        $id_mhs = $this->session->userdata('id_mahasiswa'); //menyimpan session id_mahasiswa

        $query = $this->db->query("SELECT * FROM TUGAS JOIN mahasiswa ON mahasiswa.id_mahasiswa = tugas.id_mahasiswa
        JOIN konten ON tugas.id_konten = konten.id_konten where konten.id_konten = '$id' AND tugas.id_mahasiswa = '$id_mhs'"); 

        return $query->result_array();
    }

    public function cek_tugas($id) { //function untuk memeriksa apakah tugas di konten (sesuai id_konten) masih kosong/sudah terisi
        $id_mhs = $this->session->userdata('id_mahasiswa'); //menyimpan session id_mahasiswa

        $query = $this->db->query("SELECT * FROM TUGAS JOIN mahasiswa ON mahasiswa.id_mahasiswa = tugas.id_mahasiswa
        JOIN konten ON tugas.id_konten = konten.id_konten where konten.id_konten = '$id' AND tugas.id_mahasiswa = '$id_mhs'");

        return $query;
    }

    public function tambah_tugas() { //function untuk menambah tugas mhs
        $this->id_tugas = uniqid();

        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "id_konten" => $this->input->post('id_konten', true),
            "tugas" => $this->input->post('tugas', true)
        ];

        $this->db->insert('tugas', $data);
    }

    public function revisi_tugas($id_tugas) { //function untuk mengupdate tugas menjadi revisi
        $data = [
            "id_tugas" => $this->input->post('id_tugas', true),
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "id_konten" => $this->input->post('id_konten', true),
            "tugas" => $this->input->post('tugas', true),
            "status" => $this->input->post('status', true),
            "revisi" => NULL
        ];

        $this->db->where('id_tugas', $data['id_tugas']);
        $this->db->update('tugas', $data);
    }

    public function Tanya_Forum() { //function untuk bertanya pada forum
        $this->id_forum = uniqid();
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "id_kategori_materi" => $this->input->post('id_kategori_materi', true),
            "pertanyaan" => $this->input->post('pertanyaan', true),
            "created_at" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('forum', $data);
    }

    public function getAllForum($limit, $start) { //function untuk menampilkan forum per page
        $this->db->select('*');
        $this->db->from('forum');
        $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');    
        $this->db->limit($limit,$start);
        $this->db->order_by('forum.created_at', 'DESC');
                
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllForum_cari() { //function untuk menampilkan forum per page
        $this->db->select('*');
        $this->db->from('forum');
        $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');    
        $this->db->order_by('forum.created_at', 'DESC');
                
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail_pertanyaan($id_forum) { //function untuk menampilkan detail forum sesuai id_forum
        $this->db->select('*');
        $this->db->from('forum');
        $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->join('mahasiswa', 'forum.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->db->where('forum.id_forum', $id_forum);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Jawab_Forum($id) { //function untuk menjawab forum sesuai dengan id_forum yg dipilih
        $this->id_chat_forum = uniqid();
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            "id_forum" => $this->input->post('id_forum', $id),
            "id_user" => $this->input->post('id_user', true),
            "chat" => $this->input->post('chat', true),
            "created_at" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('chat_forum', $data);
    }

    public function Jawab_Private_Chat($id_mahasiswa, $id_tutor) { //function untuk membalas chat; $id_mahasiswa = from; $id_tutor = to;
        $this->id_pesan = uniqid();
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', $id_mahasiswa),
            "id_tutor" => $this->input->post('id_tutor', $id_tutor),
            "isi_pesan" => $this->input->post('isi_pesan', true),
            "time" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('private_chat', $data);
    }

    public function detailTutor($id) { //function untuk menampilkan data tutor sesuai dengan id_tutor
        $this->db->select('*');
        $this->db->from('tutor');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = tutor.id_mahasiswa');                        
        $this->db->join('kategori_materi', 'kategori_materi.id_kategori_materi = tutor.id_kategori_materi');        
        $this->db->where('tutor.id_tutor', $id);

        $query = $this->db->get();
        return $query->result_array();                        
    }

    public function Daftar_Materi_by_tutor($id_tutor) { //function untuk menampilkan daftar materi sesuai dgn id_tutor
        $this->db->select('*');
        $this->db->from('materi');     
        $this->db->where('id_tutor', $id_tutor);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function Detail_Akun($id_mahasiswa) { //function untuk menampilkan data mhs yg sedang login untuk profil
        $this->db->select('*');
        $this->db->from('mahasiswa');       
        $this->db->where('id_mahasiswa', $id_mahasiswa);

        $query = $this->db->get();
        return $query->result_array();                        
    }

    public function Forum_yang_dibuat($id_mahasiswa) { //function untuk menampilkan forum yg dibuat oleh mhs yg sedang login
        $this->db->select('*');
        $this->db->from('forum');
        $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
        $this->db->where('id_mahasiswa', $id_mahasiswa);     

        $query = $this->db->get();
        return $query->result_array();
    }

    public function Tugas_Mahasiswa($id_mahasiswa) { //function untuk menampilkan tugas yg telah dikerjakan oleh mhs yg sedang login
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('konten', 'tugas.id_konten = konten.id_konten');       
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->order_by('tugas', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function Rev($id_mahasiswa, $id_konten) { //function untuk menampilkan revisi tugas mh sesuai dgn id_konten dan id_mhs 
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('konten', 'tugas.id_konten = konten.id_konten');       
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->where('tugas.id_konten', $id_konten);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function cek($id_konten) { //function untuk memeriksa apakah tugas kosong/sudah terisi
        $this->db->select('*');
        $this->db->from('tugas');     
        $this->db->where('id_konten', $id_konten);
        $this->db->where('id_mahasiswa', $this->session->userdata('id_mahasiswa'));

        $query = $this->db->get();
        return $query->result_array();
    }

    public function jawaban($id) { //function untuk menampilkan jawaban forum sesuai dengan id_forum
        $this->db->select('*');
        $this->db->from('chat_forum');
        $this->db->join('mahasiswa', 'chat_forum.id_user = mahasiswa.id_mahasiswa');
        $this->db->join('forum', 'forum.id_forum = chat_forum.id_forum');
        $this->db->where('forum.id_forum', $id);
        $this->db->order_by('chat_forum.created_at','ASC');

        $query = $this->db->get();
        return $query->result_array();
    } 

    public function pesan_private_chat($id, $pengirim) { //function untuk menampilkan chat antara tutor dan mhs
        $condition= "`send_to`= '$id' AND `send_by` = '$pengirim' OR `send_to`= '$pengirim' AND `send_by` = '$id'";

        $this->db->select('*');
        $this->db->from('private_chat');    
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = private_chat.send_to');
        
        $this->db->where($condition);        
        $query = $this->db->get();
        return $query->result_array();                        
    }             

    public function search($kategori, $keyword) { //function untuk melakukan pencarian forum
        $keyword = $this->input->post('keyword'); //mengambil inputan keyword
        $kategori = $this->input->post('id_kategori_materi');

        $this->db->select('*');
            $this->db->from('forum');
            $this->db->join('kategori_materi', 'forum.id_kategori_materi = kategori_materi.id_kategori_materi');
            $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = forum.id_mahasiswa');            
            $this->db->like('forum.id_kategori_materi', $kategori); 
            $this->db->like('forum.pertanyaan', $keyword);        
            $this->db->order_by('forum.created_at', 'DESC'); 

        $query = $this->db->get();
        return $query->result_array();
    }

    public function jumlah_tutor() { //function untuk menghitung jumlah data tutor
        return $this->db->count_all('tutor');
    }

    public function jumlah_materi() { //function untuk menghitung jumlah data materi
    return $this->db->count_all('materi');
    }

    public function jumlah_kategori() { //function untuk menghitung jumlah data kategori maeri
    return $this->db->count_all('kategori_materi');
    }

    public function jumlah_konten() { //function untuk menghitung jumlah konten
    return $this->db->count_all('konten');
    }

    public function cek_forum() { //function untuk memeriksa apakah forum masih kosong/sudah terisi
        $this->db->select('*');
        $this->db->from('forum');
                
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCountTugas($id) { //function untuk menghitung jumlah tugas di setiap konten
        $id_mahasiswa = $this->session->userdata('id_mahasiswa'); //menyimpan session id_mahasiswa

        $query = $this->db->query("SELECT COUNT(id_tugas) AS total FROM tugas INNER JOIN konten ON tugas.id_konten=konten.id_konten INNER JOIN materi ON konten.id_materi=materi.id_materi WHERE materi.id_materi='$id' AND tugas.id_mahasiswa='$id_mahasiswa' AND status='Disetujui'");

        $hasil = $query->row();
        return $hasil->total;
    }    

    public function notif_chat() { //function untuk menampilkan notifikasi pesan masuk
        $id_mahasiswa = $this->session->userdata('id_mahasiswa'); //menyimpan session id_mahasiswa

        $query = $this->db->query("SELECT *
        FROM private_chat
        JOIN mahasiswa 
        ON mahasiswa.id_mahasiswa = private_chat.from
        WHERE private_chat.to = '$id_mahasiswa' AND private_chat.status_chat = 1
        ORDER BY private_chat.created_at DESC");

        return $query->result_array();
        
    }

    public function change_status_chat($from) { //function untuk mengupdate status pesan chat menjadi sudah dibaca => 2
        $this->db->query("UPDATE private_chat
        SET status_chat = 2
        WHERE id_pesan IN (SELECT id_pesan from (select*from private_chat) as p where (p.from = $from))");        
    }

    public function hitung_chat() { //function untuk menghitung chat yang belum dibaca
        $idmhs = $this->session->userdata('id_mahasiswa'); //menyimpan session id_mahasiswa

        $query = $this->db->query("SELECT COUNT(private_chat.from) AS total from private_chat WHERE private_chat.to = '$idmhs' AND private_chat.status_chat=1");     

        if ($query->num_rows() > 0 )
        {
          $row = $query->row();
          return $row->total;
        }
        return 0;      
    }

    public function notif_jawaban_baru() { //function untuk menampilkan jawaban forum terbaru
        $id_mahasiswa = $this->session->userdata('id_mahasiswa'); //menyimpan session id_mahasiswa

        $query = $this->db->query("SELECT * FROM chat_forum AS cf JOIN mahasiswa AS m ON m.id_mahasiswa = cf.id_user JOIN forum AS f ON cf.id_forum = f.id_forum WHERE f.id_mahasiswa = $id_mahasiswa AND cf.status = 1 ORDER BY cf.created_at DESC");

        return $query->result_array();
    }

    public function change_status_jawaban($id_chat_forum) { //function untuk mengupdate jawaban forum menjadi sudah terbaca => 2
        $this->db->query("UPDATE chat_forum SET status = 2 WHERE id_chat_forum = $id_chat_forum");
    }

    public function hitung_jawaban_baru() { //function untuk menghitung jawaban forum baru yg masih belum terbaca
        $id_mahasiswa = $this->session->userdata('id_mahasiswa');

        $query = $this->db->query("SELECT COUNT(chat) AS total FROM chat_forum JOIN forum ON 
        forum.id_forum = chat_forum.id_forum WHERE status = 1 AND forum.id_mahasiswa = $id_mahasiswa");

        if ($query->num_rows() > 0 )
        {
          $row = $query->row();
          return $row->total;
        }
        return 0; 
    }
}
?>