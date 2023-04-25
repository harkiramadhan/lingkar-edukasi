<?php 
class Course extends CI_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model([
      'M_Users'
    ]);

    if(!$this->session->userdata('is_user')){
      redirect('','refresh');
    }
  }

  function index(){
    $userid = $this->session->userdata('user_id');
    $var = [
      'user' => $this->M_Users->getById($userid)
    ];
    $this->load->view('layout/user/header', $var);
    $this->load->view('user/course-list', $var);
    $this->load->view('layout/user/footer', $var);
  }

  function detail(){
    $this->load->view('layout/user/header');
    $this->load->view('user/course-detail');
    $this->load->view('layout/user/footer');
  }

  function joined(){
    $this->load->view('layout/user/header');
    $this->load->view('user/thanks-for-join');
    $this->load->view('layout/user/footer');
  }

  function kelassaya(){
    $this->load->view('layout/user/header');
    $this->load->view('user/kelassaya-list');
    $this->load->view('layout/user/footer');
  }

  function kelassayacourse(){
    $this->load->view('layout/user/header');
    $this->load->view('user/kelassaya-detail-course');
    $this->load->view('layout/user/footer');
  }

  function kelassayaselesai(){
    $this->load->view('layout/user/header');
    $this->load->view('user/kelassaya-selesai');
    $this->load->view('layout/user/footer');
  }

}   