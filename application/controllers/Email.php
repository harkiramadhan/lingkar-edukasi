<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email extends CI_Controller{
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
      'M_Partner'
    ]);

    // if(!$this->session->userdata('is_user')){
    //   redirect('','refresh');
    // }
  }

  function index(){
    $userid = $this->session->userdata('user_id');
    $user = $this->M_Users->getById($userid);
    $data = [
      'nama' => 'AlfianRHT',
      'email' => 'madanzdanz@gmail.com'
    ];
    
    // $this->load->library('phpmailer_lib');
    $email = $data['email'];

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host         = 'mail.lingkaredukasi.com';
    $mail->SMTPAuth     = true;
    $mail->Username     = 'norep@lingkaredukasi.com';
    $mail->Password     = 'Lingkar12345';
    $mail->SMTPSecure   = 'ssl';
    $mail->Port         = 465;

    $mail->setFrom('norep@lingkaredukasi.com', 'No Reply - Lingkar Edukasi');
    $mail->addReplyTo('admin@lingkaredukasi.com', 'Lingkar Edukasi');

    $mail->addAddress('madanzdanz@gmail.com');

    $mail->isHTML(true);

    $mail->Subject = 'Verifikasi Email';
    $mailContent = $this->load->view('user/email/email-beli-kelas', $data , TRUE);

    $mail->Body = $mailContent;

    if(!$mail->send()){
        return FALSE;
    }else{
        return TRUE;
    }
  }

  function pembeliankelas(){
    $this->load->view('user/email/email-beli-kelas');
  }

  function kelasselesai(){
    $this->load->view('user/email/email-kelas-selesai');
  }

  function updatepassword(){
    $data = [
      'nama' => 'AlfianRHT',
      'email' => 'harkiramadhan@gmail.com'
    ];
    $this->load->view('user/email/email-password-reset', $data);
  }

}   