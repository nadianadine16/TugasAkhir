<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function tambah_kritik(){
        $this->id_kritiksaran=uniqid();
        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "subject" => $this->input->post('subject', true),
            "kritik_saran" => $this->input->post('kritik_saran', true),
        ];
        $this->db->insert('kritik_saran', $data);
    }
}
?>