<?php 
class Sertifikat extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model([
      'M_Settings',
      'M_Labels'
    ]);
  }

  function index(){
    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get()
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/cek-sertifikat', $var);
    $this->load->view('layout/user/footer', $var);
  }
}   