        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

				<div class="page-titles m-0 px-0 pt-0">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Course</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Course Baru</a></li>
					</ol>
                </div>

				<div class="row">
                    <div class="col-xl-8 order-lg-1 order-2">
                        <div class="card event-detail-bx overflow-hidden">
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Judul Course</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Judul">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Harga</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Harga">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Discount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Discount">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Pemateri</label>
                                            <div class="col-sm-9">
                                                <select id="single-select" class="form-control">
                                                    <option selected disabled>Pilih</option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="WY">Wyoming</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select id="single-select2" class="form-control">
                                                    <option selected disabled>Pilih</option>
                                                    <option value="">Draft</option>
                                                    <option value="">Aktif</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Level</label>
                                            <div class="col-sm-9">
                                                <select id="single-level" class="form-control">
                                                    <option selected disabled>Pilih</option>
                                                    <option value="">Beginner</option>
                                                    <option value="">Medium</option>
                                                    <option value="">Advanced</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Label</label>
                                            <div class="col-sm-9">
                                            
                                                <select class="multi-label" name="states[]" multiple="multiple">
                                                    <option value="">Ekonomi</option>
                                                    <option value="">Pajak</option>
                                                </select>

                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Benefit</label>
                                            <div class="col-sm-9">
                                            
                                                <select class="multi-select" name="states[]" multiple="multiple">
                                                    <option value="">Akses Selamanya</option>
                                                    <option value="">Sertifikat Lingkar Edukasi</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                                            <div class="col-sm-9">
                                                <div class="summernote"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Gambar Cover</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input">
                                                    <label class="custom-file-label">Pilih</label>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" class="btn btn-dark mr-2">Batal</button>
                                            <button type="button" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 order-lg-2 order-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-xl-12">
								<div class="card event-detail-bx overflow-hidden">
									<div class="card-media">
										<img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100">
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