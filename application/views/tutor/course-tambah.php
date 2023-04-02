<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="page-titles m-0 px-0 pt-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('tutor') ?>"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?= site_url('tutor/course') ?>">Course</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Course Baru</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-8 order-lg-1 order-2">
                <div class="card event-detail-bx overflow-hidden">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?= site_url('tutor/course/create') ?>" method="POST" enctype="multipart/form-data">
                            
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gambar Cover</label>
                                    <div class="col-sm-9">
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
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Judul Course</label>
                                    <div class="col-sm-9">
                                        <input name="judul" type="text" class="form-control" placeholder="Judul" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input name="price" type="number" class="form-control" placeholder="Harga" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Discount</label>
                                    <div class="col-sm-9">
                                        <input name="discount" type="number" class="form-control" placeholder="Discount" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select id="single-select2" class="form-control" name="status" required>
                                            <option value="" disabled>Pilih</option>
                                            <option value="0">Draft</option>
                                            <option value="1">Aktif</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select id="single-level" class="form-control" name="level" required>
                                            <option value="" disabled>Pilih</option>
                                            <option value="1">Beginner</option>
                                            <option value="2">Medium</option>
                                            <option value="3">Advanced</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Label</label>
                                    <div class="col-sm-9">
                                        <select class="multi-label" name="labels[]" multiple="multiple" required>
                                            <?php foreach($label->result() as $l){ ?>
                                                <option value="<?= $l->id ?>"><?= $l->label ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Benefit</label>
                                    <div class="col-sm-9">
                                        <select class="multi-select" name="benefit[]" multiple="multiple" required>
                                            <?php foreach($benefit->result() as $b){ ?>
                                                <option value="<?= $b->id ?>"><?= $b->benefit ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <!-- <div class="summernote"></div> -->
                                        <textarea id="summernote" name="deskripsi" required></textarea>
                                    </div>
                                </div>
                               
                                <div class="text-right">
                                    <button type="button" class="btn btn-dark mr-2">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                                <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100" id="image-preview">
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