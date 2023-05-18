<main>
    <section class="section testimonial wf-section">
      <div class="breadcrumbs">
        <div class="breadcrumbs-container">
          <div class="breadcrumb-wrapper">
            <a href="<?= site_url('') ?>" class="breadcrumb w-inline-block">
              <div class="icon-text gap-4">
                <div class="breadcrumb">Beranda</div>
              </div>
            </a>
            <div class="icon-xsmall breadcrumb w-embed"><svg width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.14639 2.64639C6.24016 2.55266 6.36731 2.5 6.49989 2.5C6.63248 2.5 6.75963 2.55266 6.85339 2.64639L9.85339 5.64639C9.94713 5.74016 9.99979 5.86731 9.99979 5.99989C9.99979 6.13248 9.94713 6.25963 9.85339 6.35339L6.85339 9.35339C6.75909 9.44447 6.63279 9.49487 6.50169 9.49373C6.37059 9.49259 6.24519 9.44001 6.15248 9.3473C6.05978 9.2546 6.0072 9.12919 6.00606 8.99809C6.00492 8.867 6.05531 8.74069 6.14639 8.64639L8.79289 5.99989L6.14639 3.35339C6.05266 3.25963 6 3.13248 6 2.99989C6 2.86731 6.05266 2.74016 6.14639 2.64639ZM3.14639 2.64639C3.24016 2.55266 3.36731 2.5 3.49989 2.5C3.63248 2.5 3.75963 2.55266 3.85339 2.64639L6.85339 5.64639C6.94713 5.74016 6.99979 5.86731 6.99979 5.99989C6.99979 6.13248 6.94713 6.25963 6.85339 6.35339L3.85339 9.35339C3.75909 9.44447 3.63279 9.49487 3.50169 9.49373C3.37059 9.49259 3.24519 9.44001 3.15248 9.3473C3.05978 9.2546 3.0072 9.12919 3.00606 8.99809C3.00492 8.867 3.05531 8.74069 3.14639 8.64639L5.79289 5.99989L3.14639 3.35339C3.05266 3.25963 3 3.13248 3 2.99989C3 2.86731 3.05266 2.74016 3.14639 2.64639Z" fill="CurrentColor"></path>
              </svg></div>
            <a href="<?= site_url('course') ?>" class="breadcrumb">Course</a>
            <div class="icon-xsmall breadcrumb w-embed"><svg width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.14639 2.64639C6.24016 2.55266 6.36731 2.5 6.49989 2.5C6.63248 2.5 6.75963 2.55266 6.85339 2.64639L9.85339 5.64639C9.94713 5.74016 9.99979 5.86731 9.99979 5.99989C9.99979 6.13248 9.94713 6.25963 9.85339 6.35339L6.85339 9.35339C6.75909 9.44447 6.63279 9.49487 6.50169 9.49373C6.37059 9.49259 6.24519 9.44001 6.15248 9.3473C6.05978 9.2546 6.0072 9.12919 6.00606 8.99809C6.00492 8.867 6.05531 8.74069 6.14639 8.64639L8.79289 5.99989L6.14639 3.35339C6.05266 3.25963 6 3.13248 6 2.99989C6 2.86731 6.05266 2.74016 6.14639 2.64639ZM3.14639 2.64639C3.24016 2.55266 3.36731 2.5 3.49989 2.5C3.63248 2.5 3.75963 2.55266 3.85339 2.64639L6.85339 5.64639C6.94713 5.74016 6.99979 5.86731 6.99979 5.99989C6.99979 6.13248 6.94713 6.25963 6.85339 6.35339L3.85339 9.35339C3.75909 9.44447 3.63279 9.49487 3.50169 9.49373C3.37059 9.49259 3.24519 9.44001 3.15248 9.3473C3.05978 9.2546 3.0072 9.12919 3.00606 8.99809C3.00492 8.867 3.05531 8.74069 3.14639 8.64639L5.79289 5.99989L3.14639 3.35339C3.05266 3.25963 3 3.13248 3 2.99989C3 2.86731 3.05266 2.74016 3.14639 2.64639Z" fill="CurrentColor"></path>
              </svg></div>
            <div class="breadcrumb active"><strong class="bold-text"><?= $course->judul ?></strong></div>
          </div>
        </div>
      </div>
      <div class="padding-top">
        <div class="container">
          <div class="section-title-wrapper">
            <h2>Kelas Saya</h2>
            <div>Ini adalah kelas paling populer di Indonesia</div>
          </div>
          <div class="detail-kelas_wrapper">
            <div data-hover="false" data-delay="0" class="detail-kelas_dropdown w-dropdown">
              <div class="detail-kelas_dropdown-toggle w-dropdown-toggle">
                <div class="w-icon-dropdown-toggle"></div>
                <div>Playlist Video</div>
              </div>
              <nav class="detail-kelas_dropdown-list w-dropdown-list">
                <div class="detail-tab-menu_wrapper">
                  <?php
                    foreach($materi->result() as $mRow){ 
                      $video = $this->M_Video->getByMateri($mRow->id);
                  ?>
                    <div data-hover="false" data-delay="0" class="detail-dropdown w-dropdown">
                      <div class="detail-dropdown_toggle w-dropdown-toggle">
                        <div class="w-icon-dropdown-toggle"></div>
                        <div><?= mb_strimwidth($mRow->materi, 0, 25, "...") ?> &nbsp;&nbsp;&nbsp;</div>
                      </div>
                      <nav class="detail-dropdown_list w-dropdown-list">
                        <?php foreach($video->result() as $vRow){ ?>
                          <a id="tab_menu-1b" href="#" class="accordion-tab_menu current w-inline-block">
                            <div class="tabs-menu_icon">
                              <div class="icon-embed-small w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0_202_345)">
                                    <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17X.52 22 12C22 6.48 17.52 2 12 2ZM10 16.5V7.5L16 12L10 16.5Z" fill="CurrentColor"></path>
                                  </g>
                                  <defs>
                                    <clippath id="clip0_202_345">
                                      <rect width="24" height="24" fill="white"></rect>
                                    </clippath>
                                  </defs>
                                </svg></div>
                            </div>
                            <div><?= $vRow->judul ?></div>
                          </a>
                        <?php } ?>
                      </nav>
                    </div>
                  <?php } ?>
                </div>
              </nav>
            </div>
            <div class="detail-tab-menu_wrapper hide-mobile_landscape">
              <?php 
                foreach($materi->result() as $mRow){ 
                  $video = $this->M_Video->getByMateri($mRow->id);
              ?>
              <div data-hover="false" data-delay="0" class="detail-dropdown w-dropdown">
                <div class="detail-dropdown_toggle w-dropdown-toggle">
                  <div class="w-icon-dropdown-toggle"></div>
                  <div><?= mb_strimwidth($mRow->materi, 0, 25, "...") ?> &nbsp;&nbsp;&nbsp;</div>
                </div>
                <nav class="detail-dropdown_list w-dropdown-list w--open">
                  <?php foreach($video->result() as $vRow){ ?>
                    <a id="tab_menu-1b" href="<?= site_url('kelas/' . $course->flag . '/detail?video=' . md5($vRow->id)) ?>" class="accordion-tab_menu w-inline-block <?= ($this->input->get('video', TRUE) == md5($vRow->id)) ? 'current' : '' ?>">
                      <div class="tabs-menu_icon">
                        <div class="icon-embed-small w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_202_345)">
                              <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 16.5V7.5L16 12L10 16.5Z" fill="CurrentColor"></path>
                            </g>
                            <defs>
                              <clippath id="clip0_202_345">
                                <rect width="24" height="24" fill="white"></rect>
                              </clippath>
                            </defs>
                          </svg></div>
                      </div>
                      <div><?= $vRow->judul ?></div>
                    </a>
                  <?php } ?>
                </nav>
              </div>
              <?php } ?>
            </div>
            <div class="detail-tab-content">

              <?php if(@$videos): ?>
                <div class="kelas-nav-wrapper">
                  <a href="#" class="video-before-nav w-inline-block">
                    <div class="w-icon-slider-left"></div>
                  </a>
                  <a href="#" class="video-after-nav w-inline-block">
                    <p class="slide-arrow_text">Video Berikutnya</p>
                    <div class="arrow-icon w-icon-slider-right"></div>
                  </a>
                </div>

                <div class="video-detail_kelas">
                  <div style="padding-top:56.17021276595745%" class="video w-video w-embed">
                    <iframe class="embedly-embed" src="<?= base_url('uploads/courses/videos/' . $videos->video) ?>" scrolling="no" allowfullscreen="" title="Lingkar Edukasi - Video - <?= $videos->video ?>"></iframe>
                  </div>
                </div>
              <?php endif; ?>

              <div class="deskripsi-detail_kelas">
                <div class="deskripsi-title">
                  <div class="semibolld is-white">DESKRIPSI</div>
                </div>
                <div class="deskripsi-content">
                  <div class="deskripsi-content_content">
                    <h1 class="heading-detail_kelas">Deskripsi</h1>
                    <p class="paragraph-small"><?= $course->deskripsi ?></p>
                    <h1 class="heading-detail_kelas">Apa yang kamu pelajari</h1>
                    <p class="paragraph-small">Donec nulla massa, feugiat id ornare quis, consequat non massa. Nunc pulvinar ac arcu eu rhoncus. Morbi condimentum dolor in tortor commodo cursus id euismod purus. Sed sit amet odio eget sapien tristique ultricies interdum sed nisi. Curabitur molestie porttitor elementum. Donec eu diam lectus. Nunc vel blandit nibh. Duis eget posuere augue. Quisque vehicula laoreet urna quis pulvinar.</p>
                  </div>
                </div>
              </div>
              <div class="tentang-tutor_wrapper">
                <div class="tutor-data">
                  <div class="foto-tutor">
                    <?php if($tutor->img): ?>
                      <img src="<?= base_url('uploads/tutor/' . $tutor->img)?>" loading="lazy" alt="" class="tutor-foto">
                    <?php else: ?>
                      <img src="<?= base_url('assets/admin/images/placeholder-image.svg')?>" loading="lazy" alt="" class="tutor-foto">
                    <?php endif; ?>
                  </div>
                  <h1 class="tutor-name"><?= $tutor->nama ?></h1>
                </div>
                <div class="tutor-detail">
                  <div class="tutor-detail_title">
                    <div>TENTANG TUTOR</div>
                  </div>
                  <p class="paragraph-small"><?= $tutor->deskripsi ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>