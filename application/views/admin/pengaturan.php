<div class="content-body" style="min-height: 1070px;">
    <!-- row -->
    <div class="container-fluid">

        <div class="page-titles m-2 px-0 pt-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/lingkar-edukasi/admin"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pengaturan</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengaturan Profil & Password Admin</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="nav flex-column nav-pills mb-3">
                                    <a href="#v-pills-profil-admin" data-toggle="pill" class="nav-link active">Profil Admin</a>
                                    <a href="#v-pills-password" data-toggle="pill" class="nav-link">Password</a>
                                </div>
                            </div>
                            <div class="col-xl-9 border-left">
                                <div class="row">
                                    <div class="col-lg-7 col-12">
                                        <div class="tab-content">
                                            <div id="v-pills-profil-admin" class="tab-pane fade active show">
                                                <div class="row">
                                                    <div class="col-lg-12 col-12">
                                                        <form action="http://localhost/lingkar-edukasi/admin/konten/actionHeaderProfil" method="POST">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Nama Lengkap</label>
                                                                <input name="profil_header_judul" type="text" class="form-control" value="">
                                                            </div>
                
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Email Aktif</label>
                                                                <input name="profil_hader_desc" type="text" class="form-control" value="">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">No HP</label>
                                                                <input name="profil_hader_desc" type="text" class="form-control" value="">
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Jenis Kelamin</label>
                                                                <select class="form-control default-select" id="sel1" tabindex="-98">
                                                                    <option selected disabled>Pilih</option>
                                                                    <option>Laki - laki</option>
                                                                    <option>Perempuan</option>
                                                                </select>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Pendidikan Terahir</label>
                                                                <select class="form-control default-select" id="sel1" tabindex="-98">
                                                                    <option selected disabled>Pilih</option>
                                                                    <option>S1</option>
                                                                    <option>S2</option>
                                                                </select>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Tanggal Lahir</label>
                                                                <input name="profil_hader_desc" type="date" class="form-control" value="">
                                                            </div>
        
                                                            <div class="form-group mb-0 text-right">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="v-pills-password" class="tab-pane fade">
                                                <div class="row">
                                                    <div class="col-lg-12 col-12">
                                                        <form action="http://localhost/lingkar-edukasi/admin/konten/actionHeaderProfil" method="POST">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Password Lama</label>
                                                                <input name="profil_header_judul" type="password" class="form-control" value="">
                                                            </div>
                
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Password Baru</label>
                                                                <input name="profil_hader_desc" type="password" class="form-control" value="">
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
                                    <div class="col-lg-5 col-12 order-lg-2 order-1">
                                        <div class="card-media mb-4">
                                                <img src="http://localhost/lingkar-edukasi/assets/admin/images/placeholder-image.svg" alt="" class="w-100 rounded" id="image-preview">
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