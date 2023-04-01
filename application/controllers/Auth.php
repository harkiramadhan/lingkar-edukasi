<?php 
class Auth extends CI_Controller{
    function signin(){
        $this->load->view('layout/user/header');
        $this->load->view('user/signin');
        $this->load->view('layout/user/footer');
    }

    function signup(){
        $this->load->view('layout/user/header');
        $this->load->view('user/signup');
        $this->load->view('layout/user/footer');
    }

    function forgotpassword(){
        $this->load->view('layout/user/header');
        $this->load->view('user/forgot-password');
        $this->load->view('layout/user/footer');
    }

    function verifemail(){
        $this->load->view('layout/user/header');
        $this->load->view('user/verif-email');
        $this->load->view('layout/user/footer');
    }

    function passwordbaru(){
        $this->load->view('layout/user/header');
        $this->load->view('user/password-baru');
        $this->load->view('layout/user/footer');
    }
    
    function cekemailpassword(){
        $this->load->view('layout/user/header');
        $this->load->view('user/cek-email-password');
        $this->load->view('layout/user/footer');
    }
      
}