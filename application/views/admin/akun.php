<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
            <div class="mb-3 mr-3">
                <h6 class="fs-16 text-black font-w600 mb-0"><?= $admins->num_rows() ?> Total Akun</h6>
                <span class="fs-14">Berdasarkan preferensi anda</span>
            </div>
            <div class="d-flex mb-3">
                <button type="button" class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#tambahAkun">+ Akun</button>
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
                                        <th>Nama</th>
                                        <th width="10%" class="text-center">Peran</th>
                                        <th width="10%" class="text-center">Status</th>
										<th width="15%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($admins->result() as $row){
                                    ?>
                                        <tr id="data-<?= $row->id ?>">
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td>
                                                <span class="text-nowrap font-weight-bold"><?= $row->nama ?></span> <br>
                                                <?= $row->email ?>
                                            </td>
                                            <td class="text-center">Admin</td>
                                            <td class="text-center"><span class="badge light <?= ($row->status == 1) ? 'badge-success' : 'badge-danger' ?>"><?= ($row->status == 1) ? 'Aktif' : 'Non Aktif' ?></span></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-secondary btn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-eye"></i></button>
                                                <button class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0 btn-edit" data-id="<?= $row->id ?>"><i class="fa fa-pencil"></i></button>
                                                <?php if($this->session->userdata('userid') != $row->id): ?>
												    <button class="btn btn-danger btn-sm dark ml-0 px-2 py-1 mr-0 btn-remove" data-id="<?= $row->id ?>"><i class="la la-trash"></i></button>
                                                <?php endif; ?>
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
<div class="modal fade" id="tambahAkun">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Akun Baru</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/akun/create') ?>" method="POST">
					<div class="form-group">
						<Benefit class="text-black font-w500">Nama</Benefit>
						<input name="nama" type="text" class="form-control" required>
					</div>

                    <div class="form-group">
						<Benefit class="text-black font-w500">Email</Benefit>
						<input name="email" type="email" class="form-control" required>
					</div>

                    <div class="form-group">
						<Benefit class="text-black font-w500">Password</Benefit>
						<input name="password" type="password" class="form-control" required>
					</div>
					
					<div class="form-group">
						<Benefit class="text-black font-w500">Status</Benefit>
						<select name="status" class="form-control default-select" required>
							<option value="" disabled>Pilih</option>
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
						</select>
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