<?php 
class Overview extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    if($this->session->userdata('is_admin') != TRUE) 
      redirect('admin','refresh');
  }

  function index(){
    $this->load->view('layout/admin/header');
    $this->load->view('admin/overview');
    $this->load->view('layout/admin/footer');
  }
}   