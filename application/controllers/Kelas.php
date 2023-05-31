<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

        $videoid = $this->input->get('video', TRUE);
        if($videoid){
            $video = $this->M_Video->getByIdHash($videoid);
        }

        $trx = $this->M_Enrollment->getByUserCourse($userid, $course->id, 'settlement');
        if($trx->num_rows() > 0){
            $log = $this->input->get('log', TRUE);
            if($log){
                $checkLog = $this->db->get_where('courses_video_log', [
                    'userid' => $userid,
                    'videoid' => $log,
                    'courseid' => $course->id
                ]);
    
                if($checkLog->num_rows() > 0){}else{
                    $this->db->insert('courses_video_log', [
                        'userid' => $userid,
                        'videoid' => $log,
                        'courseid' => $course->id
                    ]);
                }
            }

            $var = [
                'title' => $course->judul,
                'labels' => $this->M_Labels->getActive(),
                'setting' => $this->M_Settings->get(),
                'user' => $this->M_Users->getById($userid),
                'tutor' => $this->M_Tutor->getById($course->pemateriid),
                'course' => $course,
                'materi' => $this->M_Materi->getByClass($course->id),
                'videos' => @$video,
                'courseVideo' => $this->M_Video->getByClass($course->id)
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

    function done($flag){
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
            $this->load->view('user/kelassaya-selesai', $var);
            $this->load->view('layout/user/footer', $var);
        }else{
            redirect('course/' . $flag . '/detail','refresh');
        }
    }

    function actionDone(){
        $id = $this->input->get('video', TRUE);
        $courseid = $this->input->get('cls', TRUE);
        $flag = $this->input->get('flag', TRUE);

        $userid = $this->session->userdata('user_id');
        $checkLog = $this->db->get_where('courses_video_log', [
            'userid' => $userid,
            'videoid' => $id,
            'courseid' => $courseid
        ]);

        if($checkLog->num_rows() > 0){}else{
            $this->db->insert('courses_video_log', [
                'userid' => $userid,
                'videoid' => $id,
                'courseid' => $courseid
            ]);

            if($this->db->affected_rows() > 0){
                $this->db->insert('sertifikat', [
                    'userid' => $userid,
                    'courseid' => $courseid
                ]);

                $user = $this->M_Users->getById($userid);
                $course = $this->M_Courses->getById($courseid);

                $data = [
                    'user' => $user,
                    'course' => $course,
                    'setting' => $this->M_Settings->get()
                ];
                $email = $user->email;
                $mail = new PHPMailer(true);
        
                $mail->isSMTP();
                // $mail->SMTPDebug    = 2;
                $mail->Host         = 'mail.lingkaredukasi.com';
                $mail->SMTPAuth     = true;
                $mail->Username     = 'norep@lingkaredukasi.com';
                $mail->Password     = 'Lingkar12345';
                $mail->SMTPSecure   = 'ssl';
                $mail->Port         = 465;
        
                $mail->setFrom('norep@lingkaredukasi.com', 'No Reply - Lingkar Edukasi');
                $mail->addReplyTo('admin@lingkaredukasi.com', 'Lingkar Edukasi');
                $mail->addAddress("$email");
                $mail->isHTML(true);
        
                $mail->Subject = 'Kelas Selesai - Course ' . $course->judul;
                $mailContent = $this->load->view('user/email/email-kelas-selesai', $data , TRUE);
                $mail->Body = $mailContent;
        
                $mail->send();
            }
        }
        
        $this->db->where(['courseid' => $courseid, 'userid' => $userid])->update('enrollment', ['is_done' => 1]);
        redirect('kelas/' . $flag . '/done', 'refresh');
    }

}