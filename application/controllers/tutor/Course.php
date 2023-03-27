<?php 
class Course extends CI_Controller{
  function __construct(){
    parent::__construct();


    if(!$this->session->userdata('is_tutor'))
      redirect('tutor','refresh');
  }

  function index(){
    $this->load->view('layout/tutor/header');
    $this->load->view('tutor/course-verifikasi');
    $this->load->view('layout/tutor/footer');
  }
}   