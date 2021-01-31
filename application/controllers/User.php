<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function index()
    {
        $this->load->view('template/header_user');
        $this->load->view('template/footer_user');
    }
}