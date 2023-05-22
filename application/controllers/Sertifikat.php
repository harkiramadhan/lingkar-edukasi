<?php 
class Sertifikat extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model([
      'M_Settings',
      'M_Labels',
      'M_Courses',
      'M_Users'
    ]);
  }

  function index(){
    $userid = $this->session->userdata('user_id');
    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid),
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/cek-sertifikat', $var);
    $this->load->view('layout/user/footer', $var);
  }

  function info($flag){
    // $userid = $this->session->userdata('user_id');
    // $course = $this->M_Courses->getByFlag($flag);

    // $dataInsert = [
    //   ''
    // ]
  }
}   