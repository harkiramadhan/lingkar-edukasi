<?php 
class Tutor extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Tutor',
            'M_Admin'
        ]);

        if($this->session->userdata('is_admin') != TRUE){
            redirect('admin','refresh');
        }
    }

    function index(){
        $userid = $this->session->userdata('userid');
        $var = [
            'user' => $this->M_Admin->getById($userid),
            'tutor' => $this->M_Tutor->getAll(),
            'ajax' => [
                'tutor'
            ]
        ];

        $this->load->view('layout/admin/header', $var);
        $this->load->view('admin/tutor', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    /* Modals */
    function edit($id){
        $tutor = $this->M_Tutor->getById($id);
        ?>
            <div class="modal-header">
				<h5 class="modal-title">Status Tutor</h5>
				<button type="button" class="close" data-dismiss="modal"><span>×</span>
				</button>
			</div>

            <div class="modal-body">
				<form action="<?= site_url('admin/tutor/action/' . $id) ?>" method="POST">
					<div class="form-group">
						<label class="text-black font-w500">Status</label>
						<select class="form-control default-select " name="status" required="">
							<option value="" disabled="">Pilih</option>
							<option <?= ($tutor->status == '2') ? 'selected' : '' ?> value="2">Diterima</option>
							<option <?= ($tutor->status == '3') ? 'selected' : '' ?> value="3">Ditolak</option>
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

    function ajuan($id){
        $tutor = $this->M_Tutor->getById($id);
        ?>
            <div class="modal-header">
                <h5 class="modal-title">Pengajuan Tutor</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title mb-2">Pengajuan</h5>
                <div class="card border">
                    <div class="card-body p-3">
                        <?= $tutor->deskripsi ?>    
                    
                        <h5 class="modal-title mb-2">Link: </h5>
                        <a class="mb-2 text-danger" href="<?= $tutor->link ?>" target="__BLANK"><strong><u><?= $tutor->link ?></u></strong></a>
                    </div>
                </div>

                <form action="<?= site_url('admin/tutor/submit') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <h5 class="modal-title mb-2">Tanggapan</h5>
                    <div class="form-group mb-2">
                        <textarea class="form-control" rows="4" id="comment" name="answer"></textarea>
                    </div>

                    <select class="form-control mb-2" name="status" required>
                        <option value="" disabled selected>Pilih</option>
                        <option <?= ($tutor->status == 3) ? 'selected' : '' ?> value="3">Ditolak</option>
                        <option <?= ($tutor->status == 2) ? 'selected' : '' ?> value="2">Diterima</option>
                    </select>
                    <div class="form-group mb-0 text-right mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

            <script>
                $('#comment').summernote()
            </script>
        <?php
    }

    function detail($id){
        $tutor = $this->M_Tutor->getById($id);
        $courses = $this->db->select('id')->get_where('courses', ['pemateriid' => $id])->num_rows();
        ?>
             <div class="modal-header">
				<h5 class="modal-title">Detail Peserta</h5>
				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
			</div>

            <div class="modal-body">
				<div class="card-media mb-4 mx-auto" style="max-width: 200px;">
                    <?php if($tutor->img): ?>
                        <img src="<?= base_url('uploads/tutor/' . $tutor->img) ?>" alt="" class="w-100 rounded" id="image-preview" style="display: block;">
                    <?php else: ?>
					    <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100 rounded" id="image-preview" style="display: block;">
                    <?php endif; ?>
				</div>
                <table id="example2" class="table card-table display dataTable">
                    <tbody>
						<tr>
                            <?php 
                                if($tutor->status == 0){
                                    $color = 'bg-danger text-white';
                                    $status = 'BELUM MENGAJUKAN';
                                }elseif($tutor->status == 1){
                                    $color = 'bg-warning text-white';
                                    $status = 'MENUNGGU APPROVAL';
                                }elseif($tutor->status == 2){
                                    $color = 'bg-success text-white';
                                    $status = 'AKTIF';
                                }elseif($tutor->status == 3){
                                    $color = 'bg-danger text-white';
                                    $status = 'DITOLAK';
                                }
                            ?>
							<td width="50%"><button type="button" class="btn btn-sm btn-block <?= $color ?>"><?= $status ?></button></td>
							<td width="50%" ><button type="button" class="btn btn-sm btn-block btn-primary"><?= $courses ?> Course</button></td>
						</tr>
						<tr>
							<td width="40%">Nama Lengkap</td>
							<td><?= $tutor->nama ?></td>
						</tr>
						<tr>
							<td width="40%">Email</td>
							<td><?= $tutor->email ?></td>
						</tr>
						<tr>
							<td width="40%">No WA/HP</td>
							<td><?= $tutor->nohp ?></td>
						</tr>
						<tr>
							<td width="40%">Jenis Kelamin</td>
							<td><?= ($tutor->jenkel == 'L') ? 'Laki - Laki' : (($tutor->jenkel == 'P') ? 'Perempuan' : ' - ') ?></td>
						</tr>
						<tr>
							<td width="40%">Pendidikan Terahir</td>
							<td><?= ($tutor->pendidikan_terakhir) ? $tutor->pendidikan_terakhir : ' - ' ?></td>
						</tr>
						<tr>
							<td width="40%">Tanggal Lahir</td>
							<td><?= ($tutor->tgll) ? longdate_indo(date('Y-m-d', strtotime($tutor->tgll))) : ' - ' ?></td>
						</tr>                  
                    </tbody>
                </table>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
			</div>
        <?php
    }

    function submit(){
        $this->db->where('id', $this->input->post('id', TRUE))->update('tutor', [
            'status' => $this->input->post('status', TRUE),
            'answer' => $this->input->post('answer', TRUE)
        ]);

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Data Gagal Di Simpan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function action($id){
        $this->db->where('id', $id)->update('tutor', ['status' => $this->input->post('status', TRUE)]);

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Data Gagal Di Simpan");
        }

        redirect($_SERVER['HTTP_REFERER']);        
    }
}   
