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
										<th class="text-center">Transaksi</th>
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
										<td class="text-center">10</td>
										<td><span class="badge light <?= ($row->is_valid == 1) ? 'badge-success' : 'badge-danger' ?>"><?= ($row->is_valid == 1) ? 'Aktif' : 'Belum Aktif' ?></span></td>
										<td class="text-center">
											<button type="button" class="btn btn-info btn-sm dark ml-0 px-2 py-1 mr-0" data-toggle="modal" data-target="#peserta-detail" data-id=""><i class="fa fa-eye"></i></button>
											<button type="button" class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0" data-toggle="modal" data-target="#peserta-edit" data-id=""><i class="fa fa-pencil"></i></button>
											<!-- <a href="javascript:;" class="btn btn-danger  bbtn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-trash"></i></a> -->
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

<div class="modal fade" id="peserta-detail">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content detail-content">            <div class="modal-header">
				<h5 class="modal-title">Detail Peserta</h5>
				<button type="button" class="close" data-dismiss="modal"><span>×</span>
				</button>
			</div>

            <div class="modal-body">
				<div class="card-media mb-4 mx-auto" style="max-width: 200px;">
					<img src="https://development.lingkaredukasi.com/assets/admin/images/placeholder-image.svg" alt="" class="w-100 rounded" id="image-preview" style="display: block;">
				</div>
                <table id="example2" class="table card-table display dataTable">
                    <tbody>
						<tr>
							<td width="50%"><button type="button" class="btn btn-sm btn-block btn-success">AKTIF</button></td>
							<td width="50%" ><button type="button" class="btn btn-sm btn-block btn-secondary">8x Transaksi</button></td>
						</tr>
						<tr>
							<td width="40%">Nama Lengkap</td>
							<td>Alfian Rahmatullah</td>
						</tr>
						<tr>
							<td width="40%">Email</td>
							<td>alvianrht@gmail.com</td>
						</tr>
						<tr>
							<td width="40%">No WA/HP</td>
							<td>082112905550</td>
						</tr>
						<tr>
							<td width="40%">Jenis Kelamin</td>
							<td>Laki - laki</td>
						</tr>
						<tr>
							<td width="40%">Pendidikan Terahir</td>
							<td>S1</td>
						</tr>
						<tr>
							<td width="40%">Tanggal Lahir</td>
							<td>12 September 1998</td>
						</tr>                  
                    </tbody>
                </table>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
			</div>
        </div>
	</div>
</div>

<div class="modal fade" id="peserta-edit">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content detail-content">            <div class="modal-header">
				<h5 class="modal-title">Status Peserta</h5>
				<button type="button" class="close" data-dismiss="modal"><span>×</span>
				</button>
			</div>

            <div class="modal-body">
				<form action="http://localhost/lingkar-edukasi/admin/label/update/8" method="POST">
					<div class="form-group">
						<label class="text-black font-w500">Status</label>
						<select class="form-control default-select " name="status" required="">
							<option value="" disabled="">Pilih</option>
							<option selected="" value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
						</select>
					</div>
					<div class="form-group mb-0 text-right">
						<button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
        </div>
	</div>
</div>