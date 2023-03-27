<?php 
class Transaksi extends CI_Controller{
    function __construct(){
        parent::__construct();
        
        if($this->session->userdata('is_admin') != TRUE) 
            redirect('admin','refresh');
    }

    function index(){

        $this->load->view('layout/admin/header');
        $this->load->view('admin/transaksi');
        $this->load->view('layout/admin/footer');

    }
}   
