<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Tutor extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model([
            'M_Tutor',
            'M_Settings'
        ]);
    }

    function index(){
        $this->load->view('tutor/masuk');
    }

    function lupapassword(){
        $this->load->view('tutor/lupa-password');
    }

    function newPassword(){
        if(!$this->session->userdata('is_tutor')){
            redirect('tutor');
        }else{
            $this->load->view('tutor/password-baru');
        }
    }

    function setSession(){
        $email = $this->input->get('u', TRUE);
        $getUser = $this->db->get_where('tutor', ['md5(email)' => $email]);
        if($getUser->num_rows() > 0){
            $this->session->set_userdata('is_tutor', TRUE);
            $this->session->set_userdata('email', $getUser->row()->email);
            $this->session->set_userdata('userid', $getUser->row()->id);

            redirect('tutor/tutor/newPassword','refresh');
        }
    }

    function actionNewPassword(){
        $pwd1 = $this->input->post('pwd1', TRUE);
        $pwd2 = $this->input->post('pwd2', TRUE);

        if(!$this->session->userdata('is_tutor')){
            redirect('tutor');
        }else{
            if($pwd1 == $pwd2){
                $this->db->where('id', $this->session->userdata('userid'))->update('tutor', [
                    'password' => $pwd2
                ]);
                redirect('tutor/overview');
            }
        }
    }

    function auth(){
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        $checkUser = $this->M_Tutor->getUser($email);
        if($checkUser->num_rows() > 0){
            $data = $checkUser->row();
            if($password == $data->password){
                $this->session->set_userdata('is_tutor', TRUE);
                $this->session->set_userdata('userid', $data->id);
                $this->session->set_userdata('email', $data->email);
                $this->session->set_userdata('nama', $data->nama);

                redirect('tutor/overview');
            }else{
                $this->session->set_flashdata('error', "Password Salah!");
                $this->session->set_flashdata('email', $email);
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            $this->session->set_flashdata('error', "User Tidak Tersedia!");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function verifikasi(){
        if($this->session->userdata('is_tutor')){
            $userid = $this->session->userdata('userid');
            $tutor = $this->M_Tutor->getById($userid);
            if($tutor->status == 2){
                redirect('tutor/course');
            }else{
                $var = [
                    'user' => $tutor,
                    'ajax' => [
                        'tutor-verification'
                    ]
                ];
        
                $this->load->view('layout/tutor/header', $var);
                $this->load->view('tutor/course-verifikasi', $var);
                $this->load->view('layout/tutor/footer', $var);
            }
        }else{
            redirect('tutor','refresh');
        }
    }

    function submitVerifikasi(){
        if($this->session->userdata('is_tutor')){
            $this->db->where([
                'id'=> $this->session->userdata('userid'),
                'email' => $this->session->userdata('email')
            ])->update('tutor', [
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'link' => $this->input->post('link', TRUE),
                'status' => 1
            ]);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', "Verifikasi Berhasil Terkirim");
            }else{
                $this->session->set_flashdata('error', "Verifikasi Gagal Di Simpan");
            }

            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect('tutor','refresh');
        }
    }

    function ajaxAuth(){
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('pwd', TRUE);

        $checkUser = $this->M_Tutor->getUser($email);
        if($checkUser->num_rows() > 0){
            $data = $checkUser->row();
            if($password == $data->password){
                $this->session->set_userdata('is_tutor', TRUE);
                $this->session->set_userdata('userid', $data->id);
                $this->session->set_userdata('email', $data->email);
                $this->session->set_userdata('nama', $data->nama);

                $token = md5($email) . "&" . md5($password);
                
                $res = [
                    'status' => 200,
                    'token' => $token,
                    'message' => 'Success',
                    'redirect_url' => site_url('tutor/overview')
                ];
            }else{
                $this->session->set_flashdata('error', "Password Salah!");
                $this->session->set_flashdata('email', $email);

                $res = [
                    'status' => 400,
                    'message' => 'Error, Password Salah!',
                    'email' => $email,
                    'redirect_url' => site_url('tutor')
                ];
            }
        }else{
            $this->session->set_flashdata('error', "User Tidak Tersedia!");
            $res = [
                'status' => 400,
                'message' => 'Error, User Tidak Tersedia!',
                'redirect_url' => site_url('tutor')
            ];
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }

    function ajaxTokenAuth(){
        $token = $this->input->post('token', TRUE);
        $explode = explode('&', $token);
        $email = $explode[0];
        $pwd = $explode[1];

        $getUser = $this->db->get_where('tutor', [
            'md5(email)' => $email,
            'md5(password)' => $pwd
        ]);
        if($getUser->num_rows() > 0){
            $this->session->set_userdata('is_tutor', TRUE);
            $this->session->set_userdata('email', $getUser->row()->email);
            $this->session->set_userdata('userid', $getUser->row()->id);

            $res = [
                'status' => 200,
                'redirect_url' => site_url('tutor/overview')
            ];
        }else{
            $res = [
                'status' => 400
            ];
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }

    function sendMailForgotPassword(){
        $email = $this->input->post('email', TRUE);
        $cekMail = $this->db->get_where('tutor', ['email' => $email]);

        if($cekMail->num_rows() > 0){
            $data = [
                'email' => $email,
                'nama' => $cekMail->row()->nama
            ];

            $email              = $email;
            $mail               = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug    = 2;
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
            $mail->Subject      = 'Atur Ulang Password';
            $mailContent        = $this->load->view('tutor/email/email-password-reset', $data , TRUE);
            $mail->Body         = $mailContent;
            $mail->send();

            $this->session->set_flashdata('error', 'Cek Email Untuk Konfirmasi Perubahan Password');
        }else{
            $this->session->set_flashdata('error', 'Email Tidak Terdaftar');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}