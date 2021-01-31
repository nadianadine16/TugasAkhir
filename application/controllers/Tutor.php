<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tutor extends CI_Controller {
    public function index()
    {
        $data['title'] = 'Dashboard Tutor';
        $this->load->view('template/header_tutor',$data);
        $this->load->view('template/footer_tutor',$data);
    }
}