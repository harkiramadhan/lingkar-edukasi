<?php 
class Tutor extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model([
            'M_Tutor'
        ]);

        if($this->session->userdata('is_admin') != TRUE){
            redirect('admin','refresh');
        }
    }

    function index(){
        $var = [
            'tutor' => $this->M_Tutor->getAll(),
            'ajax' => [
                'tutor'
            ]
        ];

        $this->load->view('layout/admin/header');
        $this->load->view('admin/tutor', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    /* Modals */
    function edit($id){
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
}   
