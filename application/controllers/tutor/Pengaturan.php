<?php
class Pengaturan extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('is_tutor')){
            redirect('tutor','refresh');
        }
    }

    function index(){
        $this->load->view('layout/tutor/header', $var);
        $this->load->view('tutor/pengaturan', $var);
        $this->load->view('layout/tutor/footer', $var);
    }
}