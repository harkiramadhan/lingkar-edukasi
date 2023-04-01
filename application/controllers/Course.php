<?php 
class Course extends CI_Controller{

  function index(){
    $this->load->view('layout/user/header');
    $this->load->view('user/course-list');
    $this->load->view('layout/user/footer');
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
}   