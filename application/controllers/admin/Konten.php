<?php 
class Konten extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    if($this->session->userdata('is_admin') != TRUE) 
      redirect('admin','refresh');
  }

  function landing(){
    $this->load->view('layout/admin/header');
    $this->load->view('admin/konten-landing');
    $this->load->view('layout/admin/footer');
  }

  function header(){
    $this->load->view('layout/admin/header');
    $this->load->view('admin/konten-header');
    $this->load->view('layout/admin/footer');
  }
}   