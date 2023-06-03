


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
						<h6 class="fs-16 text-black font-w600 mb-0">568 Total Reviews</h6>
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
                                                <th>#ID</th>
                                                <th>Reviews</th>
                                                <th>Kelas</th>
                                                <th>Status</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
										<tbody>
											<tr role="row" class="odd">
												<td class="	">
													0012451
												</td>
												<td>
													<span class="star-review d-inline-block mb-2 fs-16 wspace-no">
														<i class="fa fa-star fs-16 text-orange"></i>
														<i class="fa fa-star fs-16 text-orange"></i>
														<i class="fa fa-star fs-16 text-orange"></i>
														<i class="fa fa-star fs-16 text-orange"></i>
														<i class="fa fa-star fs-16 text-gray"></i>
													</span>
													<br>
													<p class="mb-0 d-none d-xl-inline-block"><strong>Alfian Rahmatullah</strong></p>
													<p class="mb-0 d-none d-xl-inline-block">Karciz is one of the best vendors we've ever worked with. Thanks for your wonderful, helpful service across the board. It is greatly appreciated!</p>
												</td>
												<td class="d-none d-lg-table-cell">The Story of Danau Toba (Musical Drama)</td>
												<td><button type="button" class="btn btn-sm btn-block text-default disabled btn-success">Aktif</button></td>
												<!-- <td>
													<button type="button" class="btn btn-dark btn-sm dark ml-0 px-2 py-1 mr-0" data-toggle="modal" data-target="#peserta-edit" data-id=""><i class="fa fa-pencil"></i></button>
													<a href="javascript:;" class="btn btn-danger btn-sm dark ml-0 px-2 py-1 mr-0"><i class="fa fa-trash"></i></a>
												</td> -->
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

<!-- <div class="modal fade" id="peserta-edit">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content detail-content">            
			<div class="modal-header">
				<h5 class="modal-title">Status Review</h5>
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
</div> -->