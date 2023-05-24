<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Users',
            'M_Settings',
            'M_Labels'
        ]);
    }
    function signin(){
        $var['labels'] = $this->M_Labels->getActive();
        $var['setting'] = $this->M_Settings->get();

        include_once APPPATH . "../vendor/autoload.php";
        $googleClient = new Google_Client();
        $googleClient->setClientId('842595441292-lmihklq8i6k91qnomq2cn9pb9vtfarpv.apps.googleusercontent.com');
        $googleClient->setClientSecret('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');
        $googleClient->setRedirectUri(site_url('signin'));
        $googleClient->addScope('email');
        $googleClient->addScope('profile');

        if(isset($_GET["code"])){
            $token = $googleClient->fetchAccessTokenWithAuthCode($_GET["code"]);
            if(!isset($token["error"])){
                $googleClient->setAccessToken($token['access_token']);
                $googleService = new Google_Service_Oauth2($googleClient);
                $data = $googleService->userinfo->get();
                $current_datetime = date('Y-m-d H:i:s');

                $user_data = array(
                    'first_name' => $data['given_name'],
                    'last_name'  => $data['family_name'],
                    'email_address' => $data['email'],
                    'profile_picture'=> $data['picture'],
                    'updated_at' => $current_datetime
                );

                $userCheck = $this->db->get_where('user', ['email' => $data['email']]);
                if($userCheck->num_rows() > 0){
                    $dataUpdate = [
                        'login_oauth_uid' => $data['id'],
                        'first_name' => $data['given_name'],
                        'last_name' => $data['family_name'],
                        'name' => $data['name'],
                        'email' => $data['email']
                    ];
                    $this->db->where('id', $userCheck->row()->id)->update('user', $dataUpdate);

                    $userCheck2 = $this->db->get_where('user', ['email' => $data['email']])->row();
                    $this->session->set_userdata('is_user', TRUE);
                    $this->session->set_userdata('user_id', $userCheck2->id);
                }else{
                    $this->session->set_flashdata('error', "Email Belum Terdaftar!");
                }
            }									
        }
        $var['login_button'] = '';
        if(!$this->session->userdata('is_user')){
            $login_button = '<a href="'.$googleClient->createAuthUrl().'"><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';
            $var['login_button'] = $login_button;
            $var['auth_url'] = $googleClient->createAuthUrl();

            $this->load->view('layout/user/header', $var);
            $this->load->view('user/signin', $var);
            $this->load->view('layout/user/footer', $var);
        }else{
            redirect('course','refresh');
        }
    }

    function signup(){
        $var['labels'] = $this->M_Labels->getActive();
        $var['setting'] = $this->M_Settings->get();

        include_once APPPATH . "../vendor/autoload.php";
        $googleClient = new Google_Client();
        $googleClient->setClientId('842595441292-5qgo3nk3crntg4tn8951uqkqugf6aqmo.apps.googleusercontent.com');
        $googleClient->setClientSecret('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');
        $googleClient->setRedirectUri(site_url('signup'));
        $googleClient->addScope('email');
        $googleClient->addScope('profile');

        if(isset($_GET["code"])){
            $token = $googleClient->fetchAccessTokenWithAuthCode($_GET["code"]);
            if(!isset($token["error"])){
                $googleClient->setAccessToken($token['access_token']);
                $googleService = new Google_Service_Oauth2($googleClient);
                $data = $googleService->userinfo->get();
                $current_datetime = date('Y-m-d H:i:s');

                $user_data = array(
                    'first_name' => $data['given_name'],
                    'last_name'  => $data['family_name'],
                    'email_address' => $data['email'],
                    'profile_picture'=> $data['picture'],
                    'updated_at' => $current_datetime
                );

                $userCheck = $this->db->get_where('user', ['email' => $data['email']]);

                if(!$userCheck->num_rows() > 0){
                    /* Save Image From Google To Local */
                    $imageUrl = $data['picture'];
                    $filename = substr($imageUrl, strrpos($imageUrl, '/') + 1) . '.jpg';
                    file_put_contents('uploads/profile/' . $filename, file_get_contents($imageUrl));
                    
                    $dataInsert = [
                        'is_google' => 1,
                        'is_valid' => 1,
                        'login_oauth_uid' => $data['id'],
                        'first_name' => $data['given_name'],
                        'last_name' => $data['family_name'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'profile_picture' => $filename,
                        'password' => '',
                        'created_at' => $current_datetime
                    ];
                    $this->db->insert('user', $dataInsert);
                }

                $userCheck2 = $this->db->get_where('user', ['email' => $data['email']])->row();
                
                $this->session->set_userdata('user_data', $data);
                $this->session->set_userdata('is_user', TRUE);
                $this->session->set_userdata('user_id', $userCheck2->id);
            }									
        }
        $var['login_button'] = '';
        if(!$this->session->userdata('is_user')){
            $login_button = '<a href="'.$googleClient->createAuthUrl().'"><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';
            $var['login_button'] = $login_button;
            $var['auth_url'] = $googleClient->createAuthUrl();

            $this->load->view('layout/user/header', $var);
            $this->load->view('user/signup', $var);
            $this->load->view('layout/user/footer', $var);
        }else{
            redirect('course','refresh');
        }
    }

    function forgotpassword(){
        $var = [
            'labels' => $this->M_Labels->getActive(),
            'setting' => $this->M_Settings->get()
        ];

        $this->load->view('layout/user/header', $var);
        $this->load->view('user/forgot-password', $var);
        $this->load->view('layout/user/footer', $var);
    }

    function verifemail(){
        $var = [
            'labels' => $this->M_Labels->getActive(),
            'setting' => $this->M_Settings->get()
        ];

        $this->load->view('layout/user/header', $var);
        $this->load->view('user/verif-email', $var);
        $this->load->view('layout/user/footer', $var);
    }

    function passwordbaru(){
        if(!$this->session->userdata('is_user')){
            redirect('signin');
        }else{
            $var = [
                'labels' => $this->M_Labels->getActive(),
                'setting' => $this->M_Settings->get(),
                'user' => $this->M_Users->getById($this->session->userdata('user_id'))
            ];
    
            $this->load->view('layout/user/header', $var);
            $this->load->view('user/password-baru', $var);
            $this->load->view('layout/user/footer', $var);
        }
    }
    
    function cekemailpassword(){
        $var = [
            'labels' => $this->M_Labels->getActive(),
            'setting' => $this->M_Settings->get()
        ];

        $this->load->view('layout/user/header', $var);
        $this->load->view('user/cek-email-password', $var);
        $this->load->view('layout/user/footer', $var);
    }

    /* Action */
    function logout(){
        $this->session->sess_destroy();
		redirect();
    }

    function actionSignup(){
        $email = $this->input->post('email', TRUE);
        $is_robot = $this->input->post('is_robot', TRUE);

        if(!$is_robot){
            $emailCheck = $this->M_Users->getByEmail($email);
            if(@$emailCheck->id){
                $this->session->set_flashdata('error', TRUE);
                $this->session->set_flashdata('name', $this->input->post('name', TRUE));
                $this->session->set_flashdata('email', $this->input->post('email', TRUE));
                $this->session->set_flashdata('nohp', $this->input->post('nohp', TRUE));
    
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $dataInsert = [
                    'name' => $this->input->post('name', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'password' => md5($this->input->post('password', TRUE)),
                    'nohp' => $this->input->post('nohp', TRUE),
                ];
                $this->db->insert('user', $dataInsert);
                $this->sendMail([
                    'nama' => $this->input->post('name', TRUE),
                    'email' => $this->input->post('email', TRUE),
                ]);
                redirect('auth/verifemail?mail=' . $email,'refresh');
            }
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function actionSignin(){
        $email = $this->input->post('email', TRUE);
        $password = md5($this->input->post('password', TRUE));
        $emailCheck = $this->M_Users->getByEmail($email);

        if(!$emailCheck->id){
            $this->session->set_flashdata('error', "Email Yang Dimasukan Salah!");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            if(!$emailCheck->password){
                $this->session->set_userdata('is_user', TRUE);
                $this->session->set_userdata('user_id', $emailCheck->id);

                redirect('newPassword','refresh');
            }elseif($emailCheck->password == $password){
                $this->session->set_userdata('is_user', TRUE);
                $this->session->set_userdata('user_id', $emailCheck->id);

                redirect('course','refresh');
            }else{
                $this->session->set_flashdata('error', "Password Yang Dimasukan Salah!");
                $this->session->set_flashdata('email', $email);
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }   

    function createPassword(){
        if(!$this->session->userdata('is_user')){
            redirect('signin');
        }else{
            $userid = $this->session->userdata('user_id');
            $password = $this->input->post('pwd', TRUE);
            $validate = $this->input->post('validate', TRUE);

            if($password == $validate){
                $this->db->where('id', $userid)->update('user', [
                    'password' => md5($validate)
                ]);

                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('success', "Password Berhasil Di Perbarui");
                    redirect('','refresh');
                }else{
                    $this->session->set_flashdata('error', "Password Gagal Di Perbarui");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_flashdata('error', "Password Tidak Sesuai");
                redirect($_SERVER['HTTP_REFERER']);
                
            }
        }
    }

    function mailVerification(){
        $mail = $this->input->get('mail', TRUE);
        $userCheck = $this->M_Users->getByEmail($mail);
        if(@$userCheck->email){
            $this->db->where('id', $userCheck->id)->update('user', [
                'is_valid' => 1
            ]);

            if($this->db->affected_rows() > 0){
                $this->session->set_userdata('is_user', TRUE);
                $this->session->set_userdata('user_id', $userCheck->id);
                redirect('','refresh');
            }else{
                redirect('','refresh');
            }
        }else{
            redirect('','refresh');
        }
    }

    function requestPasswordReset(){
        $email = $this->input->post('email', TRUE);
        $userCheck = $this->M_Users->getByEmail($email);
        if(@$userCheck->email){
            $this->sendMailResetPassword([
                'nama' => $userCheck->name,
                'email' => $userCheck->email
            ]);

            /* Redirect View Check Emailmu */
        }else{
            $this->session->set_flashdata('error', "Email Tidak Terdaftar");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function setSession(){
        $email = $this->input->get('u', TRUE);
        $userCheck = $this->db->get_where('user', ['md5(email)' => $email])->row();
        if(@$userCheck->email){
            $this->session->set_userdata('is_user', TRUE);
            $this->session->set_userdata('user_id', $userCheck->id);
            redirect('auth/passwordbaru','refresh');
        }
    }

    /* Mail Function */
    function sendMail($data){
        $email = $data['email'];
        $mail = new PHPMailer(true);

        $mail->isSMTP();
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

        $mail->Subject = 'Verifikasi Email';
        $mailContent = $this->load->view('user/email/email-daftar', $data , TRUE);

        $mail->Body = $mailContent;

        if(!$mail->send()){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    function sendMailResetPassword($data){
        $email = $data['email'];
        $mail = new PHPMailer(true);

        $mail->isSMTP();
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

        $mail->Subject = 'Atur Ulang Password';
        $mailContent = $this->load->view('user/email/email-password-reset', $data , TRUE);

        $mail->Body = $mailContent;

        if(!$mail->send()){
            return FALSE;
        }else{
            return TRUE;
        }
    }
}