<?php 
class Tutor extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Tutor'
        ]);

        if($this->session->userdata('is_admin') != TRUE) 
            redirect('admin','refresh');
    }

    function index(){
        $var = [
            'tutor' => $this->M_Tutor->getAll(),
            'ajax' => [
                'tutor'
            ]
        ];

        $this->load->view('layout/admin/header');
        $this->load->view('admin/tutor', $var);
        $this->load->view('layout/admin/footer', $var);

    }
}   
