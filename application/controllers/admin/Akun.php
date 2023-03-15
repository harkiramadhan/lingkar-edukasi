<?php 
class Akun extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('admin') != TRUE) 
            redirect('admin','refresh');
    }

    function index(){

        $this->load->view('layout/admin/header');
        $this->load->view('admin/akun');
        $this->load->view('layout/admin/footer');

    }
}   
