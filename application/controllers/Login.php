<?php 
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();

    }

    public function index(){
		include_once APPPATH . "../vendor/autoload.php";
        $googleClient = new Google_Client();
        $googleClient->setClientId('34338163443-5h1tu6h24guovdjt3c3vvui7djd6de0d.apps.googleusercontent.com');
        $googleClient->setClientSecret('jLpFiy9QAbOSEutatXH_cSem');
        $googleClient->setRedirectUri('http://localhost/lingkar-edukasi/login');
        $googleClient->addScope('email');
        $googleClient->addScope('profile');

        if(isset($_GET["code"])){
            $token = $googleClient->fetchAccessTokenWithAuthCode($_GET["code"]);
            if(!isset($token["error"])){
                $googleClient->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
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
                $this->session->set_userdata('user_data', $data);
            }									
        }
        $login_button = '';
        if(!$this->session->userdata('access_token')){
            $login_button = '<a href="'.$googleClient->createAuthUrl().'"><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';
            $data['login_button'] = $login_button;
            $this->load->view('google_login', $data);
        }else{
            // uncomentar kode dibawah untuk melihat data session email
            // echo json_encode($this->session->userdata('access_token')); 
            // echo json_encode($this->session->userdata('user_data'));
            echo "Login success";
            $this->output->enable_profiler(TRUE);
            
        }
	}

    public function logout(){
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('user_data');
        echo "Logout berhasil";
    }

    function test(){
        var_dump(file_get_contents('https://lh3.googleusercontent.com/a/AEdFTp7DcsaX4PMURzl5e_9VxcHVzNLrUbWJSpYyUYab=s96-c'));
    }

}