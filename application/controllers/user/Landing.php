<?php 
class Landing extends CI_Controller{

  function index(){
    $this->load->view('layout/user/header');
    $this->load->view('user/landing');
    $this->load->view('layout/user/footer');
  }
}   