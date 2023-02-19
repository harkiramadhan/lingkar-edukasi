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
				<div class="row">
					<div class="col-xl-6 col-xxl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card event-detail-bx overflow-hidden">
									<div class="card-media">
										<img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" alt="" class="w-100">
									</div>
									<div class="card-body">
										<div class="d-flex flex-wrap align-items-center mb-4">
											<h2 class="text-black col-xl-6 p-0 col-xxl-12 mr-auto title mb-3">Kelas Pajak</h2>
											<div class="d-flex align-items-center">
												<a href="javascript:void(0)" class="btn btn-primary light mr-3"><i class="fa fa-video-camera mr-3 scale5" aria-hidden="true"></i>Upload Materi</a>
												<a href="javascript:void(0)" class="share-icon mr-3">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M11 2H6C3.791 2 2 3.791 2 6V18C2 20.209 3.791 22 6 22H18C20.209 22 22 20.209 22 18C22 15.729 22 13 22 13C22 12.448 21.552 12 21 12C20.448 12 20 12.448 20 13V18C20 19.104 19.104 20 18 20C14.67 20 9.329 20 6 20C4.895 20 4 19.104 4 18C4 14.67 4 9.329 4 6C4 4.895 4.895 4 6 4H11C11.552 4 12 3.552 12 3C12 2.448 11.552 2 11 2ZM18.586 4H15C14.448 4 14 3.552 14 3C14 2.448 14.448 2 15 2H21C21.552 2 22 2.448 22 3V9C22 9.552 21.552 10 21 10C20.448 10 20 9.552 20 9V5.414L12.707 12.707C12.317 13.097 11.683 13.097 11.293 12.707C10.902 12.317 10.902 11.683 11.293 11.293L18.586 4Z" fill="#FE634E"/>
													</svg>
												</a>
												<div class="dropdown">
													<div class="share-icon" role="button" data-toggle="dropdown" aria-expanded="false">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#FE634E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#FE634E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#FE634E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="javascript:void(0);">View Detail</a>
														<a class="dropdown-item" href="javascript:void(0);">Edit</a>
														<a class="dropdown-item" href="javascript:void(0);">Delete</a>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-xxl-6 mb-3">
												<div class="media bg-light p-3 rounded align-items-center">	
													
													<div class="media-body">
														<span class="fs-12 d-block mb-1">Harga Course</span>
														<span class="fs-16 text-black">Rp. 20.000</span>
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-xxl-6 mb-3">
												<div class="media bg-light p-3 rounded align-items-center">	
													
													<div class="media-body">
														<span class="fs-12 d-block mb-1">Tutor</span>
														<span class="fs-16 text-black">Alfian Rahmatullah</span>
													</div>
												</div>
											</div>
										</div>
										<h4 class="fs-20 text-black font-w600">Deskripsi</h4>
										<p class="fs-14 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-4">
						<div class="row">
							<div class="col-xl-12 col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="fs-20 text-black">Sales Summary</h4>
									</div>
									<div class="card-body pt-3">
										<div class="d-flex justify-content-between align-items-center">	
											<span class="fs-14">Tuesday</span>
											<span class="text-black fs-18 font-w500">215,523 pcs</span>
										</div>
										<div id="radialBar"></div>
										<div class="d-flex justify-content-between align-items-center">
											<div>
												<p class="fs-28 text-black font-w600 mb-1">25 Left</p>
												<span>Available Ticket</span>
											</div>
											<div class="d-inline-block ml-auto position-relative donut-chart-sale">
												<span class="donut2" data-peity='{ "fill": ["rgb(254, 99, 78)", "rgba(244, 244, 244, 1)"],   "innerRadius": 26, "radius": 10}'>5/8</span>
												<small class="text-primary">65%</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-sm-6">
								<div class="row">
									<div class="col-xl-12">
										<div class="card">
											<div class="card-body">
												<div class="d-flex align-items-end">
													<div>
														<p class="fs-14 mb-1">New Sales</p>
														<span class="fs-35 text-black font-w600">93
															<svg class="ml-1" width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M2.00401 11.1924C0.222201 11.1924 -0.670134 9.0381 0.589795 7.77817L7.78218 0.585786C8.56323 -0.195262 9.82956 -0.195262 10.6106 0.585786L17.803 7.77817C19.0629 9.0381 18.1706 11.1924 16.3888 11.1924H2.00401Z" fill="#33C25B"/>
															</svg>
														</span>
													</div>
													<canvas class="lineChart" id="chart_widget_2" height="85"></canvas>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-12">
										<div class="card">
											<div class="card-body">
												<div class="d-flex justify-content-between align-items-center">
													<div>
														<p class="fs-14 mb-1">Event Held</p>
														<span class="fs-35 text-black font-w600">856
															<svg class="ml-1" width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M2.00401 11.1924C0.222201 11.1924 -0.670134 9.0381 0.589795 7.77817L7.78218 0.585786C8.56323 -0.195262 9.82956 -0.195262 10.6106 0.585786L17.803 7.77817C19.0629 9.0381 18.1706 11.1924 16.3888 11.1924H2.00401Z" fill="#33C25B"/>
															</svg>
														</span>
													</div>
													<div class="d-inline-block ml-auto position-relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(254, 99, 78)", "rgba(244, 244, 244, 1)"],   "innerRadius": 31, "radius": 10}'>6/8</span>
														<small class="text-secondary">90%</small>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-12">
										<div class="card">
											<div class="card-header align-items-start pb-0 border-0">	
												<div>
													<h4 class="fs-16 mb-0 text-black font-w600">Increase 25%</h4>
													<span class="fs-12">Comparisson</span>
												</div>
												<select class="form-control style-1 default-select ">
													<option>Daily</option>
													<option>Monthly</option>
													<option>Weekly</option>
												</select>
											</div>
											<div class="card-body pt-0">
												<canvas id="widgetChart1" height="50"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>