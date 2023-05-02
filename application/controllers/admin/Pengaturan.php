<?php 
class Pengaturan extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Admin'
        ]);

        if($this->session->userdata('is_admin') != TRUE){
            redirect('admin','refresh');
        }
    }

    function index(){
        $email = $this->session->userdata('email');
        $var = [
            'user' => $this->M_Admin->getUser($email)->row()
        ];

        $this->load->view('layout/admin/header', $var);
        $this->load->view('admin/pengaturan', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    function action($id){
        $check = $this->M_Admin->getById($id);
        if($check->email != $this->input->post('email', TRUE)){
            $check2 = $this->M_Admin->getUser($this->input->post('email', TRUE));
            if($check2->num_rows() > 0){
                $dataUpdate = [
                    'nama' => $this->input->post('nama', TRUE),
                    'nohp' => $this->input->post('nohp', TRUE),
                    'jenkel' => $this->input->post('jenkel', TRUE),
                    'pendidikan' => $this->input->post('pendidikan', TRUE),
                    'tgll' => $this->input->post('tgll', TRUE)
                ];
                $this->session->set_flashdata('error', "Email Sudah Tersedia, Gunakan Email Lainnya!");
            }else{
                $dataUpdate = [
                    'nama' => $this->input->post('nama', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'nohp' => $this->input->post('nohp', TRUE),
                    'jenkel' => $this->input->post('jenkel', TRUE),
                    'pendidikan' => $this->input->post('pendidikan', TRUE),
                    'tgll' => $this->input->post('tgll', TRUE)
                ];
                $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
            }
        }else{
            $dataUpdate = [
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE),
                'nohp' => $this->input->post('nohp', TRUE),
                'jenkel' => $this->input->post('jenkel', TRUE),
                'pendidikan' => $this->input->post('pendidikan', TRUE),
                'tgll' => $this->input->post('tgll', TRUE)
            ];
        }
        $this->db->where('id', $id)->update('admin', $dataUpdate);
        $this->session->set_flashdata('success', "Data Berhasil Di Simpan");

        redirect($_SERVER['HTTP_REFERER']);
    }

    function actionPassword($id){
        $check = $this->M_Admin->getById($id);
        $oldPassword = $this->input->post('old_pwd', TRUE);
        $newPassword = $this->input->post('new_pwd', TRUE);

        if($check->password == md5($oldPassword)){
            $this->db->where('id', $id)->update('admin', [
                'password' => md5($newPassword),
                'pwd' => $newPassword
            ]);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data Berhasil Di Simpan');
            }else{
                $this->session->set_flashdata('error', "Data Gagal Di Simpan");
            }
        }else{
            $this->session->set_flashdata('error', 'Password Lama Tidak Sesuai');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}   
