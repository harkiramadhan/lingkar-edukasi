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
                                    <a href="#v-pills-sertifikat" data-toggle="pill" class="nav-link">Sertifikat</a>
                                    <!-- <a href="#v-pills-password" data-toggle="pill" class="nav-link">Password</a> -->
                                </div>
                            </div>
                            <div class="col-xl-9 border-left">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="tab-content">
                                            <div id="v-pills-profil-admin" class="tab-pane fade active show">
                                                <div class="row">
                                                    <div class="col-lg-7 col-12">
                                                        <form action="<?= site_url('admin/pengaturan/action/' . $user->id) ?>" method="POST">
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
                                                                <label class="text-black font-w500">Nama Lengkap</label>
                                                                <input name="nama" type="text" class="form-control" value="<?= $user->nama ?>">
                                                            </div>
                
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Email Aktif</label>
                                                                <input name="email" type="text" class="form-control" value="<?= $user->email ?>">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">No HP</label>
                                                                <input name="nohp" type="text" class="form-control" value="<?= $user->nohp ?>">
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Jenis Kelamin</label>
                                                                <select class="form-control default-select" id="sel1" tabindex="-98" name="jenkel">
                                                                    <option selected disabled>Pilih</option>
                                                                    <option value="L" <?= ($user->jenkel == 'L') ? 'selected' : '' ?>>Laki - laki</option>
                                                                    <option value="P" <?= ($user->jenkel == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                                                </select>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Pendidikan Terahir</label>
                                                                <select class="form-control default-select" id="sel1" tabindex="-98" name="pendidikan">
                                                                    <option selected disabled>Pilih</option>
                                                                    <option value="SMP" <?= ($user->pendidikan == 'SMP') ? 'selected' : '' ?>>SMP</option>
                                                                    <option value="SMA" <?= ($user->pendidikan == 'SMA') ? 'selected' : '' ?>>SMA</option>
                                                                    <option value="D3" <?= ($user->pendidikan == 'D3') ? 'selected' : '' ?>>D3</option>
                                                                    <option value="S1" <?= ($user->pendidikan == 'S1') ? 'selected' : '' ?>>S1</option>
                                                                    <option value="S2" <?= ($user->pendidikan == 'S2') ? 'selected' : '' ?>>S2</option>
                                                                </select>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Tanggal Lahir</label>
                                                                <input name="tgll" type="date" class="form-control" value="<?= $user->tgll ?>">
                                                            </div>
        
                                                            <div class="form-group mb-0 text-right">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                
                                                        </form>
                                                    </div>
                                                    <div class="col-lg-5 col-12 order-lg-2 order-1">
                                                        <div class="card-media mb-4">
                                                                <img src="http://localhost/lingkar-edukasi/assets/admin/images/placeholder-image.svg" alt="" class="w-100 rounded" id="image-preview">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="v-pills-password" class="tab-pane fade">
                                                <div class="row">
                                                    <div class="col-lg-12 col-12">
                                                        <form action="<?= site_url('admin/pengaturan/actionPassword/' . $user->id) ?>" method="POST">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Password Lama</label>
                                                                <input name="old_pwd" type="password" class="form-control" required>
                                                            </div>
                
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Password Baru</label>
                                                                <input name="new_pwd" type="password" class="form-control" required>
                                                            </div>
                
                                                            <div class="form-group mb-0 text-right">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="v-pills-sertifikat" class="tab-pane fade">
                                                <div class="row">
                                                    <div class="col-lg-7 col-12 order-lg-1 order-2">
                                                        <form action="<?= site_url('admin/pengaturan/action/' . $user->id) ?>" method="POST">
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Latar Belakang Sertifikat</label>
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
                                                                <label class="text-black font-w500">Tanda Tangan Sertifikat</label>
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
                                                                <label class="text-black font-w500">Nama Tanda Tangan</label>
                                                                <input name="text" type="text" class="form-control" value="<?= $user->nama ?>">
                                                            </div>
                
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Jabatan Tanda Tangan</label>
                                                                <input name="text" type="text" class="form-control" value="<?= $user->email ?>">
                                                            </div>
        
                                                            <div class="form-group mb-0 text-right">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                
                                                        </form>
                                                    </div>
                                                    <div class="col-lg-5 col-12 order-lg-2 order-1">
                                                        <div class="form-group mb-2">
                                                            <label class="text-black font-w500">Preview Latar Belakang</label>
                                                        </div>
                                                        <div class="card-media mb-4">
                                                            <img src="http://localhost/lingkar-edukasi/assets/admin/images/placeholder-image.svg" alt="" class="w-100 rounded" id="image-preview">
                                                        </div>

                                                        <div class="form-group mb-2">
                                                            <label class="text-black font-w500">Preview Tanda Tangan</label>
                                                        </div>
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
            </div>
        </div>
    </div>
</div>