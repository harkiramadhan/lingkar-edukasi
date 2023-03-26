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
        $this->load->view('user/forgotpassword');
        $this->load->view('layout/user/footer');
    }

    function verifemail(){
        $this->load->view('layout/user/header');
        $this->load->view('user/verifemail');
        $this->load->view('layout/user/footer');
    }

    function passwordbaru(){
        $this->load->view('layout/user/header');
        $this->load->view('user/passwordbaru');
        $this->load->view('layout/user/footer');
    }
    
    function cekemailpassword(){
        $this->load->view('layout/user/header');
        $this->load->view('user/cekemailpassword');
        $this->load->view('layout/user/footer');
    }
      
}