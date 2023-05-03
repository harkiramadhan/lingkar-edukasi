<?php 
class Course extends CI_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model([
      'M_Users',
      'M_Courses',
      'M_Settings',
      'M_Labels',
      'M_Benefit_Landing',
      'M_Testimoni_Landing',
      'M_Banners',
      'M_Partner'
    ]);

    // if(!$this->session->userdata('is_user')){
    //   redirect('','refresh');
    // }
  }

  function index(){
    $userid = $this->session->userdata('user_id');
    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid),
    ];
    $this->load->view('layout/user/header', $var);
    $this->load->view('user/course-list', $var);
    $this->load->view('layout/user/footer', $var);
  }

  function detail($flag){
    $userid = $this->session->userdata('user_id');
    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid),
      'course' => $this->M_Courses->getByFlag($flag),
      'title' => $this->M_Courses->getByFlag($flag)->judul
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/course-detail', $var);
    $this->load->view('layout/user/footer', $var);
  }

  function joined(){
    $userid = $this->session->userdata('user_id');
    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid)
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/thanks-for-join', $var);
    $this->load->view('layout/user/footer', $var);
  }

  function kelassaya(){
    $userid = $this->session->userdata('user_id');
    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid)
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/kelassaya-list', $var);
    $this->load->view('layout/user/footer', $var);
  }

  function kelassayacourse(){
    $userid = $this->session->userdata('user_id');
    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid)
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/kelassaya-detail-course', $var);
    $this->load->view('layout/user/footer', $var);
  }

  function kelassayaselesai(){
    $userid = $this->session->userdata('user_id');
    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid)
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/kelassaya-selesai', $var);
    $this->load->view('layout/user/footer', $var);
  }

}   