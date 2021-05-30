<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    // function login tutor
    public function login_tutor($username, $password) {
        $query=$this->db->query("SELECT * FROM tutor t JOIN mahasiswa m on t.id_mahasiswa = m.id_mahasiswa where m.nim = '$username' and m.nim = '$password' LIMIT 1 ");
		return $query;
    }

    // function login mahasiswa
    public function login_mahasiswa($username, $password) {
        $query=$this->db->query("SELECT * FROM mahasiswa WHERE nim='$username' AND nim='$password' LIMIT 1");
        return $query;        
    }

    // function login admin
    public function login_admin($username, $password) {
        $query=$this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1");
        return $query;
    }

    // function menambah session mahasiswa ketika login
    public function tambah_session_mahasiswa(){
        $this->id_hitung = uniqid();
        $id_mahasiswa = $this->session->userdata('id_mahasiswa');
        date_default_timezone_set('Asia/Jakarta');

        $data = [                        
            "id_mahasiswa" => $id_mahasiswa,
            "log_in_time" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('session_mahasiswa_tutor', $data);
        $hasil_session = $this->db->insert_id();
        $hasil_mahasiswa = $this->db->get_where('session_mahasiswa_tutor', array('id_hitung' => $hasil_session));
        return $hasil_mahasiswa->row_array();
    }

    // mengupdate session mahasiswa ketika logout
    public function edit_session_mahasiswa() {        
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'log_out_time' => date('Y-m-d H:i:s', time()),
        );

        $id_hitung = $this->session->userdata('id_hitung');
        $this->db->where('id_hitung', $id_hitung);
        $this->db->update('session_mahasiswa_tutor' ,$data);
        return $this->db->affected_rows();        
    }

    // menambah session tutor ketika login
    public function tambah_session_tutor(){
        $this->id_hitung = uniqid();
        $id_tutor = $this->session->userdata('id_tutor');
        date_default_timezone_set('Asia/Jakarta');

        $data = [                        
            "id_tutor" => $id_tutor,
            "log_in_time" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('session_mahasiswa_tutor', $data);
        $hasil_session = $this->db->insert_id();
        $hasil_tutor = $this->db->get_where('session_mahasiswa_tutor', array('id_hitung' => $hasil_session));
        return $hasil_tutor->row_array();
    }

    // mengupdate session tutor ketika logout
    public function edit_session_tutor() {        
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'log_out_time' => date('Y-m-d H:i:s', time()),
        );
        
        $id_hitung = $this->session->userdata('id_hitung');
        $this->db->where('id_hitung', $id_hitung);
        $this->db->update('session_mahasiswa_tutor' ,$data);
        return $this->db->affected_rows();        
    }
}
?>