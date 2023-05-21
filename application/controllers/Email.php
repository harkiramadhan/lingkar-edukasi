<?php 
class Email extends CI_Controller{
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

    $this->load->view('user/email/email-daftar');
  }

  function pembeliankelas(){
    $this->load->view('user/email/email-beli-kelas');
  }

  function kelasselesai(){
    $this->load->view('user/email/email-kelas-selesai');
  }

  function updatepassword(){
    $this->load->view('user/email/email-password-reset');
  }

}   