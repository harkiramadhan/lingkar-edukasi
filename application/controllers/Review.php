<?php 
class Review extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->model([
        'M_Users',
        'M_Courses',
        'M_Settings',
        'M_Labels'
      ]);
    }

  function index($flag){
    $userid = $this->session->userdata('user_id');
    $course = $this->M_Courses->getByFlag($flag);

    $var = [
      'title' => 'Review Kelas ' . $course->judul,
      'labels' => $this->M_Labels->getActive(),
      'setting' => $this->M_Settings->get(),
      'user' => $this->M_Users->getById($userid),
      'course' => $course,
      'cekReview' => $this->db->get_where('review', [
        'userid' => $this->session->userdata('user_id'),
        'courseid' => $course->id
      ])
    ];

    $this->load->view('layout/user/header', $var);
    $this->load->view('user/kelassaya-review', $var);
    $this->load->view('layout/user/footer', $var);
  }

  function action(){
    $cekReview = $this->db->get_where('review', [
      'courseid' => $this->input->post('courseid', TRUE),
      'userid' => $this->session->userdata('user_id', TRUE),
    ]);

    if($cekReview->num_rows() > 0){
      $this->db->where('id', $cekReview->row()->id)->update('review', [
        'rating' => $this->input->post('rating', TRUE),
        'review' => $this->input->post('review', TRUE)
      ]);

      if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('success', "Penilaian Berhasil Di Simpan");
      }else{
        $this->session->set_flashdata('error', "Penilaian Gagal Di Simpan");
      }
    }else{
      $this->db->insert('review', [
        'courseid' => $this->input->post('courseid', TRUE),
        'userid' => $this->session->userdata('user_id', TRUE),
        'rating' => $this->input->post('rating', TRUE),
        'review' => $this->input->post('review', TRUE)
      ]);

      if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('success', "Penilaian Berhasil Di Simpan");
      }else{
        $this->session->set_flashdata('error', "Penilaian Gagal Di Simpan");
      }
    }

    redirect('kelas','refresh');
  }
}