<?php 
class Pendaftaran extends CI_Controller{

  function index(){
    $this->load->view('layout/tutor/header-before');
    $this->load->view('tutor/pendaftaran');
    $this->load->view('layout/tutor/footer');
  }
}   