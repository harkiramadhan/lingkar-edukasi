<?php
class Tutor extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model([
            'M_Tutor'
        ]);
    }

    function index(){
        $this->load->view('tutor/masuk');
    }

    function auth(){
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        $checkUser = $this->M_Tutor->getUser($email);
        if($checkUser->num_rows() > 0){
            $data = $checkUser->row();
            if($password == $data->password){
                $this->session->set_userdata('is_tutor', TRUE);
                $this->session->set_userdata('userid', $data->id);
                $this->session->set_userdata('email', $data->email);
                $this->session->set_userdata('nama', $data->nama);

                redirect('tutor/overview');
            }else{
                $this->session->set_flashdata('error', "Password Salah!");
                $this->session->set_flashdata('email', $email);
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            $this->session->set_flashdata('error', "User Tidak Tersedia!");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function verifikasi(){
        if($this->session->userdata('is_tutor')){
            $userid = $this->session->userdata('userid');
    
            $var = [
                'user' => $this->M_Tutor->getById($userid),
                'ajax' => [
                    'tutor-verification'
                ]
            ];
    
            $this->load->view('layout/tutor/header', $var);
            $this->load->view('tutor/course-verifikasi', $var);
            $this->load->view('layout/tutor/footer', $var);
        }else{
            redirect('tutor','refresh');
        }
    }

    function submitVerifikasi(){
        if($this->session->userdata('is_tutor')){
            $this->db->where([
                'id'=> $this->session->userdata('userid'),
                'email' => $this->session->userdata('email')
            ])->update('tutor', [
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'link' => $this->input->post('link', TRUE),
                'status' => 1
            ]);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', "Verifikasi Berhasil Terkirim");
            }else{
                $this->session->set_flashdata('error', "Verifikasi Gagal Di Simpan");
            }

            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect('tutor','refresh');
        }
    }
}