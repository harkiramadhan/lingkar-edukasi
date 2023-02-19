<?php 
class Overview extends CI_Controller{
    function __construct(){
        parent::__construct();

    }

    function index(){

      $this->load->view('layout/admin/header');
		  $this->load->view('admin/overview');
      $this->load->view('layout/admin/footer');

    }
}   