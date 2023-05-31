<?php 
class Review extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->model([
        'M_Users',
        'M_Courses',
        'M_Settings',
        'M_Labels',
        // 'M_Benefit_Landing',
        // 'M_Testimoni_Landing',
        // 'M_Banners',
        // 'M_Partner'
      ]);
    }

  function index($flag){
    $userid = $this->session->userdata('user_id');
    $course = $this->M_Courses->getByFlag($flag);

    $var = [
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid),
      'course' => $course
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/kelassaya-review', $var);
    $this->load->view('layout/user/footer', $var);
  }
}