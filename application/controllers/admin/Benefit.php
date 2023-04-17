<?php 
class Benefit extends CI_Controller{
    function __construct(){
        parent::__construct();
        
        $this->load->model([
            'M_Benefit'
        ]);

        if($this->session->userdata('is_admin') != TRUE){
            redirect('admin','refresh');
        }
    }

    function index(){
        $var = [
            'fontawesome' => $this->db->get('fontawesome'),
            'benefit' => $this->M_Benefit->getAll(),
            'ajax' => [
                'benefit'
            ]
        ];

        $this->load->view('layout/admin/header');
        $this->load->view('admin/benefit', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    /* Modals */
    function edit($id){
        $benefit = $this->M_Benefit->getById($id);
        $fontawesome = $this->db->get('fontawesome');

        ?>
            <div class="modal-header">
				<h5 class="modal-title">Edit Benefit</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/benefit/update/' . $id) ?>" method="POST">
					<div class="form-group">
						<Benefit class="text-black font-w500">Nama Benefit</Benefit>
						<input name="benefit" type="text" class="form-control" value="<?= $benefit->benefit ?>" required>
					</div>
					
					<div class="form-group">
						<Benefit class="text-black font-w500">Status</Benefit>
						<select name="status" class="form-control default-select" required>
							<option value="" disabled>Pilih</option>
							<option <?= ($benefit->status == 1) ? 'selected' : '' ?> value="1">Aktif</option>
							<option <?= ($benefit->status == 0) ? 'selected' : '' ?> value="0">Tidak Aktif</option>
						</select>
					</div>
					
					<div class="form-group">
						<label>Pilih Icon <small class="text-danger">*</small></label>
						<div class="input-group mb-3" style="max-height: 350px!important; overflow-y: scroll;">
							<?php foreach($fontawesome->result() as $fa){ ?>
								<div class="form-check form-check-inline text-center">
									<input class="form-check-input" type="radio" name="icon" id="inlineRadioIcon<?= $fa->id ?>" value="<?= $fa->class ?>" required="" <?= ($benefit->icon == $fa->class) ? 'checked' : '' ?>>
									<label class="form-check-label" for="inlineRadioIcon<?= $fa->id ?>"></label>
									<h4><i class="<?= $fa->class ?> mb-0"></i></h3>
								</div>
							<?php } ?>
						</div>
					</div>

					<div class="form-group mb-0">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
        <?php
    }

    /* Action */
    function create(){
        $this->db->insert('benefit', [
            'benefit' => $this->input->post('benefit', TRUE),
            'status' => $this->input->post('status', TRUE),
            'icon' => $this->input->post('icon', TRUE)
        ]);

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Benefit Berhasil Di Tambahkan");
        }else{
            $this->session->set_flashdata('error', "Benefit Gagal Di Tambahkan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function update($id){
        $this->db->where('id', $id)->update('benefit', [
            'benefit' => $this->input->post('benefit', TRUE),
            'status' => $this->input->post('status', TRUE),
            'icon' => $this->input->post('icon', TRUE)
        ]);

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Benefit Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Benefit Gagal Di Simpan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function remove($id){
        $this->db->where('id', $id)->delete('benefit');
        $res = ($this->db->affected_rows() > 0) ? 1 : 0;
        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
}   