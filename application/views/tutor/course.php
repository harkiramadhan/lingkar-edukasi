<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
			<div class="mb-3 mr-3">
				<h6 class="fs-16 text-black font-w600 mb-0"><?= $courses->num_rows() ?> Total Course</h6>
				<span class="fs-14">Berdasarkan preferensi anda</span>
			</div>
			<div class="d-flex mb-3">
				<a href="<?= site_url('tutor/course/tambah')?>" class="btn btn-primary text-nowrap">+ Course</a>
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
											$trx = $this->M_Transaksi->getSumByCourse($row->id);
											$video = $this->M_Video->getByClass($row->id);
									?>
										<tr id="data-<?= $row->id ?>">
											<td class="text-center"><?= $no++ ?></td>
											<td>
												<div class="media align-items-center">
													<?php if($row->cover): ?>
														<img class="img-fluid rounded mr-3 d-none d-xl-inline-block" width="70" height="70" src="<?= base_url('uploads/courses/' . $row->cover) ?>" style="object-fit: cover; height: 60px;" alt="DexignZone">
													<?php else: ?>
														<img class="img-fluid rounded mr-3 d-none d-xl-inline-block" width="70" height="70" src="<?= base_url('assets/tutor/images/placeholder-image.svg') ?>" style="object-fit: cover; height: 60px;" alt="DexignZone">
													<?php endif; ?>

													<div class="media-body">
														<h4 class="font-w600 mb-1 wspace-no"><a href="javascript:void(0)" class="text-black"><?= $row->judul ?></a></h4>
														<span><i class="la la-user mr-2 text-primary"></i><?= $row->nama ?></span>
													</div>
												</div>
											</td>
											<td class="text-center"><?= $video->num_rows() ?></td>
											<td class="text-center"><?= $trx->num_rows() ?>x</td>
											<td>Rp. <?= rupiah($row->price) ?></td>
											<td class="text-center">
												<a href="<?= site_url('tutor/course/' . $row->id) ?>" class="btn btn-secondary btn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-eye"></i></a>
												<a href="<?= site_url('tutor/course/' . $row->id . '/media') ?>" class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-video"></i></a>
												<a href="<?= site_url('tutor/course/' . $row->id . '/edit') ?>" class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-pencil"></i></a>
												<button type="button" data-id="<?= $row->id ?>" class="btn btn-danger btn-sm dark ml-0 px-2 py-1 mr-0 btn-remove"><i class="fa fa-trash"></i></button>
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