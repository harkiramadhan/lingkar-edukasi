<?php 
class Overview extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    if($this->session->userdata('is_tutor') != TRUE) 
      redirect('tutor','refresh');
  }

  function index(){
    $this->load->view('layout/tutor/header');
    $this->load->view('tutor/overview');
    $this->load->view('layout/tutor/footer');
  }
}   