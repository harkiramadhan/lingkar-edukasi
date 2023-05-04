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

  function action(){
    $this->db->where('id', $this->session->userdata('user_id'))->update('user', [
      'name' => $this->input->post('name', TRUE),
      'nohp' => $this->input->post('nohp', TRUE),
      'email' => $this->input->post('email', TRUE),
      'jenkel' => $this->input->post('jenkel', TRUE),
      'pendidikan' => $this->input->post('pendidikan', TRUE),
      'tgll' => $this->input->post('tgll', TRUE),
    ]);
    if($this->db->affected_rows() > 0){
      $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
    }else{
      $this->session->set_flashdata('error', "Data Gagal Di Simpan");
    }

    
    redirect($_SERVER['HTTP_REFERER']);
  }

}   