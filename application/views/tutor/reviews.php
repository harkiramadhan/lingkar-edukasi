<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
			<div class="mb-3 mr-3">
				<h6 class="fs-16 text-black font-w600 mb-0"><?= $review->num_rows() ?> Total Reviews</h6>
				<span class="fs-14">Berdasarkan preferensi anda</span>
			</div>
			<div class="d-flex mb-3">
				<!-- <a href="javascript:void(0)" class="btn btn-primary text-nowrap">+ Kelas</a> -->
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
										<th>Reviews</th>
										<th>Kelas</th>
										<th class="text-center" width="10%">Status</th>
										<th class="text-center" width="10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach($review->result() as $row){ ?>
										<tr id="data-<?= $row->id ?>">
											<td class="text-center"><?= $no++ ?></td>
											<td>
												<span class="star-review d-inline-block mb-2 fs-16 wspace-no">
													<?php for($i=1; $i<= 5; $i++){ ?>
														<?php if($i <= $row->rating): ?>
															<i class="fa fa-star fs-16 text-orange"></i>
														<?php else: ?>
															<i class="fa fa-star fs-16 text-gray"></i>
														<?php endif; ?>
													<?php } ?>
												</span>
												<br>
												<p class="mb-0 d-none d-xl-inline-block"><strong><?= $row->name ?></strong></p>
												<p class="mb-0 d-none d-xl-inline-block"><?= $row->review ?></p>
											</td>
											<td class="d-none d-lg-table-cell"><?= $row->judul ?></td>
											<td class="text-center"><button type="button" class="btn btn-sm btn-block text-default disabled <?= ($row->status == 1) ? 'btn-success' : 'btn-danger' ?>"><?= ($row->status == 1) ? 'Aktif' : 'Tidak Aktif' ?></button></td>
											<td class="text-center">
												<button type="button" class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0 btn-edit" data-id="<?= $row->id ?>"><i class="fa fa-pencil"></i></button>
												<button type="button" class="btn btn-danger btn-sm dark ml-0 px-2 py-1 mr-0 btn-remove" data-id="<?= $row->id ?>"><i class="fa fa-trash"></i></button>
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

<div class="modal fade" id="modal-edit">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content edit-content">            
			
        </div>
	</div>
</div>