<?php 
class Course extends CI_Controller{

  function index(){
    $this->load->view('layout/tutor/header');
    $this->load->view('tutor/course-verifikasi');
    $this->load->view('layout/tutor/footer');
  }
}   