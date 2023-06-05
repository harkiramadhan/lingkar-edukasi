<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		
		<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
			<div class="mb-3 mr-3">
				<h6 class="fs-16 text-black font-w600 mb-0"><?= $users->num_rows() ?> Total Peserta</h6>
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
										<th class="text-center">Transaksi</th>
										<th class="text-center" width="10%">Status</th>
										<th class="text-center" width="10%">Status Email</th>
										<th class="text-center" width="10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										foreach($users->result() as $row){ 
											$checkTrx = $this->db->select('id')->get_where('orders', ['transaction_status' => 'settlement', 'userid' => $row->id]);
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
										<td class="text-center"><?= $checkTrx->num_rows() ?></td>
										<td class="text-center">
											<span class="badge light <?= ($row->status == 1) ? 'badge-success' : 'badge-danger' ?>"><?= ($row->status == 1) ? 'AKTIF' : 'NON AKTIF' ?></span>
										</td>
										<td class="text-center">
											<span class="badge light <?= ($row->is_valid == 1) ? 'badge-success' : 'badge-danger' ?>"><?= ($row->is_valid == 1) ? 'Valid' : 'Belum Valid' ?></span>
										</td>
										<td class="text-center">
											<button type="button" class="btn btn-info btn-sm dark ml-0 px-2 py-1 mr-0 btn-detail" data-id="<?= $row->id ?>"><i class="fa fa-eye"></i></button>
											<button type="button" class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0 btn-edit" data-id="<?= $row->id ?>"><i class="fa fa-pencil"></i></button>
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

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content detail-content">            
			
        </div>
	</div>
</div>