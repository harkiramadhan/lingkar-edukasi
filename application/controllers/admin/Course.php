<?php 
class Course extends CI_Controller{
    function __construct(){
        parent::__construct();

    }

    function index(){

        $this->load->view('layout/admin/header');
        $this->load->view('admin/course');
        $this->load->view('layout/admin/footer');

    }

    function detail(){

        $this->load->view('layout/admin/header');
        $this->load->view('admin/course-detail');
        $this->load->view('layout/admin/footer');

    }
}   