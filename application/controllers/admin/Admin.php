<?php
class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model([
            'M_Admin'
        ]);
    }

    function index(){
        $this->load->view('admin/masuk');
    }

    function auth(){
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        $checkUser = $this->M_Admin->getUser($email);
        if($checkUser->num_rows() > 0){
            $data = $checkUser->row();
            if(md5($password) == $data->password){
                $this->session->set_userdata('admin', TRUE);
                $this->session->set_userdata('email', $data->email);

                redirect('admin/overview');
            }else{
                echo md5($password);
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