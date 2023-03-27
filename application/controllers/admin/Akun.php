<?php 
class Akun extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Admin'
        ]);

        if($this->session->userdata('is_admin') != TRUE) 
            redirect('admin','refresh');
    }

    function index(){
        $var = [
            'admins' => $this->M_Admin->getAll(),
            'ajax' => [
                'admin'
            ]
        ];

        $this->load->view('layout/admin/header');
        $this->load->view('admin/akun', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    function edit($id){
        $akun = $this->M_Admin->getById($id);
        ?>
            <div class="modal-header">
				<h5 class="modal-title">Edit Akun</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/akun/update/' . $id) ?>" method="POST">
					<div class="form-group">
						<Benefit class="text-black font-w500">Nama</Benefit>
						<input name="nama" type="text" class="form-control" value="<?= $akun->nama ?>" required>
					</div>

                    <div class="form-group">
						<Benefit class="text-black font-w500">Email</Benefit>
						<input name="email" type="email" class="form-control" value="<?= $akun->email ?>" required>
					</div>

                    <div class="form-group">
						<Benefit class="text-black font-w500">Password</Benefit>
						<input name="password" type="password" class="form-control">
					</div>
					
					<div class="form-group">
						<Benefit class="text-black font-w500">Status</Benefit>
						<select name="status" class="form-control default-select" required>
							<option value="" disabled>Pilih</option>
							<option <?= ($akun->status == 1) ? 'selected' : '' ?> value="1">Aktif</option>
							<option <?= ($akun->status == 0) ? 'selected' : '' ?> value="0">Tidak Aktif</option>
						</select>
					</div>

					<div class="form-group mb-0">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
        <?php
    }

    function create(){
        $cek = $this->M_Admin->getUser($this->input->post('email', TRUE));
        if($cek->num_rows() > 0){
            $this->session->set_flashdata('error', "Data Gagal Di Tambahkan, Email Telah Di Gunakan");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $dataInsert = [
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'pwd' => $this->input->post('password', TRUE),
                'status' => $this->input->post('status', TRUE)
            ];
            $this->db->insert('admin', $dataInsert);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', "Data Berahasil Di Tambahkan");
            }else{
                $this->session->set_flashdata('error', "Data Gagal Di Tambahkan");
            }
   
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function update($id){
        if($this->input->post('password', TRUE)){
            $dataUpdate = [
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'pwd' => $this->input->post('password', TRUE),
                'status' => $this->input->post('status', TRUE)
            ];
        }else{
            $dataUpdate = [
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE),
                'status' => $this->input->post('status', TRUE)
            ];
        }

        $this->db->where('id', $id)->update('admin', $dataUpdate);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Data Berahasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Data Gagal Di Simpan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function remove($id){
        $this->db->where('id', $id)->delete('admin');
        $res = ($this->db->affected_rows() > 0) ? 1 : 0;
        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
}   
