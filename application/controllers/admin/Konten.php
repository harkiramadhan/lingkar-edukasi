<?php 
class Konten extends CI_Controller{
  function __construct(){
    parent::__construct();

    $this->load->library('image_lib');

    $this->load->model([
      'M_Admin',
      'M_Banners',
      'M_Partner',
      'M_Benefit_Landing',
      'M_Settings',
      'M_Testimoni_Landing'
    ]);
    
    if($this->session->userdata('is_admin') != TRUE){
      redirect('admin','refresh');
    }
  }

  function landing(){
    $userid = $this->session->userdata('userid');
    $var = [
      'user' => $this->M_Admin->getById($userid),
      'banners' => $this->M_Banners->getAll(),
      'partners' => $this->M_Partner->getAll(),
      'benefit' => $this->M_Benefit_Landing->getAll(),
      'course' => $this->db->select('judul_section_course, deskripsi_section_course')->get_where('setting', ['id' => 1])->row(),
      'testimoni' => $this->M_Testimoni_Landing->getAll(),
      'tutor' => $this->db->select('cta_judul, cta_desc, cta_btn_text, cta_link, cta_img')->get_where('setting', ['id' => 1])->row(),
      'ajax' => [
        'landing'
      ]
    ];

    $this->load->view('layout/admin/header', $var);
    $this->load->view('admin/konten-landing', $var);
    $this->load->view('layout/admin/footer', $var);
  }

  function header(){
    $userid = $this->session->userdata('userid');
    $var = [
      'user' => $this->M_Admin->getById($userid),
      'setting' => $this->M_Settings->get(),
      'ajax' => [
        'landing-header'
      ]
    ];

    $this->load->view('layout/admin/header', $var);
    $this->load->view('admin/konten-header', $var);
    $this->load->view('layout/admin/footer', $var);
  }

