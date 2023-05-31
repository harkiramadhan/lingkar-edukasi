<?php
class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model([
            'M_Admin'
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
}