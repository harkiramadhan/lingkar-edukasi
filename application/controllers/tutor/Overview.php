<?php 
class Overview extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->model([
      'M_Tutor'
    ]);

    if($this->session->userdata('is_tutor') != TRUE) 
      redirect('tutor','refresh');
  }

  function index(){
    $userid = $this->session->userdata('userid');

    $var = [
      'user' => $this->M_Tutor->getById($userid)
    ];
    
    $this->load->view('layout/tutor/header', $var);
    $this->load->view('tutor/overview', $var);
    $this->load->view('layout/tutor/footer', $var);
  }
}   