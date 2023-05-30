<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-3 col-xxl-4">
                <div class="">
                    <div class="widget-stat card">
                        <div class="card-body p-4">
                            <div class="media ai-icon">
                                <span class="mr-3 bgl-danger text-danger">
                                    <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                </span>
                                <div class="media-body text-right">
                                    <p class="mb-3">Pendapatan <br> Hari Ini</p>
                                    <h5 class="">Rp. <?= rupiah($trx_day->total) ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="widget-stat card">
                        <div class="card-body p-4">
                            <div class="media ai-icon">
                                <span class="mr-3 bgl-danger text-danger">
                                    <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                </span>
                                <div class="media-body text-right">
                                    <p class="mb-3">Pendapatan <br> Minggu Ini</p>
                                    <h5 class="">Rp. <?= rupiah($trx_week->total) ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="widget-stat card">
                        <div class="card-body p-4">
                            <div class="media ai-icon">
                                <span class="mr-3 bgl-danger text-danger">
                                    <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                </span>
                                <div class="media-body text-right">
                                    <p class="mb-3">Pendapatan <br> Bulan Ini</p>
                                    <h5 class="">Rp. <?= rupiah($trx_month->total) ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-xxl-8">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body p-4">
                                <div class="media ai-icon">
                                    <span class="mr-3 bgl-primary text-white">
                                        <!-- <i class="ti-user"></i> -->
                                        <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </span>
                                    <div class="media-body">
                                        <p class="mb-1 text-white">Peserta</p>
                                        <h4 class="mb-0 text-white"><?= $peserta->num_rows() ?></h4>
                                        <!-- <span class="badge badge-primary">+3.5%</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body p-4">
                                <div class="media ai-icon">
                                    <span class="mr-3 bgl-primary text-white">
                                        <!-- <i class="ti-user"></i> -->
                                        <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </span>
                                    <div class="media-body">
                                        <p class="mb-1 text-white">Kelas</p>
                                        <h4 class="mb-0 text-white"><?= $courses->num_rows() ?></h4>
                                        <!-- <span class="badge badge-primary">+3.5%</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body p-4">
                                <div class="media ai-icon">
                                    <span class="mr-3 bgl-primary text-white">
                                        <!-- <i class="ti-user"></i> -->
                                        <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </span>
                                    <div class="media-body">
                                        <p class="mb-1 text-white">Mentor</p>
                                        <h4 class="mb-0 text-white"><?= $tutor->num_rows() ?></h4>
                                        <!-- <span class="badge badge-primary">+3.5%</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 pb-sm-0 pb-5">
                                <h4 class="fs-20">Daftar Acara Terbaru</h4>
                                <div class="dropdown custom-dropdown mb-0">
                                    <div data-toggle="dropdown">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 12.9999C12.5523 12.9999 13 12.5522 13 11.9999C13 11.4477 12.5523 10.9999 12 10.9999C11.4477 10.9999 11 11.4477 11 11.9999C11 12.5522 11.4477 12.9999 12 12.9999Z" stroke="#7E7E7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 5.99994C12.5523 5.99994 13 5.55222 13 4.99994C13 4.44765 12.5523 3.99994 12 3.99994C11.4477 3.99994 11 4.44765 11 4.99994C11 5.55222 11.4477 5.99994 12 5.99994Z" stroke="#7E7E7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 19.9999C12.5523 19.9999 13 19.5522 13 18.9999C13 18.4477 12.5523 17.9999 12 17.9999C11.4477 17.9999 11 18.4477 11 18.9999C11 19.5522 11.4477 19.9999 12 19.9999Z" stroke="#7E7E7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?= site_url('admin/course') ?>">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="event-bx owl-carousel">
                                    <?php 
                                        foreach($news->result() as $row){ 
                                            $participant = $this->M_Enrollment->getByParticipantCourse($row->id)
                                    ?>
                                        <div class="items">
                                            <div class="image-bx">
                                                <img src="<?= base_url('uploads/courses/' . $row->cover) ?>" alt="">
                                                <div class="info">
                                                    <p class="fs-18 font-w600">
                                                        <a href="<?= site_url('course/' . $row->flag . '/detail') ?>" class="text-black" target="__BLANK"><?= $row->judul ?></a>
                                                    </p> 
                                                    <!-- <span class="fs-14 text-black d-block mb-3">London, United Kingdom</span> -->
                                                    <p class="fs-12"><?= $row->deskripsi ?></p>
                                                    <ul>
                                                        <li><i class="las la-dollar-sign"></i><?= rupiah($row->price, $row->discount) ?></li>
                                                        <li><i class="las la-user"></i><?= $participant->num_rows() ?> Peserta</li>
                                                        <!-- <li><i class="las la-clock"></i>08:35 AM</li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>