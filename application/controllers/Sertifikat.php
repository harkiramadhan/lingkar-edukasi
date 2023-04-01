<?php 
class Sertifikat extends CI_Controller{

  function index(){
    $this->load->view('layout/user/header');
    $this->load->view('user/cek-sertifikat');
    $this->load->view('layout/user/footer');
  }
}   