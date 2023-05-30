<?php 
class Overview extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->model([
      'M_Courses',
      'M_Users',
      'M_Tutor',
      'M_Transaksi',
      'M_Enrollment'
    ]);

    if($this->session->userdata('is_tutor') != TRUE) 
      redirect('tutor','refresh');
  }

  function index(){
    $userid = $this->session->userdata('userid');
    $var = [
      'user' => $this->M_Tutor->getById($userid),
      'course' => $this->M_Courses->getAll($userid),
      'tutor' => $this->M_Tutor->getAll(),
      'news' => $this->M_Courses->getActive(10),
      'trx_day' => $this->M_Transaksi->getByDate(date('Y-m-d'), $userid),
      'trx_week' => $this->M_Transaksi->getByWeek(date('W'), $userid),
      'trx_month' => $this->M_Transaksi->getByMonth(date('m'), $userid),
    ];
    
    $this->load->view('layout/tutor/header', $var);
    $this->load->view('tutor/overview', $var);
    $this->load->view('layout/tutor/footer', $var);
  }
}   