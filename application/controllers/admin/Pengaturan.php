<?php 
class Pengaturan extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Admin',
            'M_Settings'
        ]);

        if($this->session->userdata('is_admin') != TRUE){
            redirect('admin','refresh');
        }
    }

    function index(){
        $email = $this->session->userdata('email');
        $var = [
            'user' => $this->M_Admin->getUser($email)->row(),
            'setting' => $this->M_Settings->get(),
            'ajax' => [
                'settings'
            ]
        ];

        $this->load->view('layout/admin/header', $var);
        $this->load->view('admin/pengaturan', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    function action($id){
        $check = $this->M_Admin->getById($id);

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
            $check2 = $this->M_Admin->getUser($this->input->post('email', TRUE));
            if($check2->num_rows() > 0){
                $dataUpdate = [
                    'nama' => $this->input->post('nama', TRUE),
                    'nohp' => $this->input->post('nohp', TRUE),
                    'jenkel' => $this->input->post('jenkel', TRUE),
                    'pendidikan' => $this->input->post('pendidikan', TRUE),
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
                    'pendidikan' => $this->input->post('pendidikan', TRUE),
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
                'pendidikan' => $this->input->post('pendidikan', TRUE),
                'tgll' => $this->input->post('tgll', TRUE),
                'img' => $filename
            ];
        }
        $this->db->where('id', $id)->update('admin', $dataUpdate);
        $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
        $this->session->set_flashdata('is_profil', TRUE);

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

        $this->session->set_flashdata('is_password', TRUE);
        redirect($_SERVER['HTTP_REFERER']);
    }

    function actionSertifikat(){
        $setting = $this->M_Settings->get();

        $config['upload_path'] = './uploads/settings';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('bg_sertifikat')){
            if($setting->bg_sertifikat){
                @unlink('./uploads/settings/' . @$setting->bg_sertifikat);
            }

            $dataBg = $this->upload->data();
            $bg = $dataBg['file_name'];
        }else{
            $bg = $setting->bg_sertifikat;
        }

        if($this->upload->do_upload('ttd_sertifikat')){
            if($setting->ttd_sertifikat){
                @unlink('./uploads/settings/' . @$setting->ttd_sertifikat);
            }

            $dataTtd = $this->upload->data();
            $ttd = $dataTtd['file_name'];
        }else{
            $ttd = $dataTtd->ttd_sertifikat;
        }

        $this->db->where('id', 1)->update('setting', [
            'bg_sertifikat' => $bg,
            'ttd_sertifikat' => $ttd,
            'nama_sertifikat' => $this->input->post('nama_sertifikat', TRUE),
            'jabatan_sertifikat' => $this->input->post('jabatan_sertifikat', TRUE)
        ]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Data Gagal Di Simpan");
        }

        $this->session->set_flashdata('is_sertifikat', TRUE);
        redirect($_SERVER['HTTP_REFERER']);
    }
}   
