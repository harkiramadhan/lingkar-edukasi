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
                                    <a href="#v-pills-sumary" data-toggle="pill" class="nav-link active">Sumary</a>
                                    <a href="#v-pills-social-media" data-toggle="pill" class="nav-link">Social Media</a>
                                    <a href="#v-pills-alamat" data-toggle="pill" class="nav-link">Alamat & Kontak</a>
                                </div>
                            </div>
                            <div class="col-xl-9 border-left">
                                <div class="tab-content">
                                    <div id="v-pills-sumary" class="tab-pane fade active show">
                                        
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                            </div>
                                            <div class="d-flex mb-3">
                                                <a href="<?= site_url('/course')?>" target="_blank" type="button" class="btn btn-outline-primary btn-sm text-nowrap"> <i class="fas fa-eye mr-2"></i>Lihat Halaman</a>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                
                                                <form action="#" method="POST">
        
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Judul Sumary</label>
                                                        <input name="judulCourse" type="text" class="form-control" required>
                                                    </div>
        
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Deskripsi Sumary</label>
                                                        <textarea class="form-control" rows="4" id="comment"></textarea>
                                                    </div>
        
                                                    <div class="form-group mb-0 text-right">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
        
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="v-pills-social-media" class="tab-pane fade">
                                        
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                            </div>
                                            <div class="d-flex mb-3">
                                                <a href="<?= site_url('/course')?>" target="_blank" type="button" class="btn btn-outline-primary btn-sm text-nowrap"> <i class="fas fa-eye mr-2"></i>Lihat Halaman</a>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                
                                                <form action="#" method="POST">

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Judul Social Media</label>
                                                        <input name="judulCourse" type="text" class="form-control" required>
                                                    </div>
        
                                                    <div class="row">

                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Username Facebook</label>
                                                                <input name="usernameFb" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Link Facebook</label>
                                                                <input name="linkFb" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Username Instagram</label>
                                                                <input name="usernameIg" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Link Instagram</label>
                                                                <input name="linkIg" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Username Youtube</label>
                                                                <input name="usernameYt" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Link Youtube</label>
                                                                <input name="linkYt" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Username Tiktok</label>
                                                                <input name="usernameTik" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Link Tiktok</label>
                                                                <input name="linkTik" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Username Twitter</label>
                                                                <input name="usernameTt" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Link Twitter</label>
                                                                <input name="linkTt" type="text" class="form-control" required>
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
                                    <div id="v-pills-alamat" class="tab-pane fade">
                                        
                                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
                                            <div class="mb-3 mr-3">
                                            </div>
                                            <div class="d-flex mb-3">
                                                <a href="<?= site_url('/course')?>" target="_blank" type="button" class="btn btn-outline-primary btn-sm text-nowrap"> <i class="fas fa-eye mr-2"></i>Lihat Halaman</a>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                
                                                <form action="#" method="POST">
        
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Judul Alamat</label>
                                                        <input name="judulAlamat" type="text" class="form-control" required>
                                                    </div>
        
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Alamat 1</label>
                                                        <textarea class="form-control" rows="4" id="comment"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Alamat 2</label>
                                                        <textarea class="form-control" rows="4" id="comment"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Telfon</label>
                                                        <input name="textTelfon" type="text" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Fax</label>
                                                        <input name="textFax" type="text" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Email</label>
                                                        <input name="textEmail" type="text" class="form-control" required>
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

