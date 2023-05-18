<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		
		<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
			<div class="mb-3 mr-3">
				<h6 class="fs-16 text-black font-w600 mb-0">568 Total Peserta</h6>
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
										<th>Peserta</th>
										<th>Status</th>
										<th class="text-center" width="15%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										foreach($users->result() as $row){ 
									?>
									<tr>
										<td class="text-center"><?= $no++ ?></td>
										<td class="d-flex align-items-end">
											<?php if($row->profile_picture): ?>
												<img src="<?= base_url('uploads/profile/' . $row->profile_picture) ?>" alt="" width="42" class="rounded-circle mr-2">
											<?php else: ?> 
												<img src="<?= base_url('assets/admin/images/profile/20.jpg') ?>" alt="" width="42" class="rounded-circle mr-2">
											<?php endif; ?>
											<div class="mr-auto">
												<h4 class="text-nowrap font-weight-bold fs-14 mb-0"><?= $row->name ?></h4>
												<span class="fs-12"><?= $row->email ?></span>
											</div>
										</td>
										<td><span class="badge light <?= ($row->is_valid == 1) ? 'badge-success' : 'badge-danger' ?>"><?= ($row->is_valid == 1) ? 'Aktif' : 'Belum Aktif' ?></span></td>
										<td class="text-center">
											<a href="javascript:;" class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-pencil"></i></a>
											<a href="javascript:;" class="btn btn-danger  bbtn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-trash"></i></a>
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