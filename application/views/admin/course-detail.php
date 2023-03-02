<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="page-titles m-0 px-0 pt-0">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= site_url('admin') ?>"><i class="fa fa-home"></i></a></li>
				<li class="breadcrumb-item"><a href="<?= site_url('admin/course') ?>">Course</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $course->judul ?></a></li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-8 col-xxl-6">
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
									<h2 class="text-black col-xl-6 p-0 col-xxl-12 mr-auto title mb-3">Kelas Cara Menyusun Pajak Tahunan di Akhir</h2>
									<div class="d-flex align-items-center">
										<a href="javascript:void(0)" class="btn btn-primary light mr-3"><i class="fa fa-video-camera mr-3 scale5" aria-hidden="true"></i>Upload Media</a>
										<a href="javascript:void(0)" class="share-icon mr-3">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M11 2H6C3.791 2 2 3.791 2 6V18C2 20.209 3.791 22 6 22H18C20.209 22 22 20.209 22 18C22 15.729 22 13 22 13C22 12.448 21.552 12 21 12C20.448 12 20 12.448 20 13V18C20 19.104 19.104 20 18 20C14.67 20 9.329 20 6 20C4.895 20 4 19.104 4 18C4 14.67 4 9.329 4 6C4 4.895 4.895 4 6 4H11C11.552 4 12 3.552 12 3C12 2.448 11.552 2 11 2ZM18.586 4H15C14.448 4 14 3.552 14 3C14 2.448 14.448 2 15 2H21C21.552 2 22 2.448 22 3V9C22 9.552 21.552 10 21 10C20.448 10 20 9.552 20 9V5.414L12.707 12.707C12.317 13.097 11.683 13.097 11.293 12.707C10.902 12.317 10.902 11.683 11.293 11.293L18.586 4Z" fill="#FE634E"/>
											</svg>
										</a>
										<div class="dropdown">
											<div class="share-icon" role="button" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#FE634E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#FE634E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#FE634E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">View Detail</a>
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-xxl-6 mb-3">
										<div class="media bg-light p-3 rounded align-items-center">	
											
											<div class="media-body">
												<span class="fs-12 d-block mb-1">Harga Course</span>
												<span class="fs-16 text-black">Rp. <?= rupiah($course->price) ?></span>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-xxl-6 mb-3">
										<div class="media bg-light p-3 rounded align-items-center">	
											
											<div class="media-body">
												<span class="fs-12 d-block mb-1">Tutor</span>
												<span class="fs-16 text-black"><?= $course->nama ?></span>
											</div>
										</div>
									</div>
								</div>
								<h4 class="fs-20 text-black font-w600">Deskripsi</h4>
								
								<p class="fs-14 mb-0"><?= $course->deskripsi ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-xxl-4">
				<div class="row">
					<div class="col-xl-12 col-sm-6">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<h4 class="fs-20 text-black"><i class="fa fa-dollar text-secondary mr-2"></i>Penjualan</h4>
								<a href="#" class="btn btn-primary btn-xxs shadow">Detail Penjualan</a>
							</div>
							<div class="card-body pt-3">
								<div class="d-flex justify-content-between align-items-center">	
									<span class="fs-14">Total</span>
								</div>
								<div id="radialBar"></div>
								<div class="d-flex justify-content-between align-items-center">
									<div>
										<p class="fs-28 text-black font-w600 mb-0">200.000</p>
										<span>Penjualan</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-sm-6">
						<div class="row">
							<div class="col-xl-12 col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="fs-20 text-black"><i class="fa fa-video-camera text-secondary mr-2"></i>Media Belajar</h4>
										<a href="#" class="btn btn-primary btn-xxs shadow">Detail Media</a>
									</div>
									<div class="card-body pt-3">
										<div class="d-flex justify-content-between align-items-center">	
											<span class="fs-14">Total</span>
										</div>
										<div id="radialBar"></div>
										<div class="d-flex justify-content-between align-items-center">
											<div>
												<p class="fs-28 text-black font-w600 mb-0">40</p>
												<span>Video Belajar</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-sm-6">
						<div class="row">
							<div class="col-xl-12 col-sm-6">
								<div class="card px-0">
									<div class="card-header border-0 pb-0">
										<h4 class="fs-20 text-black"><i class="fa fa-list text-secondary mr-2"></i>Atribut Course</h4>
										<a href="#" class="btn btn-primary btn-xxs shadow">Ubah</a>
									</div>
									<div class="card-body p-0 px-0">
										<div class="row mx-0">
											<div class="col-12 px-4 py-3 d-flex align-items-center mb-0">
												<div class="ml-1 mr-3">
													<i class="fa fa-check fa-lg text-success" aria-hidden="true"></i>
												</div>

												<div>
													<h5 class="mb-0 text-black">Deskripsi</h5>
													<!-- <span>24%</span> -->
												</div>
											</div>
											<div class="col-12 px-4 py-3 d-flex align-items-center mb-0 border-top">
												<div class="ml-1 mr-3">
													<i class="fa fa-times fa-lg text-danger" aria-hidden="true"></i>
												</div>

												<div>
													<h5 class="mb-0 text-black">Media/Video</h5>
													<!-- <span>24%</span> -->
												</div>
											</div>
											<div class="col-12 px-4 py-3 d-flex align-items-center mb-0 border-top">
												<div class="ml-1 mr-3">
													<i class="fa fa-check fa-lg text-success" aria-hidden="true"></i>
												</div>

												<div>
													<h5 class="mb-0 text-black">Lesson</h5>
													<!-- <span>24%</span> -->
												</div>
											</div>
											<div class="col-12 px-4 py-3 d-flex align-items-center mb-0 border-top">
												<div class="ml-1 mr-3">
													<i class="fa fa-check fa-lg text-success" aria-hidden="true"></i>
												</div>

												<div>
													<h5 class="mb-0 text-black">Tools</h5>
													<!-- <span>24%</span> -->
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-12 col-sm-6">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<h4 class="fs-20 text-black"><i class="fa fa- fa-star-half-o text-secondary mr-2"></i>Review</h4>
								<a href="#" class="btn btn-primary btn-xxs shadow">Detail Review</a>
							</div>
							<div class="card-body pt-3">
								<div class="d-flex justify-content-between align-items-center">	
									<span class="fs-14">Total</span>
								</div>
								<div id="radialBar"></div>
								<div class="d-flex justify-content-between align-items-center">
									<div>
										<p class="fs-28 text-black font-w600 mb-0">200.000</p>
										<span>Review</span>
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