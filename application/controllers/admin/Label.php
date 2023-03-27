<?php 
class Label extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Labels'
        ]);

        if($this->session->userdata('is_admin') != TRUE) 
            redirect('admin','refresh');
    }

    function index(){
        $var = [
            'labels' => $this->M_Labels->getAll(),
            'ajax' => [
                'label'
            ]
        ];

        $this->load->view('layout/admin/header');
        $this->load->view('admin/label', $var);
        $this->load->view('layout/admin/footer', $var);

    }

    /* Modals */
    function edit($id){
        $label = $this->M_Labels->getById($id);
        ?>
            <div class="modal-header">
				<h5 class="modal-title">Edit Label</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/label/update/' . $id) ?>" method="POST">
					<div class="form-group">
						<label class="text-black font-w500">Nama Label</label>
						<input name="label" type="text" class="form-control" value="<?= $label->label ?>" required>
					</div>
					
					<div class="form-group">
						<label class="text-black font-w500">Status</label>
						<select class="form-control default-select " name="status" required>
							<option value="" disabled>Pilih</option>
							<option <?= ($label->status == 1) ? 'selected' : '' ?> value="1">Aktif</option>
							<option <?= ($label->status == 0) ? 'selected' : '' ?> value="0">Tidak Aktif</option>
						</select>
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
        $this->db->insert('labels', [
            'label' => $this->input->post('label', TRUE),
            'status' => $this->input->post('status', TRUE)
        ]);
        
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Label Berhasil Di Tambahkan");
        }else{
            $this->session->set_flashdata('error', "Label Gagal Di Tambahkan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function update($id){
        $this->db->where('id', $id)->update('labels', [
            'label' => $this->input->post('label', TRUE),
            'status' => $this->input->post('status', TRUE)
        ]);
        
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Label Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Label Gagal Di Simpan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function remove($id){
        $this->db->where('id', $id)->delete('labels');
        if($this->db->affected_rows() > 0){
            $res = 1;
        }else{
            $res = 0;
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
}   