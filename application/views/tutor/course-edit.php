<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="page-titles m-0 px-0 pt-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('tutor') ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li class="breadcrumb-item"><a href="<?= site_url('tutor/course') ?>">Course</a></li>
				<li class="breadcrumb-item active"><a href="<?= site_url('tutor/course/' . $course->id) ?>"><?= $course->judul ?></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-8 order-lg-1 order-2">
                <div class="card event-detail-bx overflow-hidden">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?= site_url('tutor/course/update/' . $course->id) ?>" method="POST" enctype="multipart/form-data">
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gambar Cover</label>
                                    <div class="col-sm-9">
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
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Judul Course</label>
                                    <div class="col-sm-9">
                                        <input name="judul" type="text" class="form-control" placeholder="Judul" value="<?= $course->judul ?>" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input name="price" type="number" class="form-control" placeholder="Harga" value="<?= $course->price ?>" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Discount</label>
                                    <div class="col-sm-9">
                                        <input name="discount" type="number" class="form-control" placeholder="Discount" value="<?= $course->discount ?>" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select id="single-select2" class="form-control" name="status" required>
                                            <option value="" disabled>Pilih</option>
                                            <option value="0" <?= ($course->status == 0) ? 'selected' : '' ?>>Draft</option>
                                            <option value="1" <?= ($course->status == 1) ? 'selected' : '' ?>>Aktif</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select id="single-level" class="form-control" name="level" required>
                                            <option value="" disabled>Pilih</option>
                                            <option value="1" <?= ($course->level == 1) ? 'selected' : '' ?>>Beginner</option>
                                            <option value="2" <?= ($course->level == 2) ? 'selected' : '' ?>>Medium</option>
                                            <option value="3" <?= ($course->level == 3) ? 'selected' : '' ?>>Advanced</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Label</label>
                                    <div class="col-sm-9">
                                        <select class="multi-label" name="labels[]" multiple="multiple" required>
                                            <?php 
                                                foreach($label->result() as $l){ 
                                                    $cekLabel = $this->db->get_where('courses_label', ['courseid' => $course->id, 'labelid' => $l->id]);
                                            ?>
                                                <option value="<?= $l->id ?>" <?= ($cekLabel->num_rows() > 0) ? 'selected' : '' ?>><?= $l->label ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Benefit</label>
                                    <div class="col-sm-9">
                                        <select class="multi-select" name="benefit[]" multiple="multiple" required>
                                            <?php 
                                                foreach($benefit->result() as $b){ 
                                                    $cekBenefit = $this->db->get_where('courses_benefit', ['courseid' => $course->id, 'benefitid' => $b->id]);
                                            ?>
                                                <option value="<?= $b->id ?>" <?= ($cekBenefit->num_rows() > 0) ? 'selected' : '' ?>><?= $b->benefit ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <!-- <div class="summernote"></div> -->
                                        <textarea id="summernote" name="deskripsi" required><?= $course->deskripsi ?></textarea>
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
                                <?php if($course->cover): ?>
                                    <img src="<?= base_url('uploads/courses/' . $course->cover) ?>" alt="" class="w-100" id="image-preview">
                                <?php else: ?>
                                    <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100" id="image-preview">
                                <?php endif; ?>
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