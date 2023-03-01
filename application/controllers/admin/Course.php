<?php 
class Course extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('admin') != TRUE) 
            redirect('admin','refresh');
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

    function tambah(){

        $this->load->view('layout/admin/header');
        $this->load->view('admin/course-tambah');
        $this->load->view('layout/admin/footer');

    }

    function media(){

        $this->load->view('layout/admin/header');
        $this->load->view('admin/course-media');
        $this->load->view('layout/admin/footer');

    }
}   