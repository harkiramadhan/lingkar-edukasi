<?php 
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
        $googleClient->setRedirectUri('http://localhost/lingkar-edukasi/signin');
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
                        'email' => $data['email'],
                        'profile_picture' => $data['picture'],
                        'password' => '',
                    ];
                    $this->db->where('id', $userCheck->row()->id)->update('user', $dataUpdate);
                }else{
                    $dataInsert = [
                        'is_google' => 1,
                        'is_valid' => 1,
                        'login_oauth_uid' => $data['id'],
                        'first_name' => $data['given_name'],
                        'last_name' => $data['family_name'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'profile_picture' => $data['picture'],
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
        $googleClient->setClientId('842595441292-lmihklq8i6k91qnomq2cn9pb9vtfarpv.apps.googleusercontent.com');
        $googleClient->setClientSecret('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');
        $googleClient->setRedirectUri('http://localhost/lingkar-edukasi/signin');
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
                        'email' => $data['email'],
                        'profile_picture' => $data['picture'],
                        'password' => '',
                    ];
                    $this->db->where('id', $userCheck->row()->id)->update('user', $dataUpdate);
                }else{
                    $dataInsert = [
                        'is_google' => 1,
                        'is_valid' => 1,
                        'login_oauth_uid' => $data['id'],
                        'first_name' => $data['given_name'],
                        'last_name' => $data['family_name'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'profile_picture' => $data['picture'],
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
        $this->load->view('layout/user/header');
        $this->load->view('user/forgot-password');
        $this->load->view('layout/user/footer');
    }

    function verifemail(){
        $this->load->view('layout/user/header');
        $this->load->view('user/verif-email');
        $this->load->view('layout/user/footer');
    }

    function passwordbaru(){
        $this->load->view('layout/user/header');
        $this->load->view('user/password-baru');
        $this->load->view('layout/user/footer');
    }
    
    function cekemailpassword(){
        $this->load->view('layout/user/header');
        $this->load->view('user/cek-email-password');
        $this->load->view('layout/user/footer');
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
                echo "Belum Ada Password";
            }elseif($emailCheck->password == $password){
                echo "Password Sesuai";
            }else{
                $this->session->set_flashdata('error', "Password Yang Dimasukan Salah!");
                $this->session->set_flashdata('email', $email);
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }   

    function sendMail($data, $type = FALSE){
        // $this->load->library('phpmailer_lib');
        // $email = $data['email'];

        // $mail = $this->phpmailer_lib->load();

        // $mail->isSMTP();
        // $mail->Host         = 'smtp.gmail.com';
        // $mail->SMTPAuth     = true;
        // $mail->Username     = 'edukasilingkar@gmail.com';
        // $mail->Password     = 'Lingkaredukasi12345';
        // $mail->SMTPSecure   = 'ssl';
        // $mail->Port         = 465;

        // $mail->setFrom('edukasilingkar@gmail.com', 'Lingkar Edukasi');
        // $mail->addReplyTo('edukasilingkar@gmail.com', 'Lingkar Edukasi');

        // $mail->addAddress("$email");

        // $mail->isHTML(true);

        // $mail->Subject = 'Verifikasi Email';
        // $mailContent = $this->load->view('mailVerification', $data , TRUE);

        // $mail->Body = $mailContent;

        // if(!$mail->send()){
        //     return FALSE;
        // }else{
        //     return TRUE;
        // }
    }
}