  function footer(){
    $userid = $this->session->userdata('userid');
    $var = [
      'user' => $this->M_Admin->getById($userid),
      'setting' => $this->M_Settings->get()
    ];

    $this->load->view('layout/admin/header', $var);
    $this->load->view('admin/konten-footer', $var);
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

  function editBenefit($id){
    $benefit = $this->M_Benefit_Landing->getById($id);
    ?>
      <div class="modal-header">
				<h5 class="modal-title">Edit Konten Benefit</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/konten/updateBenefit/' . $id) ?>" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-lg-7 col-12 order-lg-1 order-2">
                  <div class="form-group">
                    <label class="text-black font-w500">Logo Benefit</label>
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
                    <label class="text-black font-w500">Benefit</label>
                    <input name="benefit" type="text" class="form-control" value="<?= $benefit->benefit ?>" required>
                  </div>

                  <div class="form-group">
                      <label class="text-black font-w500">Deskripsi Benefit</label>
                      <input name="deskripsi" type="text" class="form-control" value="<?= $benefit->deskripsi ?>" required>
                  </div>

                  <div class="form-group">
                      <label class="text-black font-w500">Deskripsi Tambahan</label>
                      <input name="text" type="text" class="form-control" value="<?= $benefit->text ?>" required>
                  </div>
                  
                  <div class="form-group">
                    <label class="text-black font-w500">Status</label>
                    <select name="status" class="form-control default-select" required>
                        <option value="" disabled>Pilih</option>
                        <option <?= ($benefit->status == 1) ? 'selected' : '1' ?> value="1">Aktif</option>
                        <option <?= ($benefit->status == 0) ? 'selected' : '0' ?> value="0">Tidak Aktif</option>
                    </select>
                  </div>
              </div>
              
              <div class="col-lg-5 col-12 order-lg-2 order-1">
                  <div class="card-media mb-4">
                      <img src="<?= base_url('uploads/benefit/' . $benefit->img) ?>" alt="" class="w-100 rounded" id="image-preview-edit">
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

  function editTestimoni($id){
    $testimoni = $this->M_Testimoni_Landing->getById($id);
    ?>
      <div class="modal-header">
        <h5 class="modal-title">Edit Konten Testimoni</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('admin/konten/updateTestimoni/' . $id) ?>" method="POST" enctype="multipart/form-data">
          <div class="row">

              <div class="col-lg-7 col-12 order-lg-1 order-2">
                  <div class="form-group">
                      <label class="text-black font-w500">Foto Profil</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">Upload</span>
                          </div>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="img" id="image-source4" onchange="previewImageEdit()">
                              <label class="custom-file-label">Pilih</label>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="text-black font-w500">Testimoni Peserta</label>
                      <input name="testimoni" type="text" class="form-control" value="<?= $testimoni->testimoni ?>" required>
                  </div>

                  <div class="form-group">
                      <label class="text-black font-w500">Nama Peserta</label>
                      <input name="nama" type="text" class="form-control" value="<?= $testimoni->nama ?>" required>
                  </div>

                  <div class="form-group">
                      <label class="text-black font-w500">Kelas</label>
                      <input name="kelas" type="text" class="form-control" value="<?= $testimoni->kelas ?>" required>
                  </div>
                  
                  <div class="form-group">
                      <label class="text-black font-w500">Status</label>
                      <select name="status" class="form-control default-select" required>
                          <option value="" disabled>Pilih</option>
                          <option <?= ($testimoni->status == 1) ? 'selected' : '1' ?> value="1">Aktif</option>
                          <option <?= ($testimoni->status == 0) ? 'selected' : '0' ?> value="0">Tidak Aktif</option>
                      </select>
                  </div>

              </div>
              
              <div class="col-lg-5 col-12 order-lg-2 order-1">
                  <div class="card-media mb-4">
                    <img src="<?= base_url('uploads/testimoni/' . $testimoni->img) ?>" alt="" class="w-100 rounded" id="image-preview-edit">
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
  /******* Banners */
  function createBanner(){
    $config['upload_path'] = './uploads/banners';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      $data = $this->upload->data();
      $filename = $data['file_name'];
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
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}

    $this->session->set_flashdata('is_banner', TRUE);
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
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}

    $this->session->set_flashdata('is_banner', TRUE);
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

  /******* Partner */ 
  function createPartner(){
    $config['upload_path'] = './uploads/partner';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      $data = $this->upload->data();
      $filename = $data['file_name'];
    }

    $dataInsert = [
      'judul' => $this->input->post('judul', TRUE),
      'img' => $filename,
      'link' => $this->input->post('link', TRUE),
      'status' => $this->input->post('status', TRUE)
    ];
    $this->db->insert('partner', $dataInsert);
    if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    
		$this->session->set_flashdata('is_logo', TRUE);
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
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    
		$this->session->set_flashdata('is_logo', TRUE);
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

  /******* Benefit */
  function createBenefit(){
    $config['upload_path'] = './uploads/benefit';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      $data = $this->upload->data();
      $filename = $data['file_name'];
    }

    $dataInsert = [
			'img' => $filename,
      'benefit' => $this->input->post('benefit', TRUE),
      'deskripsi' => $this->input->post('deskripsi', TRUE),
      'text' => $this->input->post('text', TRUE),
			'status' => $this->input->post('status', TRUE)
		];
		$this->db->insert('benefit_landing', $dataInsert);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
		
    $this->session->set_flashdata('is_benefit', TRUE);
		redirect($_SERVER['HTTP_REFERER']);
  }

  function updateBenefit($id){
    $benefit = $this->M_Benefit_Landing->getById($id);

    $config['upload_path'] = './uploads/benefit';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      if($benefit->img != NULL){
        @unlink('./uploads/benefit/' . @$benefit->img);
      }

      $data = $this->upload->data();
      $filename = $data['file_name'];
    }else{
			$filename = $benefit->img;
		}

    $dataUpdate = [
      'img' => $filename,
      'benefit' => $this->input->post('benefit', TRUE),
      'deskripsi' => $this->input->post('deskripsi', TRUE),
      'text' => $this->input->post('text', TRUE),
			'status' => $this->input->post('status', TRUE)
    ];
    $this->db->where('id', $id)->update('benefit_landing', $dataUpdate);
    if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    
		$this->session->set_flashdata('is_benefit', TRUE);
		redirect($_SERVER['HTTP_REFERER']);
  }

  function removeBenefit($id){
    $benefit = $this->M_Benefit_Landing->getById($id);

    if($benefit->img != NULL){
      @unlink('./uploads/benefit/' . @$benefit->img);
    }

    $this->db->where('id', $id)->delete('benefit_landing');
    $res = ($this->db->affected_rows() > 0) ? 1 : 0;
    $this->output->set_content_type('application/json')->set_output(json_encode($res));
  }

