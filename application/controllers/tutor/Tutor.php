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
}