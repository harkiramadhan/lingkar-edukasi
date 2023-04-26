<?php 
class Pengaturan extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Users'
        ]);

        if($this->session->userdata('is_admin') != TRUE){
            redirect('admin','refresh');
        }
    }

    function index(){
        $var = [
            'users' => $this->M_Users->getAll(),
        ];

        $this->load->view('layout/admin/header', $var);
        $this->load->view('admin/pengaturan', $var);
        $this->load->view('layout/admin/footer', $var);
    }
}   
