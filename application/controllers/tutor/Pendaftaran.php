<?php 
class Pendaftaran extends CI_Controller{

  function index(){
    $this->load->view('layout/tutor/header-before');
    $this->load->view('tutor/pendaftaran');
    $this->load->view('layout/tutor/footer');
  }

  function submit(){
    if(!$this->input->post('is_robot', TRUE)){
      $cek = $this->db->get_where('tutor', ['email' => $this->input->post('email', TRUE)]);
      if($cek->num_rows() > 0){
        $this->session->set_flashdata('error', "Data Gagal Di Simpan, Email Telah Di Gunakan");
        redirect($_SERVER['HTTP_REFERER']);
      }else{
        $dataInsert = [
          'nama' => $this->input->post('nama', TRUE),
          'nohp' => $this->input->post('nohp', TRUE),
          'email' => $this->input->post('email', TRUE),
          'password' => $this->input->post('password', TRUE),
          'status' => 0
        ];
        $this->db->insert('tutor', $dataInsert);
        if($this->db->affected_rows() > 0){
          $this->session->set_userdata('userid', $this->db->insert_id());
          $this->session->set_userdata('nama', $this->input->post('nama', TRUE));
          $this->session->set_userdata('email', $this->input->post('email', TRUE));
          $this->session->set_userdata('is_tutor', TRUE);

          $this->session->set_flashdata('success', "Selamat, Akun Anda Telah Terdaftar");
          redirect('tutor/verifikasi','refresh');
        }else{
          $this->session->set_flashdata('error', "Data Gagal Di Simpan, Silahkan Di Coba Kembali");
          redirect($_SERVER['HTTP_REFERER']);
        }
      }
    }
  }
}   