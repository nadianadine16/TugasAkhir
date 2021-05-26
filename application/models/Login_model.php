<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function login_tutor($username, $password) {
        $query=$this->db->query("SELECT * FROM tutor t JOIN mahasiswa m on t.id_mahasiswa = m.id_mahasiswa where m.nim = '$username' and m.nim = '$password' and t.status = '2' LIMIT 1 ");
		return $query;
    }
    public function login_mahasiswa($username, $password) {
        $query=$this->db->query("SELECT * FROM mahasiswa WHERE nim='$username' AND nim='$password' LIMIT 1");
        return $query;        
    }
    public function login_admin($username, $password) {
        $query=$this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1");
        return $query;
    }
}
?>