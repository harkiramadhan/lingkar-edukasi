<?php
class Kelas extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Users',
            'M_Courses',
            'M_Settings',
            'M_Labels',
            'M_Benefit_Landing',
            'M_Testimoni_Landing',
            'M_Banners',
            'M_Partner',
            'M_Benefit',
            'M_Tutor',
            'M_Video',
            'M_Enrollment',
            'M_Materi'
        ]);

        if(!$this->session->userdata('is_user')){
            redirect('','refresh');
        }
    }

    function index(){
        $userid = $this->session->userdata('user_id');
        $var = [
            'labels' => $this->M_Labels->getActive(),
            'setting' => $this->M_Settings->get(),
            'user' => $this->M_Users->getById($userid),
            'courses' => $this->M_Enrollment->getSettlementUser($userid)
        ];

        $this->load->view('layout/user/header', $var);
        $this->load->view('user/kelassaya-list', $var);
        $this->load->view('layout/user/footer', $var);
    }

    function detail($flag){
        $userid = $this->session->userdata('user_id');
        $course = $this->M_Courses->getByFlag($flag);

        $trx = $this->M_Enrollment->getByUserCourse($userid, $course->id, 'settlement');
        if($trx->num_rows() > 0){
            $var = [
                'title' => $course->judul,
                'labels' => $this->M_Labels->getActive(),
                'setting' => $this->M_Settings->get(),
                'user' => $this->M_Users->getById($userid),
                'tutor' => $this->M_Tutor->getById($course->pemateriid),
                'course' => $course,
                'materi' => $this->M_Materi->getByClass($course->id)
            ];
    
            $this->load->view('layout/user/header', $var);
            $this->load->view('user/kelassaya-detail-course', $var);
            $this->load->view('layout/user/footer', $var);
        }else{
            redirect('course/' . $flag . '/detail','refresh');
        }
    }

    function joined($flag){
        $userid = $this->session->userdata('user_id');
        $course = $this->M_Courses->getByFlag($flag);

        $trx = $this->M_Enrollment->getByUserCourse($userid, $course->id, 'settlement');
        if($trx->num_rows() > 0){
            $var = [
                'labels' => $this->M_Labels->getActive(),
                'setting' => $this->M_Settings->get(),
                'user' => $this->M_Users->getById($userid),
                'course' => $course
            ];
    
            $this->load->view('layout/user/header', $var);
            $this->load->view('user/thanks-for-join', $var);
            $this->load->view('layout/user/footer', $var);
        }else{
            redirect('course/' . $flag . '/detail','refresh');
        }
    }

    function kelassayaselesai(){
        $userid = $this->session->userdata('user_id');
        $var = [
            'labels' => $this->M_Labels->getActive(),
            'setting' => $this->M_Settings->get(),
            'user' => $this->M_Users->getById($userid)
        ];

        $this->load->view('layout/user/header', $var);
        $this->load->view('user/kelassaya-selesai', $var);
        $this->load->view('layout/user/footer', $var);
    }
}