<?php 
class Auth extends CI_Controller{
    function signin(){
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
}