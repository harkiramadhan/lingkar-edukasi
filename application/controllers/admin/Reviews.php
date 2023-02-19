<?php 
class Reviews extends CI_Controller{
    function __construct(){
        parent::__construct();

    }

    function index(){

        $this->load->view('layout/admin/header');
        $this->load->view('admin/reviews');
        $this->load->view('layout/admin/footer');

    }
}   
