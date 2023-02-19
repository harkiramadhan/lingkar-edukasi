
		
		<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<!-- Add Order -->
				<div class="modal fade" id="addOrderModalside">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Event</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label class="text-black font-w500">Event Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Event Date</label>
										<input type="date" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Description</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary">Create</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
					<div class="mb-3 mr-3">
						<h6 class="fs-16 text-black font-w600 mb-0">568 Total Kelas</h6>
						<span class="fs-14">Berdasarkan preferensi anda</span>
					</div>
					<div class="d-flex mb-3">
						<a href="javascript:void(0)" class="btn btn-primary text-nowrap">+ Kelas</a>
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
                                                <th>Kelas</th>
                                                <th>Modul </th>
                                                <th>Terjual</th>
                                                <th>Harga</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
										<tbody>
											<tr>
												<td>#0012451</td>
												<td>
													<span class="text-nowrap font-weight-bold">
														The Story of Danau Toba<br> (Musical Drama)
													</span>
													<br>
													<span class="text-nowrap">
														<i class="la la-user mr-2 text-primary"></i>Alfian Rahmatullah
													</span>
												</td>
												<td>8</td>
												<td>9x</td>
												<td>Rp. 1.000.000</td>
												<td>
													<div class="btn-group">
														<a href="javascript:void(0)" class="btn btn-secondary btn-sm">Detail</a>
														<a href="javascript:void(0)" class="btn btn-primary btn-sm light"><i class="la la-trash"></i></a>
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

        