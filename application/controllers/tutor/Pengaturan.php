<?php
class Pengaturan extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Tutor'
        ]);

        if(!$this->session->userdata('is_tutor')){
            redirect('tutor','refresh');
        }
    }

    function index(){
        $userid = $this->session->userdata('userid');
        $var = [
            'user' => $this->M_Tutor->getById($userid),
            'ajax' => [
                'settings'
            ]
        ];

        $this->load->view('layout/tutor/header', $var);
        $this->load->view('tutor/pengaturan', $var);
        $this->load->view('layout/tutor/footer', $var);
    }

    function action($id){
        $check = $this->M_Tutor->getById($id);

        $config['upload_path'] = './uploads/profile';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            if($check->img != NULL){
                @unlink('./uploads/profile/' . @$check->img);
            }

            $data = $this->upload->data();
            $filename = $data['file_name'];
        }else{
            $filename = $check->img;
        }

        if($check->email != $this->input->post('email', TRUE)){
            $check2 = $this->M_Tutor->getUser($this->input->post('email', TRUE));
            if($check2->num_rows() > 0){
                $dataUpdate = [
                    'nama' => $this->input->post('nama', TRUE),
                    'nohp' => $this->input->post('nohp', TRUE),
                    'jenkel' => $this->input->post('jenkel', TRUE),
                    'deskripsi' => $this->input->post('deskripsi', TRUE),
                    'pendidikan_terakhir' => $this->input->post('pendidikan', TRUE),
                    'tgll' => $this->input->post('tgll', TRUE),
                    'img' => $filename
                ];
                $this->session->set_flashdata('error', "Email Sudah Tersedia, Gunakan Email Lainnya!");
            }else{
                $dataUpdate = [
                    'nama' => $this->input->post('nama', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'nohp' => $this->input->post('nohp', TRUE),
                    'jenkel' => $this->input->post('jenkel', TRUE),
                    'deskripsi' => $this->input->post('deskripsi', TRUE),
                    'pendidikan_terakhir' => $this->input->post('pendidikan', TRUE),
                    'tgll' => $this->input->post('tgll', TRUE),
                    'img' => $filename
                ];
                $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
            }
        }else{
            $dataUpdate = [
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE),
                'nohp' => $this->input->post('nohp', TRUE),
                'jenkel' => $this->input->post('jenkel', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'pendidikan_terakhir' => $this->input->post('pendidikan', TRUE),
                'tgll' => $this->input->post('tgll', TRUE),
                'img' => $filename
            ];
        }
        $this->db->where('id', $id)->update('tutor', $dataUpdate);
        $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
        $this->session->set_flashdata('is_profil', TRUE);

        redirect($_SERVER['HTTP_REFERER']);
    }

    function actionPassword($id){
        $check = $this->M_Tutor->getById($id);
        $oldPassword = $this->input->post('old_pwd', TRUE);
        $newPassword = $this->input->post('new_pwd', TRUE);

        if($check->password == $oldPassword){
            $this->db->where('id', $id)->update('admin', ['password' => $newPassword]);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data Berhasil Di Simpan');
            }else{
                $this->session->set_flashdata('error', "Data Gagal Di Simpan");
            }
        }else{
            $this->session->set_flashdata('error', 'Password Lama Tidak Sesuai');
        }

        $this->session->set_flashdata('is_password', TRUE);
        redirect($_SERVER['HTTP_REFERER']);
    }
}