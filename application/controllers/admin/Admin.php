<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model([
            'M_Admin',
            'M_Settings'
        ]);
    }

    function index(){
        $this->load->view('admin/masuk');
    }

    function auth(){
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        $checkUser = $this->M_Admin->getUser($email);
        if($checkUser->num_rows() > 0){
            $data = $checkUser->row();
            if(md5($password) == $data->password){
                $this->session->set_userdata('is_admin', TRUE);
                $this->session->set_userdata('email', $data->email);
                $this->session->set_userdata('userid', $data->id);

                redirect('admin/overview');
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

    function setSession(){
        $email = $this->input->get('u', TRUE);
        $getUser = $this->db->get_where('admin', ['md5(email)' => $email]);
        if($getUser->num_rows() > 0){
            $this->session->set_userdata('is_admin', TRUE);
            $this->session->set_userdata('email', $getUser->row()->email);
            $this->session->set_userdata('userid', $getUser->row()->id);

            redirect('admin/admin/newPassword','refresh');
        }
    }
    
    function ajaxAuth(){
        $email = $this->input->post('email', TRUE);
        $pwd = $this->input->post('pwd', TRUE);

        $checkUser = $this->M_Admin->getUser($email);

        if($checkUser->num_rows() > 0){
            $data = $checkUser->row();
            if($pwd == $data->pwd){
                $this->session->set_userdata('is_admin', TRUE);
                $this->session->set_userdata('email', $data->email);
                $this->session->set_userdata('userid', $data->id);

                $token = md5($email) . "&" . md5($pwd);
                
                $res = [
                    'status' => 200,
                    'token' => $token,
                    'message' => 'Success',
                    'redirect_url' => site_url('admin/overview')
                ];
            }else{
                $this->session->set_flashdata('error', "Password Salah!");
                $this->session->set_flashdata('email', $email);

                $res = [
                    'status' => 400,
                    'message' => 'Error, Password Salah!',
                    'email' => $email,
                    'redirect_url' => site_url('admin')
                ];
            }
        }else{
            $this->session->set_flashdata('error', "User Tidak Tersedia!");
            $res = [
                'status' => 400,
                'message' => 'Error, User Tidak Tersedia!',
                'redirect_url' => site_url('admin')
            ];
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }

    function ajaxTokenAuth(){
        $token = $this->input->post('token', TRUE);
        $explode = explode('&', $token);
        $email = $explode[0];
        $pwd = $explode[1];

        $getUser = $this->db->get_where('admin', [
            'md5(email)' => $email,
            'password' => $pwd
        ]);
        if($getUser->num_rows() > 0){
            $this->session->set_userdata('is_admin', TRUE);
            $this->session->set_userdata('email', $getUser->row()->email);
            $this->session->set_userdata('userid', $getUser->row()->id);

            $res = [
                'status' => 200,
                'redirect_url' => site_url('admin/overview')
            ];
        }else{
            $res = [
                'status' => 400
            ];
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }

    function lupapassword(){
        $this->load->view('admin/lupa-password');
    }

    function newPassword(){
        if(!$this->session->userdata('is_admin')){
            redirect('admin');
        }else{
            $this->load->view('admin/password-baru');
        }
    }

    function actionNewPassword(){
        $pwd1 = $this->input->post('pwd1', TRUE);
        $pwd2 = $this->input->post('pwd2', TRUE);

        if(!$this->session->userdata('is_admin')){
            redirect('admin');
        }else{
            if($pwd1 == $pwd2){
                $this->db->where('id', $this->session->userdata('userid'))->update('admin', [
                    'password' => md5($pwd1),
                    'pwd' => $pwd2
                ]);
                redirect('admin/overview');
            }
        }
    }

    function sendMailForgotPassword(){
        $email = $this->input->post('email', TRUE);
        $cekMail = $this->db->get_where('admin', ['email' => $email]);

        if($cekMail->num_rows() > 0){
            $data = [
                'email' => $email,
                'nama' => $cekMail->row()->nama
            ];

            $email              = $email;
            $mail               = new PHPMailer(true);
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
            $mail->Subject      = 'Atur Ulang Password';
            $mailContent        = $this->load->view('admin/email/email-password-reset', $data , TRUE);
            $mail->Body         = $mailContent;
            $mail->send();

            $this->session->set_flashdata('error', 'Cek Email Untuk Konfirmasi Perubahan Password');
        }else{
            $this->session->set_flashdata('error', 'Email Tidak Terdaftar');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}