<?php 
class Konten extends CI_Controller{
  function __construct(){
    parent::__construct();

    $this->load->library('image_lib');

    $this->load->model([
      'M_Banners',
      'M_Partner'
    ]);
    
    if($this->session->userdata('is_admin') != TRUE) 
      redirect('admin','refresh');
  }

  private function resizeImage($filename, $dir){
    $config['image_library'] = 'gd2';  
    $config['source_image'] = './uploads/'. $dir . '/' . $filename;  
    $config['create_thumb'] = FALSE;  
    $config['maintain_ratio'] = TRUE;  
    $config['quality'] = '75%';  
    $config['new_image'] = './uploads/' . $dir . '/' . $filename;  
    $config['width'] = 500;              

    $this->image_lib->initialize($config);
    $this->image_lib->resize();  
    $this->image_lib->clear();
  }

  function landing(){
    $var = [
      'banners' => $this->M_Banners->getAll(),
      'partners' => $this->M_Partner->getAll(),
      'ajax' => [
        'landing'
      ]
    ];

    $this->load->view('layout/admin/header', $var);
    $this->load->view('admin/konten-landing', $var);
    $this->load->view('layout/admin/footer', $var);
  }

  /* Modals */
  function editBanner($id){
    $banner = $this->M_Banners->getById($id);
    ?>
      <div class="modal-header">
				<h5 class="modal-title">Edit Konten Banner</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/konten/updateBanner/' . $id) ?>" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-lg-7 col-12 order-lg-1 order-2">
                  <div class="form-group">
                      <label class="text-black font-w500">Gambar Banner</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">Upload</span>
                          </div>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="img" id="image-source-edit" onchange="previewImageEdit()">
                              <label class="custom-file-label">Pilih</label>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="text-black font-w500">Judul Banner</label>
                      <input name="judul" type="text" class="form-control" value="<?= $banner->judul ?>" required>
                  </div>

                  <div class="form-group">
                      <label class="text-black font-w500">Deskripsi Banner</label>
                      <input name="deskripsi" type="text" class="form-control" value="<?= $banner->deskripsi ?>" required>
                  </div>

                  <div class="form-group">
                      <label class="text-black font-w500">Text Tombol</label>
                      <input name="text" type="text" class="form-control" value="<?= $banner->text ?>" required>
                  </div>

                  <div class="form-group">
                      <label class="text-black font-w500">Link Tombol</label>
                      <input name="link" type="text" class="form-control" value="<?= $banner->link ?>" required>
                  </div>
                  
                  <div class="form-group">
                      <label class="text-black font-w500">Status</label>
                      <select name="status" class="form-control default-select" required>
                          <option value="" disabled>Pilih</option>
                          <option <?= ($banner->status == 1) ? 'selected' : '' ?> value="1">Aktif</option>
                          <option <?= ($banner->status == 0) ? 'selected' : '' ?> value="0">Tidak Aktif</option>
                      </select>
                  </div>
              </div>
              
              <div class="col-lg-5 col-12 order-lg-2 order-1">
                  <div class="card-media mb-4">
                      <img src="<?= base_url('uploads/banners/' . $banner->img) ?>" alt="" class="w-100 rounded" id="image-preview-edit">
                  </div>
              </div>
          </div>

          <div class="form-group mb-0 text-right">
              <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
				</form>
			</div>

      <script>

      </script>
    <?php
  }

  function editPartner($id){
    $partner = $this->M_Partner->getById($id);
    ?>
      <div class="modal-header">
        <h5 class="modal-title">Edit Konten Logo Partner</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('admin/konten/updatePartner/' . $id) ?>" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-lg-7 col-12 order-lg-1 order-2">
                  <div class="form-group">
                      <label class="text-black font-w500">Logo Partner</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">Upload</span>
                          </div>
                          <div class="custom-file">
                          <input type="file" class="custom-file-input" name="img" id="image-source-edit" onchange="previewImageEdit()">
                              <label class="custom-file-label">Pilih</label>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="text-black font-w500">Nama Partner</label>
                      <input name="judul" type="text" class="form-control" value="<?= $partner->judul ?>" required>
                  </div>

                  <div class="form-group">
                      <label class="text-black font-w500">Link Partner</label>
                      <input name="link" type="text" class="form-control" value="<?= $partner->link ?>" required>
                  </div>
                  
                  <div class="form-group">
                      <label class="text-black font-w500">Status</label>
                      <select name="status" class="form-control default-select" required>
                          <option value="" disabled>Pilih</option>
                          <option <?= ($partner->status == 1) ? 'selected' : '' ?> value="1">Aktif</option>
                          <option <?= ($partner->status == 0) ? 'selected' : '' ?> value="0">Tidak Aktif</option>
                      </select>
                  </div>
              </div>
              
              <div class="col-lg-5 col-12 order-lg-2 order-1">
                  <div class="card-media mb-4">
                      <img src="<?= base_url('uploads/partner/' . $partner->img) ?>" alt="" class="w-100 rounded" id="image-preview-edit">
                  </div>
              </div>
          </div>

          <div class="form-group mb-0 text-right">
              <button type="submit" class="btn btn-primary">Simpan</button>
          </div>

        </form>
      </div>
    <?php
  }

