<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="page-titles m-2 px-0 pt-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Konten Halaman</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Header Halaman</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengaturan Konten Header Halaman</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="nav flex-column nav-pills mb-3">
                                    <a href="#v-pills-header-course" data-toggle="pill" class="nav-link <?= ($this->session->flashdata('is_daftar_course')) ? 'active' : (($this->session->flashdata('is_profil') != TRUE && $this->session->flashdata('is_kelas_saya') != TRUE && $this->session->flashdata('is_detail_learning') != TRUE) ? 'active' : '') ?>">Daftar Course</a>
                                    <a href="#v-pills-profil" data-toggle="pill" class="nav-link <?= ($this->session->flashdata('is_profil')) ? 'active' : '' ?>">Profil</a>
                                    <a href="#v-pills-kelas-saya" data-toggle="pill" class="nav-link <?= ($this->session->flashdata('is_kelas_saya')) ? 'active' : '' ?>">Kelas Saya</a>
                                    <a href="#v-pills-detail-learning-course" data-toggle="pill" class="nav-link <?= ($this->session->flashdata('is_detail_learning')) ? 'active' : '' ?>">Detail Learning Course</a>
                                </div>
                            </div>
                            <div class="col-xl-9 border-left">
                                <div class="tab-content">
                                    <div id="v-pills-header-course" class="tab-pane fade <?= ($this->session->flashdata('is_daftar_course')) ? 'active show' : (($this->session->flashdata('is_profil') != TRUE && $this->session->flashdata('is_kelas_saya') != TRUE && $this->session->flashdata('is_detail_learning') != TRUE) ? 'active show' : '') ?>">
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                            </div>
                                            <div class="d-flex mb-3">
                                                <a href="<?= site_url('/course')?>" target="_blank" type="button" class="btn btn-outline-primary btn-sm text-nowrap"> <i class="fas fa-eye mr-2"></i>Lihat Halaman</a>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-7 col-12">
                                                <form action="<?= site_url('admin/konten/actionHeaderCourse') ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Gambar Header</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Upload</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="img" id="image-source" onchange="previewImage()">
                                                                <label class="custom-file-label">Pilih</label>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Judul Header</label>
                                                        <input name="header_judul" type="text" class="form-control" value="<?= @$setting->header_judul ?>">
                                                    </div>
        
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Deskripsi Header</label>
                                                        <input name="header_desc" type="text" class="form-control" value="<?= @$setting->header_desc ?>">
                                                    </div>
        
                                                    <div class="form-group mb-0 text-right">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="col-lg-5 col-12 order-lg-2 order-1">
                                                <div class="card-media mb-4">
                                                    <?php if(@$setting->header_img): ?>
                                                        <img src="<?= base_url('uploads/settings/' . @$setting->header_img ) ?>" alt="" class="w-100 rounded" id="image-preview">
                                                    <?php else: ?>
                                                        <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100 rounded" id="image-preview">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="v-pills-profil" class="tab-pane fade <?= ($this->session->flashdata('is_profil')) ? 'active show' : '' ?>">
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                            </div>
                                            <div class="d-flex mb-3">
                                                <a href="<?= site_url('/course')?>" target="_blank" type="button" class="btn btn-outline-primary btn-sm text-nowrap"> <i class="fas fa-eye mr-2"></i>Lihat Halaman</a>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <form action="<?= site_url('admin/konten/actionHeaderProfil') ?>" method="POST">
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Judul Header</label>
                                                        <input name="profil_header_judul" type="text" class="form-control" value="<?= @$setting->profil_header_judul ?>">
                                                    </div>
        
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Deskripsi Header</label>
                                                        <input name="profil_hader_desc" type="text" class="form-control" value="<?= @$setting->profil_hader_desc ?>">
                                                    </div>
        
                                                    <div class="form-group mb-0 text-right">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
        
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="v-pills-kelas-saya" class="tab-pane fade <?= ($this->session->flashdata('is_kelas_saya')) ? 'active show' : '' ?>">
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                            </div>
                                            <div class="d-flex mb-3">
                                                <a href="<?= site_url('/course')?>" target="_blank" type="button" class="btn btn-outline-primary btn-sm text-nowrap"> <i class="fas fa-eye mr-2"></i>Lihat Halaman</a>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <form action="<?= site_url('admin/konten/actionHeaderMyClass') ?>" method="POST">
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Judul Header</label>
                                                        <input name="kelas_header_judul" type="text" class="form-control" value="<?= @$setting->kelas_header_judul ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Deskripsi Header</label>
                                                        <input name="kelas_header_desc" type="text" class="form-control" value="<?= @$setting->kelas_header_desc ?>">
                                                    </div>
                                                    <div class="form-group mb-0 text-right">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="v-pills-detail-learning-course" class="tab-pane fade <?= ($this->session->flashdata('is_detail_learning')) ? 'active show' : '' ?>">
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                            </div>
                                            <div class="d-flex mb-3">
                                                <a href="<?= site_url('/course')?>" target="_blank" type="button" class="btn btn-outline-primary btn-sm text-nowrap"> <i class="fas fa-eye mr-2"></i>Lihat Halaman</a>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <form action="<?= site_url('admin/konten/actionHeaderDetailLearning') ?>" method="POST">
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Judul Header</label>
                                                        <input name="learning_header_judul" type="text" class="form-control" value="<?= @$setting->learning_header_judul ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Deskripsi Header</label>
                                                        <input name="lerning_header_desc" type="text" class="form-control" value="<?= @$setting->lerning_header_desc ?>">
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
    </div>
</div>

