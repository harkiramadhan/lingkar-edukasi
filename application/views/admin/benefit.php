<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
					<div class="mb-3 mr-3">
						<h6 class="fs-16 text-black font-w600 mb-0">568 Total Benefit</h6>
						<span class="fs-14">Berdasarkan preferensi anda</span>
					</div>
					<div class="d-flex mb-3">
						<a href="javascript:void(0)" class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#tambahBenefit">+ Benefit</a>
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
										<form>
											<div class="form-group">
												<Benefit class="text-black font-w500">Nama Benefit</Benefit>
												<input type="text" class="form-control">
											</div>
											
											<div class="form-group">
												<Benefit class="text-black font-w500">Status</Benefit>
												<select class="form-control default-select ">
													<option selected disabled>Pilih</option>
													<option>Aktif</option>
													<option>Tidak Aktif</option>
												</select>
											</div>

                                            <div class="form-group">
												<Benefit class="text-black font-w500">Icon</Benefit>
												<select class="form-control default-select ">
													<option selected disabled>Pilih</option>
													<option><i class="la la-trash text-black"></i></option>
													<option>Tidak Aktif</option>
												</select>
											</div>

											<div class="form-group mb-0">
												<button type="button" class="btn btn-primary">Tambah</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
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
                                                <th>Benefit</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
										<tbody>
											<tr>
												<td>#0012451</td>
												<td>
													<span class="text-nowrap font-weight-bold">
														Ekonomi
													</span>
												</td>
												<td><span class="badge light badge-success">Aktif</span></td>
												<td>
													<div class="d-flex">
														<a href="javascript:;" class="btn btn-secondary btn-sm px-4">Detail</a>
														<a href="javascript:;" class="btn btn-danger  btn-sm light ml-2 px-3"><i class="la la-trash"></i></a>
													</div>
												</td>
											</tr>
											<tr>
												<td>#0012451</td>
												<td>
													<span class="text-nowrap font-weight-bold">
														Pajak
													</span>
												</td>
												<td><span class="badge light badge-danger">Tidak Aktif</span></td>
												<td>
													<div class="d-flex">
														<a href="javascript:;" class="btn btn-secondary btn-sm px-4">Detail</a>
														<a href="javascript:;" class="btn btn-danger  btn-sm light ml-2 px-3"><i class="la la-trash"></i></a>
													</div>
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