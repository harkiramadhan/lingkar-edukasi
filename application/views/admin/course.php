<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
			<div class="mb-3 mr-3">
				<h6 class="fs-16 text-black font-w600 mb-0"><?= $courses->num_rows() ?> Total Course</h6>
				<span class="fs-14">Berdasarkan preferensi anda</span>
			</div>
			<div class="d-flex mb-3">
				<a href="<?= site_url('admin/course/tambah')?>" class="btn btn-primary text-nowrap">+ Course</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="tab-content">
					<div id="All" class="tab-pane active fade show">
						<div class="table-responsive">
							<table id="example2" class="table card-table display dataTablesCard">
								<thead>
									<tr>
										<th class="text-center" width="5%">No</th>
										<th>Course</th>
										<th class="text-center" width="8%">Modul </th>
										<th class="text-center" width="8%">Terjual</th>
										<th width="10%">Harga</th>
										<th class="text-center" width="15%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										foreach($courses->result() as $row){
									?>
										<tr id="data-<?= $row->id ?>">
											<td class="text-center"><?= $no++ ?></td>
											<td>
												<div class="media align-items-center">
													<?php if($row->cover): ?>
														<img class="img-fluid rounded mr-3 d-none d-xl-inline-block" width="70" height="70" src="<?= base_url('uploads/courses/' . $row->cover) ?>" style="object-fit: cover;" alt="DexignZone">
													<?php else: ?>
														<img class="img-fluid rounded mr-3 d-none d-xl-inline-block" width="70" height="70" src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" style="object-fit: cover;" alt="DexignZone">
													<?php endif; ?>

													<div class="media-body">
														<h4 class="font-w600 mb-1 wspace-no"><a href="javascript:void(0)" class="text-black"><?= $row->judul ?></a></h4>
														<span><i class="la la-user mr-2 text-primary"></i><?= $row->nama ?></span>
													</div>
												</div>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">9x</td>
											<td>Rp. <?= rupiah($row->price) ?></td>
											<td class="text-center">
												<div class="btn-group">
													<a href="javascript:;" class="btn btn-dark btn-sm dark ml-2 px-3"><i class="la la-video"></i></a>
													<a href="<?= site_url('admin/course/' . $row->id) ?>" class="btn btn-dark btn-sm dark ml-2 px-3"><i class="la la-edit"></i></a>
													<button type="button" data-id="<?= $row->id ?>" class="btn btn-danger btn-sm light ml-2 px-3 btn-remove"><i class="la la-trash"></i></button>
												</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

        