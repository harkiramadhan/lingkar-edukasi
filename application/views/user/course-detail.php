
<main>
    <div class="breadcrumbs">
      <div class="breadcrumbs-container">
        <div class="breadcrumb-wrapper">
          <a href="<?= site_url('') ?>" class="breadcrumb w-inline-block">
            <div class="icon-text gap-4">
              <div class="breadcrumb">Beranda</div>
            </div>
          </a>
          <div class="icon-xsmall breadcrumb w-embed"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.14639 2.64639C6.24016 2.55266 6.36731 2.5 6.49989 2.5C6.63248 2.5 6.75963 2.55266 6.85339 2.64639L9.85339 5.64639C9.94713 5.74016 9.99979 5.86731 9.99979 5.99989C9.99979 6.13248 9.94713 6.25963 9.85339 6.35339L6.85339 9.35339C6.75909 9.44447 6.63279 9.49487 6.50169 9.49373C6.37059 9.49259 6.24519 9.44001 6.15248 9.3473C6.05978 9.2546 6.0072 9.12919 6.00606 8.99809C6.00492 8.867 6.05531 8.74069 6.14639 8.64639L8.79289 5.99989L6.14639 3.35339C6.05266 3.25963 6 3.13248 6 2.99989C6 2.86731 6.05266 2.74016 6.14639 2.64639ZM3.14639 2.64639C3.24016 2.55266 3.36731 2.5 3.49989 2.5C3.63248 2.5 3.75963 2.55266 3.85339 2.64639L6.85339 5.64639C6.94713 5.74016 6.99979 5.86731 6.99979 5.99989C6.99979 6.13248 6.94713 6.25963 6.85339 6.35339L3.85339 9.35339C3.75909 9.44447 3.63279 9.49487 3.50169 9.49373C3.37059 9.49259 3.24519 9.44001 3.15248 9.3473C3.05978 9.2546 3.0072 9.12919 3.00606 8.99809C3.00492 8.867 3.05531 8.74069 3.14639 8.64639L5.79289 5.99989L3.14639 3.35339C3.05266 3.25963 3 3.13248 3 2.99989C3 2.86731 3.05266 2.74016 3.14639 2.64639Z" fill="CurrentColor"></path>
            </svg></div>
          <a href="<?= site_url('course') ?>" class="breadcrumb">Course</a>
          <div class="icon-xsmall breadcrumb w-embed"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.14639 2.64639C6.24016 2.55266 6.36731 2.5 6.49989 2.5C6.63248 2.5 6.75963 2.55266 6.85339 2.64639L9.85339 5.64639C9.94713 5.74016 9.99979 5.86731 9.99979 5.99989C9.99979 6.13248 9.94713 6.25963 9.85339 6.35339L6.85339 9.35339C6.75909 9.44447 6.63279 9.49487 6.50169 9.49373C6.37059 9.49259 6.24519 9.44001 6.15248 9.3473C6.05978 9.2546 6.0072 9.12919 6.00606 8.99809C6.00492 8.867 6.05531 8.74069 6.14639 8.64639L8.79289 5.99989L6.14639 3.35339C6.05266 3.25963 6 3.13248 6 2.99989C6 2.86731 6.05266 2.74016 6.14639 2.64639ZM3.14639 2.64639C3.24016 2.55266 3.36731 2.5 3.49989 2.5C3.63248 2.5 3.75963 2.55266 3.85339 2.64639L6.85339 5.64639C6.94713 5.74016 6.99979 5.86731 6.99979 5.99989C6.99979 6.13248 6.94713 6.25963 6.85339 6.35339L3.85339 9.35339C3.75909 9.44447 3.63279 9.49487 3.50169 9.49373C3.37059 9.49259 3.24519 9.44001 3.15248 9.3473C3.05978 9.2546 3.0072 9.12919 3.00606 8.99809C3.00492 8.867 3.05531 8.74069 3.14639 8.64639L5.79289 5.99989L3.14639 3.35339C3.05266 3.25963 3 3.13248 3 2.99989C3 2.86731 3.05266 2.74016 3.14639 2.64639Z" fill="CurrentColor"></path>
            </svg></div>
          <div class="breadcrumb active"><strong class="bold-text"><?= $title ?></strong></div>
        </div>
      </div>
    </div>
    <div class="coursedetail-hero_section wf-section">
      <div class="courselist-hero_container">
        <div class="coursedetail-hero_card">
          <div class="hero-content_left is-60">
            <div class="margin-bottom-20">
              <h1 class="heading-xxlarge is-white no-margin"><?= $course->judul ?></h1>
            </div>
            <div>Mulailah, beralih, atau memajukan karir mu dengan lebih dari 100 kursus dan sertifikat profesional</div>
            <div class="margin-top-24">
              <div class="coursepill_wrapper">
                <div class="coursedetail-hero_pill">
                  <div class="coursedetail-pill-flex"><img src="<?= base_url('assets/user/images/Vectors-Wrapper.svg')?>" loading="lazy" alt="" class="coursepill-icon">
                    <div class="coursepill-text">3 Jam, 2 Menit</div>
                  </div>
                </div>
                <div class="coursedetail-hero_pill">
                  <div class="coursedetail-pill-flex"><img src="<?= base_url('assets/user/images/Account-circle.svg')?>" loading="lazy" alt="" class="coursepill-icon">
                    <div class="coursepill-text">3 Jam, 2 Menit</div>
                  </div>
                </div>
                <div class="coursedetail-hero_pill">
                  <div class="coursedetail-pill-flex"><img src="<?= base_url('assets/user/images/Assessment.svg')?>" loading="lazy" alt="" class="coursepill-icon">
                    <div class="coursepill-text">3 Jam, 2 Menit</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="hero-content_right is-60">
            <div class="cdetail-sidebar-absolute">
              <div class="cdetail-sticky">
                <div class="cdetail-sidebar">
                  <div class="cdetail-kelas_card">
                    <div class="kelas-card_image-wrapper higher">
                      <img src="<?= base_url('uploads/courses/' . $course->cover)?>" loading="lazy" sizes="400px" srcset="<?= base_url('uploads/courses/' . $course->cover)?> 500w, <?= base_url('uploads/courses/' . $course->cover)?> 576w" alt="" class="kelas-card_image">
                    </div>
                    <div class="kelas-card_content">
                      <div class="kelas-card_title-wrapper">
                        <div class="margin-bottom-16">
                          <h2 class="heading-xtrasmall xtrabold no-margin" style="color: #333;">Apa yang kamu dapatkan</h2>
                        </div>
                        <ul role="list" class="kelas-lfeature_lists">
                          <?php foreach($benefit->result() as $rowB){ ?>
                            <li class="kelas-feature_list-item"><i class="<?= $rowB->icon ?>"></i>&nbsp;&nbsp; <?= $rowB->benefit ?></li>
                          <?php } ?>
                        </ul>
                      </div>
                      <div class="divider"></div>
                      <div class="kelas-card_harga"><?= discount($course->price, $course->discount) ?></div>
                    </div>
                    <?php if($this->session->userdata('is_user')): ?>
                      <a href="#" class="kelas-button-full w-button">Daftar Kelas</a>
                    <?php else: ?>
                      <a href="<?= site_url('signin') ?>" class="kelas-button-full w-button">Daftar Kelas</a>
                    <?php endif; ?>
                  </div>
                  <div class="cdetail-tutor">
                    <div class="cdetail-tutor_pill">
                      <div class="pill-text">TENTANG TUTOR</div>
                    </div>
                    <?php if($tutor->img): ?>
                      <img src="<?= base_url('uploads/tutor/' . $tutor->img)?>" loading="lazy" alt="" class="cdetail-tutor_image">
                    <?php else: ?>
                      <img src="<?= base_url('assets/admin/images/placeholder-image.svg')?>" loading="lazy" alt="" class="cdetail-tutor_image">
                    <?php endif; ?>
                    <h2 class="cdetail-tutor-name"><?= $tutor->nama ?></h2>
                    <div class="text-small text-grey">
                      <?= $tutor->deskripsi ?>.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="cdetail-sidebar show-tablet">
          <div class="cdetail-kelas_card">
            <div class="kelas-card_image-wrapper higher"><img src="images/placeholder-1.webp" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, (max-width: 991px) 92vw, 100vw" srcset="images/placeholder-1-p-500.jpg 500w, images/placeholder-1.webp 576w" alt="" class="kelas-card_image"></div>
            <div class="kelas-card_content">
              <div class="kelas-card_title-wrapper">
                <div class="margin-bottom-16">
                  <h2 class="heading-xtrasmall xtrabold no-margin">Apa yang kamu dapatkan</h2>
                </div>
                <ul role="list" class="kelas-lfeature_lists">
                  <?php foreach($benefit->result() as $rowB){ ?>
                    <li class="kelas-feature_list-item"><i class="<?= $rowB->icon ?>"></i>&nbsp;&nbsp; <?= $rowB->benefit ?></li>
                  <?php } ?>
                </ul>
              </div>
              <div class="divider"></div>
              <div class="kelas-card_harga"><?= discount($course->price, $course->discount) ?></div>
            </div>
            <a href="#" class="kelas-button-full w-button">Daftar Kelas</a>
          </div>
          <div class="cdetail-tutor">
            <div class="cdetail-tutor_pill">
              <div class="pill-text">TENTANG TUTOR</div>
            </div>
            <?php if($tutor->img): ?>
              <img src="<?= base_url('uploads/tutor/' . $tutor->img)?>" loading="lazy" alt="" class="cdetail-tutor_image">
            <?php else: ?>
              <img src="<?= base_url('assets/admin/images/placeholder-image.svg')?>" loading="lazy" alt="" class="cdetail-tutor_image">
            <?php endif; ?>
            <h2 class="cdetail-tutor-name"><?= $tutor->nama ?></h2>
            <div class="text-small text-grey">
              <?= $tutor->deskripsi ?>.
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="section wf-section">
      <div class="padding-top padding-60">
        <div class="container">
          <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="coursedetail-tabs w-tabs">
            <div class="cdetail-tabs_menu-wrapper w-tab-menu">
              <a data-w-tab="Tab 1" class="cdetails-tabs_menu w-inline-block w-tab-link w--current">
                <div>DESKRIPSI</div>
              </a>
              <a data-w-tab="Tab 2" class="cdetails-tabs_menu w-inline-block w-tab-link">
                <div>MATERI</div>
              </a>
            </div>
            <div class="coursedetails-tabspane w-tab-content">
              <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
                <div class="coursedetails-tabcontent">
                  <div class="coursedetail-richtext w-richtext">
                    <h5>Deskripsi</h5>
                    <?= $course->deskripsi ?>
                  </div>
                </div>
              </div>
              <div data-w-tab="Tab 2" class="w-tab-pane">
                <div class="coursedetails-tabcontent">
                  <h2 class="heading-small no-margin">Daftar Materi</h2>
                  <div class="materi-accordion">
                    <div data-w-id="94122fb6-3714-9896-362c-306bc39c0a28" class="materi_accordion-item">
                      <div class="materi-accordion_header">
                        <h3 class="materi-accordion_heading">Digital Marketing Pada Sebagian Orang</h3>
                        <div style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0)" class="materi-accordion_icon">
                          <div class="icon-24 w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_186_211)">
                                <path d="M7.41 8.59009L12 13.1701L16.59 8.59009L18 10.0001L12 16.0001L6 10.0001L7.41 8.59009Z" fill="CurrentColor"></path>
                              </g>
                              <defs>
                                <clippath id="clip0_186_211">
                                  <rect width="24" height="24" fill="white" transform="matrix(0 1 -1 0 24 0)"></rect>
                                </clippath>
                              </defs>
                            </svg></div>
                        </div>
                      </div>
                      <div style="height:0px" class="materi-accordion_content">
                        <div class="materi-accordion_padding">
                          <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae tincidunt mauris. Praesent sagittis rutrum augue id sodales. Morbi vulputate interdum ullamcorper. In in lorem sed risus suscipit laoreet. Donec laoreet sapien nec purus tempor auctor. Integer at magna nec elit fringilla ultrices ut ac felis. Cras nec blandit arcu. Curabitur ex ipsum, rhoncus ac dictum et, varius sit amet tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ipsum a leo maximus varius a in sapien.</div>
                        </div>
                      </div>
                    </div>
                    <div data-w-id="ca92d7b7-a210-5263-76ff-74479de5e723" class="materi_accordion-item">
                      <div class="materi-accordion_header">
                        <h3 class="materi-accordion_heading">Digital Marketing Pada Sebagian Orang</h3>
                        <div style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0)" class="materi-accordion_icon">
                          <div class="icon-24 w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_186_211)">
                                <path d="M7.41 8.59009L12 13.1701L16.59 8.59009L18 10.0001L12 16.0001L6 10.0001L7.41 8.59009Z" fill="CurrentColor"></path>
                              </g>
                              <defs>
                                <clippath id="clip0_186_211">
                                  <rect width="24" height="24" fill="white" transform="matrix(0 1 -1 0 24 0)"></rect>
                                </clippath>
                              </defs>
                            </svg></div>
                        </div>
                      </div>
                      <div style="height:0px" class="materi-accordion_content">
                        <div class="materi-accordion_padding">
                          <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae tincidunt mauris. Praesent sagittis rutrum augue id sodales. Morbi vulputate interdum ullamcorper. In in lorem sed risus suscipit laoreet. Donec laoreet sapien nec purus tempor auctor. Integer at magna nec elit fringilla ultrices ut ac felis. Cras nec blandit arcu. Curabitur ex ipsum, rhoncus ac dictum et, varius sit amet tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ipsum a leo maximus varius a in sapien.</div>
                        </div>
                      </div>
                    </div>
                    <div data-w-id="f4388d49-6860-7886-65a2-73d180624a33" class="materi_accordion-item">
                      <div class="materi-accordion_header">
                        <h3 class="materi-accordion_heading">Digital Marketing Pada Sebagian Orang</h3>
                        <div style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0)" class="materi-accordion_icon">
                          <div class="icon-24 w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_186_211)">
                                <path d="M7.41 8.59009L12 13.1701L16.59 8.59009L18 10.0001L12 16.0001L6 10.0001L7.41 8.59009Z" fill="CurrentColor"></path>
                              </g>
                              <defs>
                                <clippath id="clip0_186_211">
                                  <rect width="24" height="24" fill="white" transform="matrix(0 1 -1 0 24 0)"></rect>
                                </clippath>
                              </defs>
                            </svg></div>
                        </div>
                      </div>
                      <div style="height:0px" class="materi-accordion_content">
                        <div class="materi-accordion_padding">
                          <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae tincidunt mauris. Praesent sagittis rutrum augue id sodales. Morbi vulputate interdum ullamcorper. In in lorem sed risus suscipit laoreet. Donec laoreet sapien nec purus tempor auctor. Integer at magna nec elit fringilla ultrices ut ac felis. Cras nec blandit arcu. Curabitur ex ipsum, rhoncus ac dictum et, varius sit amet tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ipsum a leo maximus varius a in sapien.</div>
                        </div>
                      </div>
                    </div>
                    <div data-w-id="fa2f058b-0cb3-7884-1d62-0259981c25b8" class="materi_accordion-item">
                      <div class="materi-accordion_header">
                        <h3 class="materi-accordion_heading">Digital Marketing Pada Sebagian Orang</h3>
                        <div style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0)" class="materi-accordion_icon">
                          <div class="icon-24 w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_186_211)">
                                <path d="M7.41 8.59009L12 13.1701L16.59 8.59009L18 10.0001L12 16.0001L6 10.0001L7.41 8.59009Z" fill="CurrentColor"></path>
                              </g>
                              <defs>
                                <clippath id="clip0_186_211">
                                  <rect width="24" height="24" fill="white" transform="matrix(0 1 -1 0 24 0)"></rect>
                                </clippath>
                              </defs>
                            </svg></div>
                        </div>
                      </div>
                      <div style="height:0px" class="materi-accordion_content">
                        <div class="materi-accordion_padding">
                          <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae tincidunt mauris. Praesent sagittis rutrum augue id sodales. Morbi vulputate interdum ullamcorper. In in lorem sed risus suscipit laoreet. Donec laoreet sapien nec purus tempor auctor. Integer at magna nec elit fringilla ultrices ut ac felis. Cras nec blandit arcu. Curabitur ex ipsum, rhoncus ac dictum et, varius sit amet tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ipsum a leo maximus varius a in sapien.</div>
                        </div>
                      </div>
                    </div>
                    <div data-w-id="eb6d45f1-279c-26bd-c77d-60fba9e24706" class="materi_accordion-item">
                      <div class="materi-accordion_header">
                        <h3 class="materi-accordion_heading">Digital Marketing Pada Sebagian Orang</h3>
                        <div style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0)" class="materi-accordion_icon">
                          <div class="icon-24 w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_186_211)">
                                <path d="M7.41 8.59009L12 13.1701L16.59 8.59009L18 10.0001L12 16.0001L6 10.0001L7.41 8.59009Z" fill="CurrentColor"></path>
                              </g>
                              <defs>
                                <clippath id="clip0_186_211">
                                  <rect width="24" height="24" fill="white" transform="matrix(0 1 -1 0 24 0)"></rect>
                                </clippath>
                              </defs>
                            </svg></div>
                        </div>
                      </div>
                      <div style="height:0px" class="materi-accordion_content">
                        <div class="materi-accordion_padding">
                          <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae tincidunt mauris. Praesent sagittis rutrum augue id sodales. Morbi vulputate interdum ullamcorper. In in lorem sed risus suscipit laoreet. Donec laoreet sapien nec purus tempor auctor. Integer at magna nec elit fringilla ultrices ut ac felis. Cras nec blandit arcu. Curabitur ex ipsum, rhoncus ac dictum et, varius sit amet tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ipsum a leo maximus varius a in sapien.</div>
                        </div>
                      </div>
                    </div>
                    <div data-w-id="b114e39c-f904-8c65-b58a-1a41ada55e41" class="materi_accordion-item">
                      <div class="materi-accordion_header">
                        <h3 class="materi-accordion_heading">Digital Marketing Pada Sebagian Orang</h3>
                        <div style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0)" class="materi-accordion_icon">
                          <div class="icon-24 w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_186_211)">
                                <path d="M7.41 8.59009L12 13.1701L16.59 8.59009L18 10.0001L12 16.0001L6 10.0001L7.41 8.59009Z" fill="CurrentColor"></path>
                              </g>
                              <defs>
                                <clippath id="clip0_186_211">
                                  <rect width="24" height="24" fill="white" transform="matrix(0 1 -1 0 24 0)"></rect>
                                </clippath>
                              </defs>
                            </svg></div>
                        </div>
                      </div>
                      <div style="height:0px" class="materi-accordion_content">
                        <div class="materi-accordion_padding">
                          <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae tincidunt mauris. Praesent sagittis rutrum augue id sodales. Morbi vulputate interdum ullamcorper. In in lorem sed risus suscipit laoreet. Donec laoreet sapien nec purus tempor auctor. Integer at magna nec elit fringilla ultrices ut ac felis. Cras nec blandit arcu. Curabitur ex ipsum, rhoncus ac dictum et, varius sit amet tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ipsum a leo maximus varius a in sapien.</div>
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
      <div class="cdetail-spacer"></div>
    </section>
  </main>