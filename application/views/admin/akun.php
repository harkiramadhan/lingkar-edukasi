
		
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
					<div class="mb-3 mr-3">
						<h6 class="fs-16 text-black font-w600 mb-0">568 Total Akun</h6>
						<span class="fs-14">Berdasarkan preferensi anda</span>
					</div>
					<div class="d-flex mb-3">
						<a href="javascript:void(0)" class="btn btn-primary text-nowrap">+ Akun</a>
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
                                                <th>#ID</th>
                                                <th>Nama</th>
                                                <th class="text-center">Peran</th>
                                                <th class="text-center">Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
										<tbody>
											<tr>
												<td>#0012451</td>
												<td>
													<span class="text-nowrap font-weight-bold">
														Alfian Rahmatullah
													</span>
												</td>
                                                <td class="text-center">
                                                    Admin
                                                </td>
												<td class="text-center"><span class="badge light badge-success">Aktif</span></td>
												<td>
                                                    <a href="javascript:;" class="btn btn-secondary btn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-eye"></i></a>
													<a href="javascript:;" class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-pencil"></i></a>
													<a href="javascript:;" class="btn btn-danger  bbtn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
                                            <tr>
												<td>#0012451</td>
												<td>
													<span class="text-nowrap font-weight-bold">
														Ahmad Harki Ramadhan
													</span>
												</td>
                                                <td class="text-center">
                                                    Admin
                                                </td>
                                                <td class="text-center"><span class="badge light badge-success">Aktif</span></td>

												<td>
                                                    <a href="javascript:;" class="btn btn-secondary btn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-eye"></i></a>
													<a href="javascript:;" class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-pencil"></i></a>
													<a href="javascript:;" class="btn btn-danger  bbtn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
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
        <div class="modal fade" id="lihatAjuanAkun">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pengajuan Akun</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title mb-2">Pengajuan</h5>
                        <div class="card border">
                            <div class="card-body p-3">
                                <p>Berikut isi dari summernote yang nanti ditulis oleh Akun.</p>
                                <h5 class="modal-title mb-2">Link: </h5>
                                <a class="mb-2 text-danger" href="#">https://drive.google.com/drive/folders/1pgg6QmQ7VlrQprphM3TBbwcdYttPX3Vo</a>
                            </div>
                        </div>

                        <h5 class="modal-title mb-2">Tanggapan</h5>
                        <div class="form-group mb-2">
                            <textarea class="form-control" rows="4" id="comment"></textarea>
                        </div>

                        <select id="single-level" class="form-control mb-2" name="level" required>
                            <option value="" disabled selected>Pilih</option>
                            <option value="1">Ditolak</option>
                            <option value="2">Diterima</option>
                        </select>
                        <div class="form-group mb-0 text-right mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>