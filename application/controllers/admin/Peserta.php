<?php 
class Peserta extends CI_Controller{
    function __construct(){
        parent::__construct();

    }

    function index(){

        $this->load->view('layout/admin/header');
        $this->load->view('admin/peserta');
        $this->load->view('layout/admin/footer');

    }
}   
