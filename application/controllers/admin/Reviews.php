<?php 
class Reviews extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Reviews',
            'M_Admin'
        ]);

        if($this->session->userdata('is_admin') != TRUE){
            redirect('admin','refresh');
        }
    }

    function index(){
        $userid = $this->session->userdata('userid');
        $courseid = $this->input->get('cid', TRUE);
        
        $var = [
            'user' => $this->M_Admin->getById($userid),
            'title' => 'Reviews',
            'review' => ($courseid) ? $this->M_Reviews->getByCourses($courseid) : $this->M_Reviews->getAll(),
            'ajax' => [
                'review'
            ]
        ];
        $this->load->view('layout/admin/header', $var);
        $this->load->view('admin/reviews', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    function edit($id){
        $review = $this->M_Reviews->getById($id);
        ?>
            <div class="modal-header">
				<h5 class="modal-title">Status Review</h5>
				<button type="button" class="close" data-dismiss="modal"><span>×</span>
				</button>
			</div>

            <div class="modal-body">
				<form action="<?= site_url('admin/reviews/update/' . $id) ?>" method="POST">
					<div class="form-group">
						<label class="text-black font-w500">Status</label>
						<select class="form-control default-select " name="status" required="">
							<option value="" disabled="">Pilih</option>
							<option <?= ($review->status == 1) ? 'selected' : '' ?> value="1">Aktif</option>
							<option <?= ($review->status == 0) ? 'selected' : '' ?> value="0">Tidak Aktif</option>
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
        $this->db->where('id', $id)->update('review', ['status' => $this->input->post('status', TRUE)]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Data Gagal Di Simpan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function remove($id){
        $this->db->where('id', $id)->delete('review');
        $res = ($this->db->affected_rows() > 0) ? 1 : 0;
        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
}   
