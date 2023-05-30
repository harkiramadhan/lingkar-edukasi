<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="page-titles m-2 px-0 pt-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Konten Halaman</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Landing Page</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengaturan Konten Landing Page</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="nav flex-column nav-pills mb-3">
                                    <a href="#v-pills-banner" data-toggle="pill" class="nav-link <?= ($this->session->flashdata('is_banner') ? 'active' : (($this->session->flashdata('is_logo') != TRUE && $this->session->flashdata('is_benefit') != TRUE && $this->session->flashdata('is_course') != TRUE && $this->session->flashdata('is_testimoni') != TRUE && $this->session->flashdata('is_tutor_cta') != TRUE) ? 'active' : '')) ?>">Banner</a>
                                    <a href="#v-pills-partner" data-toggle="pill" class="nav-link <?= ($this->session->flashdata('is_logo')) ? 'active' : '' ?>">Logo Partner</a>
                                    <a href="#v-pills-benefit" data-toggle="pill" class="nav-link <?= ($this->session->flashdata('is_benefit')) ? 'active' : '' ?>">Benefit</a>
                                    <a href="#v-pills-course" data-toggle="pill" class="nav-link <?= ($this->session->flashdata('is_course')) ? 'active' : '' ?>">Course</a>
                                    <a href="#v-pills-testimoni" data-toggle="pill" class="nav-link <?= ($this->session->flashdata('is_testimoni')) ? 'active' : '' ?>">Testimoni</a>
                                    <a href="#v-pills-tutor" data-toggle="pill" class="nav-link <?= ($this->session->flashdata('is_tutor_cta')) ? 'active' : '' ?>">Tutor CTA</a>
                                </div>
                            </div>
                            <div class="col-xl-9 border-left">
                                <div class="tab-content">
                                    <div id="v-pills-banner" class="tab-pane fade <?= ($this->session->flashdata('is_banner') ? 'active show' : (($this->session->flashdata('is_logo') != TRUE && $this->session->flashdata('is_benefit') != TRUE && $this->session->flashdata('is_course') != TRUE && $this->session->flashdata('is_testimoni') != TRUE && $this->session->flashdata('is_tutor_cta') != TRUE) ? 'active show' : '')) ?>">
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                                <h6 class="fs-16 text-black font-w600 mb-0"><?= $banners->num_rows() ?> Total Konten Banner</h6>
                                                <span class="fs-14">Berdasarkan preferensi anda</span>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <button type="button" class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#tambahBanner">+ Banner</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="table-banner" class="table card-table display dataTablesCard">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="text-center">No</th>
                                                        <th>Banner</th>
                                                        <th width="10%" class="text-center">Status</th>
                                                        <th width="15%" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $noB = 1;
                                                    foreach($banners->result() as $rowB){ ?>
                                                    <tr id="data-banner-<?= $rowB->id ?>">
                                                        <td class="text-center"><?= $noB++ ?></td>
                                                        <td class="d-flex">
                                                            <div class="card-media">
                                                                <img src="<?= base_url('uploads/banners/' . $rowB->img) ?>" alt="" class="mr-3 rounded" style="width: 100px;">
                                                            </div>
                                                            <div>
                                                                <p class="text-wrap font-weight-bold mb-0"><?= $rowB->judul ?></p>
                                                                <p class="text-wrap font-weight-normal mb-0"><?= $rowB->deskripsi ?></p>
                                                                <p>Link: <a href="<?= $rowB->link ?>" target="__BLANK"><?= $rowB->link ?></a></p>
                                                            </div>
                                                            
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-block text-default disabled <?= ($rowB->status == 1) ? 'btn-success' : 'btn-danger' ?>" disabled><?= ($rowB->status == 1) ? 'Aktif' : 'Tidak Aktif' ?></button>
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0 btn-edit-banner" data-id="<?= $rowB->id ?>"><i class="fa fa-pencil"></i></button>
                                                            <button class="btn btn-danger btn-sm dark ml-0 px-2 py-1 mr-0 btn-remove-banner" data-id="<?= $rowB->id ?>"><i class="la la-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="v-pills-partner" class="tab-pane fade <?= ($this->session->flashdata('is_logo')) ? 'active show' : '' ?>">
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                                <h6 class="fs-16 text-black font-w600 mb-0"><?= $partners->num_rows() ?> Total Konten Logo Partner</h6>
                                                <span class="fs-14">Berdasarkan preferensi anda</span>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <button type="button" class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#tambahPartner">+ Logo</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="table-logo" class="table card-table display dataTablesCard">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="text-center">No</th>
                                                        <th>Logo</th>
                                                        <th width="10%" class="text-center">Status</th>
                                                        <th width="15%" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $noP = 1;
                                                        foreach($partners->result() as $rowP){ 
                                                    ?>
                                                        <tr id="data-partner-<?= $rowP->id ?>">
                                                            <td class="text-center"><?= $noP++ ?></td>
                                                            <td class="d-flex">
                                                                <div class="card-media">
                                                                    <img src="<?= base_url('uploads/partner/' . $rowP->img) ?>" alt="" class="mr-3 rounded" style="width: 100px;">
                                                                </div>
                                                                <div>
                                                                    <p class="text-wrap font-weight-bold mb-0"><?= $rowP->judul ?></p>
                                                                    <p>Link: <a href="<?= $rowP->link ?>" target="__BLANK"><?= $rowP->link ?></a></p>
                                                                </div>
                                                                
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-block text-default disabled <?= ($rowP->status == 1) ? 'btn-success' : 'btn-danger' ?>" disabled><?= ($rowP->status == 1) ? 'Aktif' : 'Tidak Aktif' ?></button>
                                                            </td>
                                                            <td class="text-center">
                                                                <button class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0 btn-edit-partner" data-id="<?= $rowP->id ?>"><i class="fa fa-pencil"></i></button>
                                                                <button class="btn btn-danger btn-sm dark ml-0 px-2 py-1 mr-0 btn-remove-partner" data-id="<?= $rowP->id ?>"><i class="la la-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="v-pills-benefit" class="tab-pane fade <?= ($this->session->flashdata('is_benefit')) ? 'active show' : '' ?>">
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                                <h6 class="fs-16 text-black font-w600 mb-0"><?= $benefit->num_rows() ?> Total Konten Benefit</h6>
                                                <span class="fs-14">Berdasarkan preferensi anda</span>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <button type="button" class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#tambahBenefit">+ Benefit</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="table-benefit" class="table card-table display dataTablesCard">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="text-center">No</th>
                                                        <th>Benefit</th>
                                                        <th width="10%" class="text-center">Status</th>
                                                        <th width="15%" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $noBn = 1;
                                                        foreach($benefit->result() as $rowBn){ 
                                                    ?>
                                                    <tr id="data-benefit-<?= $rowBn->id ?>">
                                                        <td class="text-center"><?= $noBn++ ?></td>
                                                        <td class="d-flex">
                                                            <div class="card-media">
                                                                <img src="<?= base_url('uploads/benefit/' . $rowBn->img) ?>" alt="" class="mr-3 rounded" style="width: 100px;">
                                                            </div>
                                                            <div>
                                                                <p class="text-wrap font-weight-bold mb-0"><?= $rowBn->benefit ?></p>
                                                                <p class="text-wrap font-weight-normal mb-0"><?= $rowBn->deskripsi ?></p>
                                                                <p class="text-wrap font-weight-normal mb-0"><?= $rowBn->text ?></p>
                                                            </div>
                                                            
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-block text-default disabled <?= ($rowBn->status == 1) ? 'btn-success' : 'btn-danger' ?>" disabled><?= ($rowBn->status == 1) ? 'Aktif' : 'Tidak Aktif' ?></button>
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0 btn-edit-benefit" data-id="<?= $rowBn->id ?>"><i class="fa fa-pencil"></i></button>
                                                            <button class="btn btn-danger btn-sm dark ml-0 px-2 py-1 mr-0 btn-remove-benefit" data-id="<?= $rowBn->id ?>"><i class="la la-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="v-pills-course" class="tab-pane fade <?= ($this->session->flashdata('is_course')) ? 'active show' : '' ?>">
                                        
                                        <form action="<?= site_url('admin/konten/actionCourse') ?>" method="POST">
                                            <div class="form-group">
                                                <label class="text-black font-w500">Judul Section Course</label>
                                                <input name="judul_section_course" type="text" class="form-control" value="<?= @$course->judul_section_course ?>">
                                            </div>

                                            <div class="form-group">
                                                <label class="text-black font-w500">Deskripsi Section Course</label>
                                                <input name="deskripsi_section_course" type="text" class="form-control" value="<?= @$course->deskripsi_section_course ?>">
                                            </div>

                                            <div class="form-group mb-0 text-right">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div id="v-pills-testimoni" class="tab-pane fade <?= ($this->session->flashdata('is_testimoni')) ? 'active show' : '' ?>">
                                        
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                                <h6 class="fs-16 text-black font-w600 mb-0"><?= $testimoni->num_rows() ?> Total Konten Testimoni</h6>
                                                <span class="fs-14">Berdasarkan preferensi anda</span>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <button type="button" class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#tambahTestimoni">+ Testimoni</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="table-testimoni" class="table card-table display dataTablesCard">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="text-center">No</th>
                                                        <th>Testimoni</th>
                                                        <th width="10%" class="text-center">Status</th>
                                                        <th width="15%" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $noT = 1;
                                                        foreach($testimoni->result() as $rowT){ 
                                                    ?>
                                                    <tr id="data-testimoni-<?= $rowT->id ?>">
                                                        <td class="text-center"><?= $noT++ ?></td>
                                                        <td class="d-flex">
                                                            <div class="card-media">
                                                                <img src="<?= base_url('uploads/testimoni/' . $rowT->img) ?>" alt="" class="mr-3 rounded" style="width: 100px;">
                                                            </div>
                                                            <div>
                                                                <p class="text-wrap font-weight-bold mb-0"><?= $rowT->testimoni ?></p>
                                                                <p class="text-wrap font-weight-normal mb-0"><?= $rowT->testimoni ?></p>
                                                                <p class="text-wrap font-weight-normal mb-0"><?= $rowT->kelas ?></p>
                                                            </div>
                                                            
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-block text-default disabled <?= ($rowT->status == 1) ? 'btn-success' : 'btn-danger' ?>" disabled><?= ($rowT->status == 1) ? 'Aktif' : 'Tidak Aktif' ?></button>
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0 btn-edit-testimoni" data-id="<?= $rowT->id ?>"><i class="fa fa-pencil"></i></button>
                                                            <button class="btn btn-danger btn-sm dark ml-0 px-2 py-1 mr-0 btn-remove-testimoni" data-id="<?= $rowT->id ?>"><i class="la la-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div id="v-pills-tutor" class="tab-pane fade <?= ($this->session->flashdata('is_tutor_cta')) ? 'active show' : '' ?>">
                                        
                                        <form action="<?= site_url('admin/konten/actionCTA') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-7 col-12 order-lg-1 order-2">
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Gambar Section Tutor</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Upload</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="img" id="image-source5" onchange="previewImage5()">
                                                                <label class="custom-file-label">Pilih</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Judul</label>
                                                        <input name="cta_judul" type="text" class="form-control" value="<?= @$tutor->cta_judul ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Deskripsi</label>
                                                        <input name="cta_desc" type="text" class="form-control" value="<?= @$tutor->cta_desc ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Text Tombol</label>
                                                        <input name="cta_btn_text" type="text" class="form-control" value="<?= @$tutor->cta_btn_text ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Link Tombol</label>
                                                        <input name="cta_link" type="text" class="form-control" value="<?= @$tutor->cta_link ?>" required>
                                                    </div>

                                                </div>

                                                <div class="col-lg-5 col-12 order-lg-2 order-1">
                                                    <div class="card-media mb-4">
                                                        <?php if(@$tutor->cta_img): ?>
                                                            <img src="<?= base_url('uploads/settings/' . $tutor->cta_img) ?>" alt="" class="w-100 rounded" id="image-preview5">
                                                        <?php else: ?>
                                                            <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100 rounded" id="image-preview5">
                                                        <?php endif; ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 text-right">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah Banner -->
<div class="modal fade" id="tambahBanner">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Konten Banner</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/konten/createBanner') ?>" method="POST" enctype="multipart/form-data">

                    <div class="row">

                        <div class="col-lg-7 col-12 order-lg-1 order-2">
                            <div class="form-group">
                                <label class="text-black font-w500">Gambar Banner</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="img" id="image-source" onchange="previewImage()" required>
                                        <label class="custom-file-label">Pilih</label>
                                    </div>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Judul Banner</label>
                                <input name="judul" type="text" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Deskripsi Banner</label>
                                <input name="deskripsi" type="text" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Text Tombol</label>
                                <input name="text" type="text" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Link Tombol</label>
                                <input name="link" type="text" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="text-black font-w500">Status</label>
                                <select name="status" class="form-control default-select" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-5 col-12 order-lg-2 order-1">
                            <div class="card-media mb-4">
                                <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100 rounded" id="image-preview">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Model Tambah Logo Partner -->
<div class="modal fade" id="tambahPartner">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Konten Logo Partner</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/konten/createPartner') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-7 col-12 order-lg-1 order-2">
                            <div class="form-group">
                                <label class="text-black font-w500">Logo Partner</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="img" id="image-source2" onchange="previewImage2()" required>
                                        <label class="custom-file-label">Pilih</label>
                                    </div>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Nama Partner</label>
                                <input name="judul" type="text" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Link Partner</label>
                                <input name="link" type="text" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="text-black font-w500">Status</label>
                                <select name="status" class="form-control default-select" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-5 col-12 order-lg-2 order-1">
                            <div class="card-media mb-4">
                                <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100 rounded" id="image-preview2">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>

				</form>
			</div>
		</div>
	</div>
</div>

<!-- Model Tambah Benefit -->
<div class="modal fade" id="tambahBenefit">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Konten Benefit</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/konten/createBenefit') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-7 col-12 order-lg-1 order-2">
                            <div class="form-group">
                                <label class="text-black font-w500">Logo Benefit</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="img" id="image-source3" onchange="previewImage3()" required>
                                        <label class="custom-file-label">Pilih</label>
                                    </div>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Benefit</label>
                                <input name="benefit" type="text" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Deskripsi Benefit</label>
                                <input name="deskripsi" type="text" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Deskripsi Tambahan</label>
                                <input name="text" type="text" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="text-black font-w500">Status</label>
                                <select name="status" class="form-control default-select" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
        
                        </div>
                        
                        <div class="col-lg-5 col-12 order-lg-2 order-1">
                            <div class="card-media mb-4">
                                <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100 rounded" id="image-preview3">
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Model Tambah Testimoni -->
<div class="modal fade" id="tambahTestimoni">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Konten Testimoni</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/konten/createTestimoni') ?>" method="POST" enctype="multipart/form-data">

                    <div class="row">

                        <div class="col-lg-7 col-12 order-lg-1 order-2">
                            <div class="form-group">
                                <label class="text-black font-w500">Foto Profil</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="img" id="image-source4" onchange="previewImage4()" required>
                                        <label class="custom-file-label">Pilih</label>
                                    </div>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Testimoni Peserta</label>
                                <input name="testimoni" type="text" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Nama Peserta</label>
                                <input name="nama" type="text" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label class="text-black font-w500">Kelas</label>
                                <input name="kelas" type="text" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="text-black font-w500">Status</label>
                                <select name="status" class="form-control default-select" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
        
                        </div>
                        
                        <div class="col-lg-5 col-12 order-lg-2 order-1">
                            <div class="card-media mb-4">
                                <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100 rounded" id="image-preview4">
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>

				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content edit-content">
			
		</div>
	</div>
</div>