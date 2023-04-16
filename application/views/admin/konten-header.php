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
                                    <a href="#v-pills-header-course" data-toggle="pill" class="nav-link active">Header Course</a>
                                    <a href="#v-pills-partner" data-toggle="pill" class="nav-link">Logo Partner</a>
                                    <a href="#v-pills-benefit" data-toggle="pill" class="nav-link">Benefit</a>
                                    <a href="#v-pills-course" data-toggle="pill" class="nav-link">Course</a>
                                    <a href="#v-pills-testimoni" data-toggle="pill" class="nav-link">Testimoni</a>
                                    <a href="#v-pills-tutor" data-toggle="pill" class="nav-link">Tutor CTA</a>
                                </div>
                            </div>
                            <div class="col-xl-9 border-left">
                                <div class="tab-content">
                                    <div id="v-pills-header-course" class="tab-pane fade active show">
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                            </div>
                                            <div class="d-flex mb-3">
                                                <a href="<?= site_url('/course')?>" target="_blank" type="button" class="btn btn-outline-primary btn-sm text-nowrap"> <i class="fas fa-eye mr-2"></i>Lihat Halaman</a>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-7 col-12">
                                                
                                                <form action="#" method="POST">
        
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Gambar Header</label>
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
                                                        <label class="text-black font-w500">Judul Header</label>
                                                        <input name="judulCourse" type="text" class="form-control" required>
                                                    </div>
        
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Deskripsi Header</label>
                                                        <input name="deskripsiCourse" type="text" class="form-control" required>
                                                    </div>
        
                                                    <div class="form-group mb-0 text-right">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
        
                                                </form>
                                            </div>

                                            <div class="col-lg-5 col-12 order-lg-2 order-1">
                                                    <div class="card-media mb-4">
                                                        <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100 rounded" id="image-preview">
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                    </div>
                                    <div id="v-pills-partner" class="tab-pane fade">
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                                <h6 class="fs-16 text-black font-w600 mb-0">3 Total Konten Logo Partner</h6>
                                                <span class="fs-14">Berdasarkan preferensi anda</span>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <button type="button" class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#tambahPartner">+ Logo</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="example2" class="table card-table display dataTablesCard">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="text-center">No</th>
                                                        <th>Logo</th>
                                                        <th width="10%" class="text-center">Status</th>
                                                        <th width="15%" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="#">
                                                        <td class="text-center">1</td>
                                                        <td class="d-flex">
                                                            <div class="card-media">
                                                                <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="mr-3 rounded" style="width: 100px;" id="image-preview">
                                                            </div>
                                                            <div>
                                                                <p class="text-wrap font-weight-bold mb-0">House Of Tax</p>
                                                                <p>Link: <a href="http://localhost/lingkar-edukasi/">http://localhost/lingkar-edukasi/</a></p>
                                                            </div>
                                                            
                                                        </td>
                                                        <td><button type="button" class="btn btn-sm btn-block text-default disabled btn-success">Aktif</button></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0 btn-edit" data-id="#" data-toggle="modal" data-target="#tambahBanner"><i class="fa fa-pencil"></i></button>
                                                            <button class="btn btn-danger btn-sm dark ml-0 px-2 py-1 mr-0 btn-remove" data-id="#"><i class="la la-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="v-pills-benefit" class="tab-pane fade">
                                        
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                                <h6 class="fs-16 text-black font-w600 mb-0">3 Total Konten Benefit</h6>
                                                <span class="fs-14">Berdasarkan preferensi anda</span>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <button type="button" class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#tambahBenefit">+ Benefit</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="example2" class="table card-table display dataTablesCard">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="text-center">No</th>
                                                        <th>Benefit</th>
                                                        <th width="10%" class="text-center">Status</th>
                                                        <th width="15%" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="#">
                                                        <td class="text-center">1</td>
                                                        <td class="d-flex">
                                                            <div class="card-media">
                                                                <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="mr-3 rounded" style="width: 100px;" id="image-preview">
                                                            </div>
                                                            <div>
                                                                <p class="text-wrap font-weight-bold mb-0">Benefit 1</p>
                                                                <p class="text-wrap font-weight-normal mb-0">Deskripsi benefit utama</p>
                                                                <p class="text-wrap font-weight-normal mb-0">Benefit lanjutan yang ada di hover bawah</p>
                                                            </div>
                                                            
                                                        </td>
                                                        <td><button type="button" class="btn btn-sm btn-block text-default disabled btn-success">Aktif</button></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0 btn-edit" data-id="#" data-toggle="modal" data-target="#tambahBanner"><i class="fa fa-pencil"></i></button>
                                                            <button class="btn btn-danger btn-sm dark ml-0 px-2 py-1 mr-0 btn-remove" data-id="#"><i class="la la-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="v-pills-course" class="tab-pane fade">
                                        
                                        <form action="#" method="POST">

                                            <div class="form-group">
                                                <label class="text-black font-w500">Judul Section Course</label>
                                                <input name="judulCourse" type="text" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="text-black font-w500">Deskripsi Section Course</label>
                                                <input name="deskripsiCourse" type="text" class="form-control" required>
                                            </div>

                                            <div class="form-group mb-0 text-right">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>

                                        </form>
                                    
                                    </div>
                                    <div id="v-pills-testimoni" class="tab-pane fade">
                                        
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                                <h6 class="fs-16 text-black font-w600 mb-0">3 Total Konten Testimoni</h6>
                                                <span class="fs-14">Berdasarkan preferensi anda</span>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <button type="button" class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#tambahTestimoni">+ Testimoni</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="example2" class="table card-table display dataTablesCard">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="text-center">No</th>
                                                        <th>Testimoni</th>
                                                        <th width="10%" class="text-center">Status</th>
                                                        <th width="15%" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="#">
                                                        <td class="text-center">1</td>
                                                        <td class="d-flex">
                                                            <div class="card-media">
                                                                <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="mr-3 rounded" style="width: 100px;" id="image-preview">
                                                            </div>
                                                            <div>
                                                                <p class="text-wrap font-weight-bold mb-0">Testimoni</p>
                                                                <p class="text-wrap font-weight-normal mb-0">Nama</p>
                                                                <p class="text-wrap font-weight-normal mb-0">Kelas yang diambil</p>
                                                            </div>
                                                            
                                                        </td>
                                                        <td><button type="button" class="btn btn-sm btn-block text-default disabled btn-success">Aktif</button></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0 btn-edit" data-id="#" data-toggle="modal" data-target="#tambahBanner"><i class="fa fa-pencil"></i></button>
                                                            <button class="btn btn-danger btn-sm dark ml-0 px-2 py-1 mr-0 btn-remove" data-id="#"><i class="la la-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div id="v-pills-tutor" class="tab-pane fade">
                                        
                                        <form action="#" method="POST">

                                            <div class="row">

                                                <div class="col-lg-7 col-12 order-lg-1 order-2">
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Gambar Section Tutor</label>
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
                                                        <label class="text-black font-w500">Judul</label>
                                                        <input name="judulTutor" type="text" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Deskripsi</label>
                                                        <input name="deskripsiTutor" type="text" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Text Tombol</label>
                                                        <input name="textTombolTutor" type="text" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Link Tombol</label>
                                                        <input name="linkTombolTutor" type="text" class="form-control" required>
                                                    </div>

                                                </div>

                                                <div class="col-lg-5 col-12 order-lg-2 order-1">
                                                    <div class="card-media mb-4">
                                                        <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100 rounded" id="image-preview">
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

