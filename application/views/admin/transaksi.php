<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
			<div class="mb-3 mr-3">
				<h6 class="fs-16 text-black font-w600 mb-0"><?= $transaksi->num_rows() ?> Total Transaksi</h6>
				<span class="fs-14">Berdasarkan preferensi anda</span>
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
										<th width="5px" class="text-center">#ID</th>
										<th>Transaksi</th>
										<th width="10%">Harga</th>
										<th width="5px" class="text-center">Status</th>
										<th width="5px" class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										foreach($transaksi->result() as $row){ 
									?>
										<tr>
											<td>#<strong><?= $row->orderid ?></strong></td>
											<td>
												<span class="text-nowrap font-weight-bold"><?= $row->judul ?></span>
												<br>
												<span class="text-nowrap">
													<i class="la la-user mr-2 text-primary"></i><?= $row->name ?>
												</span>
											</td>
											<td><strong>Rp. <?= rupiah($row->pay) ?></strong></td>
											<td>
												<span class="badge light badge-success">Lunas</span>
											</td>
											<td class="text-center" width="15%">
												<div class="btn-group text-center">
													<button type="button" class="btn btn-info btn-sm dark ml-0 px-2 py-1 mr-0 btn-detail" data-id="<?= $row->orderid ?>"><i class="fa fa-eye"></i></button>
													<a href="<?= site_url('invoice/' . $row->orderid . '/pdf') ?>" class="btn btn-success btn-sm dark ml-0 px-2 py-1 mr-0 ml-1" target="__BLANK"><i class="fa fa-download mr-1"></i> Invoice</a>
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

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content detail-content">
			
		</div>
	</div>
</div>