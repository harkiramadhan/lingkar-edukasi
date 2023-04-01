<?php 
class Profil extends CI_Controller{

  function index(){
    $this->load->view('layout/user/header');
    $this->load->view('user/profil');
    $this->load->view('layout/user/footer');
  }

}   