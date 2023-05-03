<?php 
class Profil extends CI_Controller{
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

    if(!$this->session->userdata('is_user')){
      redirect('','refresh');
    }
  }

  function index(){
    $userid = $this->session->userdata('user_id');

    $var = [
      'setting' => $this->M_Settings->get(),
      'labels' => $this->M_Labels->getActive(),
      'user' => $this->M_Users->getById($userid)
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/profil', $var);
    $this->load->view('layout/user/footer', $var);
  }

}   