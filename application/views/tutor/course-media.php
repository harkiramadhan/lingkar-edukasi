<div class="content-body" style="min-height: 1129px;">
	<!-- row -->
	<div class="container-fluid">
		<div class="page-titles m-0 px-0 pt-0">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= site_url('tutor') ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li class="breadcrumb-item"><a href="<?= site_url('tutor/course') ?>">Course</a></li>
				<li class="breadcrumb-item active"><a href="<?= site_url('tutor/course/' . $course->id) ?>"><?= $course->judul ?></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Media</a></li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-8 col-xxl-6">
                <div class="row">
                    <div class="col-xl-12 col-md-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="fs-20 text-black"><i class="fa fa-file text-secondary mr-3" aria-hidden="true"></i>Daftar Media</h4>
                                <div class="d-flex mb-0">
                                    <button class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#modal-tambah-materi">+ Materi</button>
                                </div>
                            </div>
                            <div class="card-body">

                                <?php 
                                    $no = 1;
                                    foreach($materi->result() as $row){ 
                                        $video = $this->db->get_where('video', ['materiid' => $row->id, 'courseid' => $course->id]);
                                ?>
                                    <div id="accordion-<?= $row->id ?>" class="accordion accordion-left-indicator">
                                        
                                        <div class="accordion__item">
                                            <div class="d-flex justify-content-between">
                                                <?php if($this->session->flashdata('collapse')): ?>
                                                    <div class="accordion__header d-flex align-items-center mr-2 <?= ($this->session->flashdata('collapse') == $row->id) ? 'collapsed' : '' ?>" data-toggle="collapse" data-target="#item-<?= $row->id ?>">
                                                <?php else: ?>
                                                    <div class="accordion__header d-flex align-items-center mr-2 <?= ($no != 1) ? 'collapsed' : '' ?>" data-toggle="collapse" data-target="#item-<?= $row->id ?>">
                                                <?php endif; ?>
                                                    <span class="accordion__header--icon"></span>
                                                    <i class="fa fa-video-camera pl-4 mr-3" aria-hidden="true"></i>
                                                    <span class="accordion__header--text pl-0"><?= $row->materi ?></span>
                                                    <span class="accordion__header--indicator style_two" ></span>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="button" data-id="<?= $row->id ?>" data-materi="<?= $row->materi ?>" class="btn btn-dark btn-sm btn-add-video dark ml-0 px-2 py-1 mr-1"><i class="fa fa-plus"></i></button>
                                                    <button type="button" data-id="<?= $row->id ?>" data-materi="<?= $row->materi ?>" class="btn btn-dark btn-sm btn-edit-materi dark ml-0 px-2 py-1 mr-1"><i class="fa fa-pencil"></i></button>
                                                    <button type="button" data-id="<?= $row->id ?>" data-materi="<?= $row->materi ?>" class="btn btn-danger btn-sm btn-remove-materi light ml-0 px-2 py-1 btn-remove"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                            <?php if($this->session->flashdata('collapse')): ?>
                                                <div id="item-<?= $row->id ?>" class="collapse accordion__body <?= ($this->session->flashdata('collapse') == $row->id) ? 'show' : '' ?>" data-parent="#accordion-<?= $row->id ?>">
                                            <?php else: ?>
                                                <div id="item-<?= $row->id ?>" class="collapse accordion__body <?= ($no == 1) ? 'show' : '' ?>" data-parent="#accordion-<?= $row->id ?>">
                                            <?php endif; ?>
                                                <div class="accordion__body--text">
                                                    <?php foreach($video->result() as $vd){ ?>
                                                        <div class="accordion-text-item d-flex align-items-center mb-2" id="data-video-<?= $vd->id ?>">
                                                            <i class="fa fa-video-camera pl-0 mr-3 ml-2" aria-hidden="true"></i>
                                                            <p class="mb-0"><?= $vd->judul ?></p>

                                                            <button type="button" 
                                                                data-id="<?= $vd->id ?>" 
                                                                data-video-url="<?= base_url('uploads/courses/videos/' . $vd->video) ?>"
                                                                data-judul="<?= $vd->judul ?>"
                                                                data-durasi="<?= $vd->durasi ?>"
                                                                data-status="<?= $vd->status ?>"
                                                                data-materi="<?= $row->materi ?>"
                                                                class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-1 ml-auto btn-edit-video"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" data-id="<?= $vd->id ?>" class="btn btn-danger btn-sm light ml-0 px-2 py-1 btn-remove-video"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php $no++; } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-4">
				<div class="row">
					<div class="col-xl-12">
						<div class="card event-detail-bx overflow-hidden">
							<div class="card-media">
                                <?php if(@$course->cover): ?>
									<img src="<?= base_url('uploads/courses/' . $course->cover) ?>" alt="" class="w-100" style="object-fit: cover;">
								<?php else: ?>
									<img src="https://fasttechnologies.com/wp-content/uploads/2017/01/placeholder-banner.png" alt="" class="w-100" style="object-fit: cover;">
								<?php endif; ?>
                            </div>
							<div class="card-body">
								<div class="d-flex flex-wrap align-items-center mb-4">
									<h2 class="text-black col-xl-12 p-0 col-xxl-12 mr-auto title mb-0"><?= $course->judul ?></h2>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-xxl-6 mb-3">
										<div class="media bg-light p-3 rounded align-items-center">	
											
											<div class="media-body">
												<span class="fs-12 d-block mb-1">Harga Course</span>
												<span class="fs-16 text-black">Rp. <?= rupiah($course->price) ?></span>
											</div>
										</div>
									</div>
									<div class="col-lg-12 col-md-6 col-xxl-6 mb-3">
										<div class="media bg-light p-3 rounded align-items-center">	
											
											<div class="media-body">
												<span class="fs-12 d-block mb-1">Tutor</span>
												<span class="fs-16 text-black"><?= $course->nama ?></span>
											</div>
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-xxl-6 mb-3">
										<div class="media bg-light p-3 rounded align-items-center">	
											
											<div class="media-body">
												<span class="fs-12 d-block mb-1">Jumlah Video</span>
												<span class="fs-16 text-black"><?= $durasi->jumlah ?></span>
											</div>
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-xxl-6 mb-3">
										<div class="media bg-light p-3 rounded align-items-center">	
											
											<div class="media-body">
												<span class="fs-12 d-block mb-1">Total Durasi</span>
												<span class="fs-16 text-black"><?= ($durasi->total) ? $durasi->total : '00:00:00' ?></span>
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


<div class="modal fade" id="modal-tambah-materi">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Materi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('tutor/course/createMateri') ?>" method="POST">
                    <input type="hidden" name="courseid" value="<?= $course->id ?>">
                    <div class="form-group">
                        <label class="text-black font-w500">Judul Materi</label>
                        <input name="materi" type="text" class="form-control" value="" placeholder="Tulis Judul Materi" required>
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>

<div class="modal fade" id="modal-edit-materi">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Materi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('tutor/course/updateMateri') ?>" method="POST">
                    <input type="hidden" name="courseid" value="<?= $course->id ?>">
                    <div class="form-group">
                        <label class="text-black font-w500">Judul Materi</label>
                        <input name="materi" type="text" class="form-control" value="" placeholder="Tulis Judul Materi" id="materi-edit-materi" required>
                    </div>

                    <input type="hidden" name="id" id="materi-edit-id">

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>

<div class="modal fade" id="modal-tambah-video">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Video Materi</h5> <br>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <h6 class="text-modal-tambah-video"></h6> <br>
                <form action="<?= site_url('tutor/course/createVideo') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="courseid" value="<?= $course->id ?>">
                    <input type="hidden" name="materiid" id="video-add-id">

                    <div class="form-group">
                        <label class="text-black font-w500">Video</label>
                        <input name="video" type="file" class="form-control" value="" placeholder="Upload Video" id='videoUpload' accept="video/mp4,video/x-m4v,video/*" required>
                    </div>

                    <div class="embed-responsive embed-responsive-16by9 mb-3 d-none video-upload">
                        <video class="embed-responsive-item" controls autoplay onloadedmetadata="getDuration()">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                    <div class="form-group">
                        <label class="text-black font-w500">Judul Video</label>
                        <input name="judul" type="text" class="form-control" value="" placeholder="Tulis judul" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="text-black font-w500">Durasi Video</label>
                        <input name="durasi" type="time" step="1" class="form-control" value="00:00:00" required>
                    </div>

                    <div class="form-group">
                        <label class="text-black font-w500">Status</label>
                        <select class="form-control default-select " name="status" required>
                            <option value="" disabled>Pilih</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>

<div class="modal fade" id="modal-edit-video">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Video Materi</h5> <br>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <h6 id="video-edit-materi"></h6> <br>
                <form action="<?= site_url('tutor/course/updateVideo') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="" id="video-edit-id">

                    <div class="form-group">
                        <label class="text-black font-w500">Video</label>
                        <input name="video" type="file" class="form-control" value="" placeholder="Upload Video" id='videoUpload2' accept="video/mp4,video/x-m4v,video/*" required>
                    </div>

                    <div class="embed-responsive embed-responsive-16by9 mb-3 video-upload2">
                        <video class="embed-responsive-item" controls autoplay id="video-edit-video">
                            <source src="" id="video-edit-video-src">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                    <div class="form-group">
                        <label class="text-black font-w500">Judul Video</label>
                        <input name="judul" type="text" class="form-control" value="" placeholder="Tulis judul" id="video-edit-judul" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="text-black font-w500">Durasi Video</label>
                        <input name="durasi" type="time" step="1" class="form-control" value="" id="video-edit-durasi" required>
                    </div>

                    <div class="form-group">
                        <label class="text-black font-w500">Status</label>
                        <select class="form-control default-select" name="status" id="video-edit-status" required>
                            <option value="" disabled>Pilih</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>

<div class="modal fade" id="">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
            
        </div>
	</div>
</div>