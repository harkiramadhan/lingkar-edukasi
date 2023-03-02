<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
			<div class="mb-3 mr-3">
				<h6 class="fs-16 text-black font-w600 mb-0"><?= $benefit->num_rows() ?> Total Benefit</h6>
				<span class="fs-14">Berdasarkan preferensi anda</span>
			</div>
			<div class="d-flex mb-3">
				<button type="button" class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#tambahBenefit">+ Benefit</button>
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
										<th width="5%" class="text-center">No</th>
										<th width="75%">Benefit</th>
										<th width="10%" class="text-center">Status</th>
										<th width="10%" class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										foreach($benefit->result() as $row){
									?>
										<tr id="data-<?= $row->id ?>">
											<td class="text-center"><?= $no++ ?>. </td>
											<td>
												<span class="text-nowrap font-weight-bold"><i class="<?= $row->icon." mr-3" ?>"></i><?= $row->benefit ?></span>
											</td>
											<td><button type="button" class="btn btn-sm btn-block text-default disabled <?= ($row->status == 1) ? 'btn-success' : 'btn-danger' ?>"><?= ($row->status == 1) ? 'Aktif' : 'Tidak Aktif' ?></button></td>
											<td class="text-center">
												<div class="d-flex">
													<button class="btn btn-secondary btn-sm px-4 btn-edit" data-id="<?= $row->id ?>"><i class="fa fa-pencil mr-2"></i> Edit</button>
													<button class="btn btn-danger  btn-sm light ml-2 px-3 btn-remove" data-id="<?= $row->id ?>"><i class="la la-trash"></i></button>
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

<!-- Add Order -->
<div class="modal fade" id="tambahBenefit">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Benefit Baru</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/benefit/create') ?>" method="POST">
					<div class="form-group">
						<Benefit class="text-black font-w500">Nama Benefit</Benefit>
						<input name="benefit" type="text" class="form-control" required>
					</div>
					
					<div class="form-group">
						<Benefit class="text-black font-w500">Status</Benefit>
						<select name="status" class="form-control default-select" required>
							<option value="" disabled>Pilih</option>
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
						</select>
					</div>
					
					<div class="form-group">
						<label>Pilih Icon <small class="text-danger">*</small></label>
						<div class="input-group mb-3" style="max-height: 350px!important; overflow-y: scroll;">
							<?php foreach($fontawesome->result() as $fa){ ?>
								<div class="form-check form-check-inline text-center">
									<input class="form-check-input" type="radio" name="icon" id="inlineRadioIcon<?= $fa->id ?>" value="<?= $fa->class ?>" required="">
									<label class="form-check-label" for="inlineRadioIcon<?= $fa->id ?>"></label>
									<h4><i class="<?= $fa->class ?> mb-0"></i></h3>
								</div>
							<?php } ?>
						</div>
					</div>

					<div class="form-group mb-0">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-edit">
	<div class="modal-dialog" role="document">
		<div class="modal-content edit-content">
			
		</div>
	</div>
</div>

<div class="modal fade" id="modal-remove">
	<div class="modal-dialog" role="document">
		<div class="modal-content remove-content">
			
		</div>
	</div>
</div>