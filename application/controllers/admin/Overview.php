<?php 
class Overview extends CI_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model([
      'M_Courses',
      'M_Users',
      'M_Tutor',
    ]);
    
    if($this->session->userdata('is_admin') != TRUE){
      redirect('admin','refresh');
    }
  }

  function index(){
    $var = [
      'peserta' => $this->M_Users->getAll(),
      'courses' => $this->M_Courses->getAll(),
      'tutor' => $this->M_Tutor->getAll(),
      'news' => $this->M_Courses->getActive(10)
    ];

    $this->load->view('layout/admin/header', $var);
    $this->load->view('admin/overview', $var);
    $this->load->view('layout/admin/footer', $var);
  }
}   