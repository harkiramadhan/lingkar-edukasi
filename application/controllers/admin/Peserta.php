<?php 
class Peserta extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Users'
        ]);

        if($this->session->userdata('is_admin') != TRUE){
            redirect('admin','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Peserta',
            'users' => $this->M_Users->getAll(),
            'ajax' => [
                'peserta'
            ]
        ];

        $this->load->view('layout/admin/header', $var);
        $this->load->view('admin/peserta', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    function detail($id){
        $user = $this->M_Users->getById($id);
        $checkTrx = $this->db->select('id')->get_where('orders', ['transaction_status' => 'settlement', 'userid' => $id]);
        ?>
            <div class="modal-header">
				<h5 class="modal-title">Detail Peserta</h5>
				<button type="button" class="close" data-dismiss="modal"><span>×</span>
				</button>
			</div>

            <div class="modal-body">
				<div class="card-media mb-4 mx-auto" style="max-width: 200px;">
                    <?php if($user->profile_picture): ?>
                        <img src="<?= base_url('uploads/profile/' . $user->profile_picture) ?>" alt="" class="w-100 rounded" id="image-preview" style="display: block;">
                    <?php else: ?>
					    <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100 rounded" id="image-preview" style="display: block;">
                    <?php endif; ?>
				</div>
                <table id="example2" class="table card-table display dataTable">
                    <tbody>
						<tr>
							<td width="50%"><button type="button" class="btn btn-sm btn-block btn-success"><?= ($user->status == 1) ? 'AKTIF' : 'NON AKTIF' ?></button></td>
							<td width="50%" ><button type="button" class="btn btn-sm btn-block btn-secondary"><?= $checkTrx->num_rows() ?>x Transaksi</button></td>
						</tr>
						<tr>
							<td width="40%">Nama Lengkap</td>
							<td><?= $user->name ?></td>
						</tr>
						<tr>
							<td width="40%">Email</td>
							<td><?= $user->email ?></td>
						</tr>
						<tr>
							<td width="40%">No WA/HP</td>
							<td><?= $user->nohp ?></td>
						</tr>
						<tr>
							<td width="40%">Jenis Kelamin</td>
							<td><?= ($user->jenkel == 'L') ? 'Laki - laki' : (($user->jenkel == 'P') ? 'Perempuan' : ' - ') ?></td>
						</tr>
						<tr>
							<td width="40%">Pendidikan Terahir</td>
							<td><?= $user->pendidikan ?></td>
						</tr>
						<tr>
							<td width="40%">Tanggal Lahir</td>
							<td><?= longdate_indo(date('Y-m-d', strtotime($user->tgll))) ?></td>
						</tr>                  
                    </tbody>
                </table>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
			</div>
        <?php
    }

    function edit($id){
        $user = $this->M_Users->getById($id);
        ?>
            <div class="modal-header">
				<h5 class="modal-title">Status Peserta</h5>
				<button type="button" class="close" data-dismiss="modal"><span>×</span>
				</button>
			</div>

            <div class="modal-body">
				<form action="<?= site_url('admin/peserta/update/' . $id) ?>" method="POST">
					<div class="form-group">
						<label class="text-black font-w500">Status</label>
						<select class="form-control default-select " name="status" required="">
							<option value="" disabled="">Pilih</option>
							<option <?= ($user->status == 1) ? 'selected' : '' ?> value="1">Aktif</option>
							<option <?= ($user->status == 0) ? 'selected' : '' ?> value="0">Tidak Aktif</option>
						</select>
					</div>
					<div class="form-group mb-0 text-right">
						<button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
        <?php
    }

    function update($id){
        $this->db->where('id', $id)->update('user', ['status' => $this->input->post('status', TRUE)]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Data Gagal Di Simpan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}   