  /* Actions */
  function createBanner(){
    $config['upload_path'] = './uploads/banners';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      $data = $this->upload->data();
      $filename = $data['file_name'];
      $this->resizeImage($filename, 'banners'); 
    }

		$dataInsert = [
			'judul' => $this->input->post('judul', TRUE),
			'link' => $this->input->post('link', TRUE),
			'status' => $this->input->post('status', TRUE),
			'img' => $filename,
      'deskripsi' => $this->input->post('deskripsi', TRUE),
      'text' => $this->input->post('text', TRUE)
		];
		$this->db->insert('banners', $dataInsert);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('suecces', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    $this->session->set_flashdata('tab', "tab-banner");
		
		redirect($_SERVER['HTTP_REFERER']);
  }

  function updateBanner($id){
    $banner = $this->M_Banners->getById($id);

    $config['upload_path'] = './uploads/banners';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      if($banner->img != NULL){
        @unlink('./uploads/banners/' . @$banner->img);
      }

      $data = $this->upload->data();
      $filename = $data['file_name'];
			$this->resizeImage($filename, 'banners'); 
    }else{
			$filename = $banner->img;
		}

    $dataUpdate = [
			'judul' => $this->input->post('judul', TRUE),
			'link' => $this->input->post('link', TRUE),
			'status' => $this->input->post('status', TRUE),
			'img' => $filename,
      'deskripsi' => $this->input->post('deskripsi', TRUE),
      'text' => $this->input->post('text', TRUE)
		];
		$this->db->where('id', $id)->update('banners', $dataUpdate);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('suecces', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    $this->session->set_flashdata('tab', "tab-banner");
		
		redirect($_SERVER['HTTP_REFERER']);
  }

  function removeBanner($id){
    $banner = $this->M_Banners->getById($id);

    if($banner->img != NULL){
      @unlink('./uploads/banners/' . @$banner->img);
    }

    $this->db->where('id', $id)->delete('banners');
    $res = ($this->db->affected_rows() > 0) ? 1 : 0;
    $this->output->set_content_type('application/json')->set_output(json_encode($res));
  }

  function createPartner(){
    $config['upload_path'] = './uploads/partner';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      $data = $this->upload->data();
      $filename = $data['file_name'];
      $this->resizeImage($filename, 'partner'); 
    }

    $dataInsert = [
      'judul' => $this->input->post('judul', TRUE),
      'img' => $filename,
      'link' => $this->input->post('link', TRUE),
      'status' => $this->input->post('status', TRUE)
    ];
    $this->db->insert('partner', $dataInsert);
    if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('suecces', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    $this->session->set_flashdata('tab', "tab-partner");
		
		redirect($_SERVER['HTTP_REFERER']);
  }

  function updatePartner($id){
    $partner = $this->M_Partner->getById($id);

    $config['upload_path'] = './uploads/partner';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      if($partner->img != NULL){
        @unlink('./uploads/partner/' . @$partner->img);
      }

      $data = $this->upload->data();
      $filename = $data['file_name'];
			$this->resizeImage($filename, 'partner'); 
    }else{
			$filename = $partner->img;
		}

    $dataUpdate = [
      'judul' => $this->input->post('judul', TRUE),
      'img' => $filename,
      'link' => $this->input->post('link', TRUE),
      'status' => $this->input->post('status', TRUE)
    ];

    $this->db->where('id', $id)->update('partner', $dataUpdate);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('suecces', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    $this->session->set_flashdata('tab', "tab-banner");
		
		redirect($_SERVER['HTTP_REFERER']);
  }

  function removePartner($id){
    $partner = $this->M_Partner->getById($id);

    if($partner->img != NULL){
      @unlink('./uploads/partner/' . @$partner->img);
    }

    $this->db->where('id', $id)->delete('partner');
    $res = ($this->db->affected_rows() > 0) ? 1 : 0;
    $this->output->set_content_type('application/json')->set_output(json_encode($res));
  }

}   