  /******* Course */
  function actionCourse(){
    $this->db->where('id', 1)->update('setting', [
      'judul_section_course' => ($this->input->post('judul_section_course', TRUE)) ? $this->input->post("judul_section_course", TRUE) : NULL,
      'deskripsi_section_course' => ($this->input->post('deskripsi_section_course', TRUE)) ? $this->input->post("deskripsi_section_course", TRUE) : NULL
    ]);
    if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    
		$this->session->set_flashdata('is_course', TRUE);
		redirect($_SERVER['HTTP_REFERER']);
  }

  /******* Testimoni */
  function createTestimoni(){
    $config['upload_path'] = './uploads/testimoni';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      $data = $this->upload->data();
      $filename = $data['file_name'];
    }

    $dataInsert = [
      'testimoni' => $this->input->post('testimoni', TRUE),
      'nama' => $this->input->post('nama', TRUE),
      'kelas' => $this->input->post('kelas', TRUE),
      'status' => $this->input->post('status', TRUE),
      'img' => $filename
    ];
    $this->db->insert('testimoni_landing', $dataInsert);
    if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
		
    $this->session->set_flashdata('is_testimoni', TRUE);
		redirect($_SERVER['HTTP_REFERER']);
  }

  function updateTestimoni($id){
    $testimoni = $this->M_Testimoni_Landing->getById($id);

    $config['upload_path'] = './uploads/testimoni';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      if($testimoni->img != NULL){
        @unlink('./uploads/testimoni/' . @$testimoni->img);
      }

      $data = $this->upload->data();
      $filename = $data['file_name'];
    }else{
			$filename = $testimoni->img;
		}

    $dataUpdate = [
      'testimoni' => $this->input->post('testimoni', TRUE),
      'nama' => $this->input->post('nama', TRUE),
      'kelas' => $this->input->post('kelas', TRUE),
      'status' => $this->input->post('status', TRUE),
      'img' => $filename
    ];
    $this->db->where('id', $id)->update('testimoni_landing', $dataUpdate);
    if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    
		$this->session->set_flashdata('is_testimoni', TRUE);
		redirect($_SERVER['HTTP_REFERER']);
  }

  function removeTestimoni($id){
    $testimoni = $this->M_Testimoni_Landing->getById($id);

    if($testimoni->img != NULL){
      @unlink('./uploads/testimoni/' . @$testimoni->img);
    }

    $this->db->where('id', $id)->delete('testimoni_landing');
    $res = ($this->db->affected_rows() > 0) ? 1 : 0;
    $this->output->set_content_type('application/json')->set_output(json_encode($res));
  }

  /******* Tutor CTA */
  function actionCTA(){
    $data = $this->M_Settings->get();

    $config['upload_path'] = './uploads/settings';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      if(@$data->cta_img != NULL){
        @unlink('./uploads/settings/' . @$data->cta_img);
      }

      $data = $this->upload->data();
      $filename = $data['file_name'];
    }else{
			$filename = $data->cta_img;
		}

    $this->db->where('id', 1)->update('setting', [
      'cta_img' => $filename,
      'cta_judul' => ($this->input->post('cta_judul', TRUE)) ? $this->input->post("cta_judul", TRUE) : NULL,
      'cta_desc' => ($this->input->post('cta_desc', TRUE)) ? $this->input->post("cta_desc", TRUE) : NULL,
      'cta_btn_text' => ($this->input->post('cta_btn_text', TRUE)) ? $this->input->post("cta_btn_text", TRUE) : NULL,
      'cta_link' => ($this->input->post('cta_link', TRUE)) ? $this->input->post("cta_link", TRUE) : NULL,
    ]);
    if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    
		$this->session->set_flashdata('is_tutor_cta', TRUE);
		redirect($_SERVER['HTTP_REFERER']);
  }

  /******* Header Course */
  function actionHeaderCourse(){
    $data = $this->M_Settings->get();

    $config['upload_path'] = './uploads/settings';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
    if($this->upload->do_upload('img')){
      if(@$data->header_img != NULL){
        @unlink('./uploads/settings/' . @$data->header_img);
      }

      $data = $this->upload->data();
      $filename = $data['file_name'];
    }else{
			$filename = $data->header_img;
		}

    $dataUpdate = [
      'header_img' => $filename,
      'header_judul' => $this->input->post('header_judul', TRUE),
      'header_desc' => $this->input->post('header_desc', TRUE)
    ];
    $this->db->where('id', 1)->update('setting', $dataUpdate);
    if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}

    $this->session->set_flashdata('is_daftar_course', TRUE);
		redirect($_SERVER['HTTP_REFERER']);
  }

  /******* Header Profil */
  function actionHeaderProfil(){
    $dataUpdate = [
      'profil_header_judul' => $this->input->post('profil_header_judul', TRUE),
      'profil_hader_desc' => $this->input->post('profil_hader_desc', TRUE)
    ];
    $this->db->where('id', 1)->update('setting', $dataUpdate);
    if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    
		$this->session->set_flashdata('is_profil', TRUE);
		redirect($_SERVER['HTTP_REFERER']);
  }

  /******* Header Kelas Saya */
  function actionHeaderMyClass(){
    $dataUpdate = [
      'kelas_header_judul' => $this->input->post('kelas_header_judul', TRUE),
      'kelas_header_desc' => $this->input->post('kelas_header_desc', TRUE)
    ];
    $this->db->where('id', 1)->update('setting', $dataUpdate);
    if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    
		$this->session->set_flashdata('is_kelas_saya', TRUE);
		redirect($_SERVER['HTTP_REFERER']);
  }

  /******* Header Detail Learning Course */
  function actionHeaderDetailLearning(){
    $dataUpdate = [
      'learning_header_judul' => $this->input->post('learning_header_judul', TRUE),
      'lerning_header_desc' => $this->input->post('lerning_header_desc', TRUE)
    ];
    $this->db->where('id', 1)->update('setting', $dataUpdate);
    if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
    
		$this->session->set_flashdata('is_detail_learning', TRUE);
		redirect($_SERVER['HTTP_REFERER']);
  }

  /******* Footer Summary */
  function actionFooterSummary(){
    $dataUpdate = [
      'summary_footer_judul' => $this->input->post('summary_footer_judul', TRUE),
      'summary_footer_desc' => $this->input->post('summary_footer_desc', TRUE)
    ];
    $this->db->where('id', 1)->update('setting', $dataUpdate);
    if($this->db->affected_rows() > 0){
      $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
    }else{
      $this->session->set_flashdata('error', "Data Gagal Di Simpan");
    }
    
    $this->session->set_flashdata('is_summary', TRUE);
    redirect($_SERVER['HTTP_REFERER']);
  }

  /******* Footer Social Media */
  function actionFooterSocialMedia(){
    $dataUpdate = [
      'footer_desc_sosmed' => $this->input->post('footer_desc_sosmed', TRUE),
      'fb_username' => $this->input->post('fb_username', TRUE),
      'fb_link' => $this->input->post('fb_link', TRUE),
      'ig_username' => $this->input->post('ig_username', TRUE),
      'ig_link' => $this->input->post('ig_link', TRUE),
      'yt_username' => $this->input->post('yt_username', TRUE),
      'yt_link' => $this->input->post('yt_link', TRUE),
      'tt_username' => $this->input->post('tt_username', TRUE),
      'tt_link' => $this->input->post('tt_link', TRUE),
      'tw_username' => $this->input->post('tw_username', TRUE),
      'tw_link' => $this->input->post('tw_link', TRUE),
    ];
    $this->db->where('id', 1)->update('setting', $dataUpdate);
    if($this->db->affected_rows() > 0){
      $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
    }else{
      $this->session->set_flashdata('error', "Data Gagal Di Simpan");
    }
    
    $this->session->set_flashdata('is_sosmed', TRUE);
    redirect($_SERVER['HTTP_REFERER']);
  }

  /******* Footer Alamat */
  function actionFooterAlamat(){
    $dataUpdate = [
      'alamat_judul' => $this->input->post('alamat_judul', TRUE),
      'alamat_1' => $this->input->post('alamat_1', TRUE),
      'alamat_2' => $this->input->post('alamat_2', TRUE),
      'telefon' => $this->input->post('telefon', TRUE),
      'fax' => $this->input->post('fax', TRUE),
      'email' => $this->input->post('email', TRUE)
    ];
    $this->db->where('id', 1)->update('setting', $dataUpdate);
    if($this->db->affected_rows() > 0){
      $this->session->set_flashdata('success', "Data Berhasil Di Simpan");
    }else{
      $this->session->set_flashdata('error', "Data Gagal Di Simpan");
    }
    
    $this->session->set_flashdata('is_alamat', TRUE);
    redirect($_SERVER['HTTP_REFERER']);
  }
}   