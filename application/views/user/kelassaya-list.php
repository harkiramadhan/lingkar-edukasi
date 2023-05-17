<main>
    <section class="section wf-section">
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
                <div class="breadcrumb active"><strong class="bold-text">Kelas Saya</strong></div>
            </div>
            </div>
        </div>
      <div class="padding-top padding-40">
        <div class="container">
          <div class="section-title-wrapper">
            <h2>Kelas Saya</h2>
            <div>Ini adalah kelas paling populer di Indonesia</div>
          </div>
          <div class="kelassaya-tabs-wrapper">
            <div data-current="Tab 3" data-easing="ease" data-duration-in="300" data-duration-out="100" class="kelassaya-tabs w-tabs">
              
              <div class="kelassaya-tabs_menu-wrapper w-tab-menu">
                <a data-w-tab="Tab 1" class="kelassaya-tabs_menu w-inline-block w-tab-link w--current">
                  <div>SEMUA</div>
                </a>
                <a data-w-tab="Tab 2" class="kelassaya-tabs_menu w-inline-block w-tab-link">
                  <div>DALAM PROGRESS</div>
                </a>
                <a data-w-tab="Tab 3" class="kelassaya-tabs_menu w-inline-block w-tab-link">
                  <div>SELESAI</div>
                </a>
              </div>

              <div class="kelassaya-tabs_content w-tab-content">
                <div data-w-tab="Tab 1" class="w-tab-pane">
                  <div class="w-layout-grid grid-3-column">
                    <?php 
                      foreach($courses->result() as $row){ 
                        $getLabel = $this->M_Labels->getByCourse($row->id);
                    ?>
                      <div id="w-node-_765fa7cf-7d33-c769-3fe3-7817d76ef249-9de08e24" class="kelas-card_wrapper">
                        <div class="kelas-card_image-wrapper">
                          <img src="<?= base_url('uploads/courses/' . $row->cover)?>" loading="lazy" sizes="100vw" srcset="<?= base_url('uploads/courses/' . $row->cover)?> 500w, <?= base_url('uploads/courses/' . $row->cover)?> 576w" alt="" class="kelas-card_image">
                        </div>
                        <div class="kelas-card_content">
                          <div style="display: flex;">
                            <?php foreach($getLabel->result() as $ll){ ?>
                              <div class="kelas-kategori_pill">
                                <div class="pill-text"><?= $ll->label ?></div>
                              </div> &nbsp;
                            <?php } ?>
                          </div>
                          <div class="kelas-card_title-wrapper">
                            <div class="margin-bottom-8">
                              <h3 class="heading-xtrasmall no-margin"><?= $row->judul ?></h3>
                            </div>
                            <div class="kelas-card_creator">By <?= $row->nama ?></div>
                          </div>
                          <div class="kelas-card_harga"><?= discount($row->price, $row->discount) ?></div>
                          <div class="divider"></div>
                          <a href="<?= site_url('kelas/' . $row->flag . '/detail') ?>" class="button is-yellow w-button">Lihat Kelas</a>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
                <div data-w-tab="Tab 2" class="w-tab-pane">
                  <div class="w-layout-grid grid-3-column">
                    <?php 
                      foreach($courses->result() as $inv){ 
                        $getLabell = $this->M_Labels->getByCourse($inv->id);
                    ?>
                      <div id="w-node-a11dc847-0c6b-85db-8c0a-4e5cc7c0f878-9de08e24" class="kelas-card_wrapper">
                        <div class="kelas-card_image-wrapper">
                          <img src="<?= base_url('uploads/courses/' . $inv->cover)?>" loading="lazy" sizes="100vw" srcset="<?= base_url('uploads/courses/' . $inv->cover)?> 500w, <?= base_url('uploads/courses/' . $inv->cover)?> 576w" alt="" class="kelas-card_image">
                        </div>
                        <div class="kelas-card_content">
                          <div style="display: flex;">
                            <?php foreach($getLabell->result() as $lll){ ?>
                              <div class="kelas-kategori_pill">
                                <div class="pill-text"><?= $lll->label ?></div>
                              </div> &nbsp;
                            <?php } ?>
                          </div>
                          <div class="kelas-card_title-wrapper">
                            <div class="margin-bottom-8">
                              <h3 class="heading-xtrasmall no-margin"><?= $inv->judul ?></h3>
                            </div>
                            <div class="kelas-card_creator">By <?= $inv->nama ?></div>
                          </div>
                          <div class="kelas-card_harga"><?= discount($inv->price, $row->discount) ?></div>
                          <div class="divider"></div>
                          <a href="<?= site_url('invoice/' . $inv->orderid . '/pdf') ?>" class="button is-yellow w-button">Daftar Kelas</a>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
                <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
                  <div class="w-layout-grid grid-3-column">
                    <div id="w-node-d86499e9-902e-7049-e8a2-b8f7a655abbc-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-1.webp" loading="lazy" sizes="100vw" srcset="images/placeholder-1-p-500.jpg 500w, images/placeholder-1.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="kelas-card_harga">799.000</div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">Daftar Kelas</a>
                      </div>
                    </div>
                    <div id="w-node-d86499e9-902e-7049-e8a2-b8f7a655abce-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-2.webp" loading="lazy" sizes="100vw" srcset="images/placeholder-2-p-500.jpg 500w, images/placeholder-2.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="kelas-card_harga">799.000</div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">Daftar Kelas</a>
                      </div>
                    </div>
                    <div id="w-node-d86499e9-902e-7049-e8a2-b8f7a655abe0-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-1.webp" loading="lazy" sizes="100vw" srcset="images/placeholder-1-p-500.jpg 500w, images/placeholder-1.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="kelas-card_harga">799.000</div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">Daftar Kelas</a>
                      </div>
                    </div>
                    <div id="w-node-d86499e9-902e-7049-e8a2-b8f7a655abf2-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-2.webp" loading="lazy" sizes="100vw" srcset="images/placeholder-2-p-500.jpg 500w, images/placeholder-2.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="kelas-card_harga">799.000</div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">Daftar Kelas</a>
                      </div>
                    </div>
                    <div id="w-node-d86499e9-902e-7049-e8a2-b8f7a655ac04-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-1.webp" loading="lazy" sizes="100vw" srcset="images/placeholder-1-p-500.jpg 500w, images/placeholder-1.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="kelas-card_harga">799.000</div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">Daftar Kelas</a>
                      </div>
                    </div>
                    <div id="w-node-d86499e9-902e-7049-e8a2-b8f7a655ac16-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-2.webp" loading="lazy" sizes="100vw" srcset="images/placeholder-2-p-500.jpg 500w, images/placeholder-2.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="kelas-card_harga">799.000</div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">Daftar Kelas</a>
                      </div>
                    </div>
                    <div id="w-node-d86499e9-902e-7049-e8a2-b8f7a655ac28-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-1.webp" loading="lazy" sizes="100vw" srcset="images/placeholder-1-p-500.jpg 500w, images/placeholder-1.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="kelas-card_harga">799.000</div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">Daftar Kelas</a>
                      </div>
                    </div>
                    <div id="w-node-d86499e9-902e-7049-e8a2-b8f7a655ac3a-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-2.webp" loading="lazy" sizes="100vw" srcset="images/placeholder-2-p-500.jpg 500w, images/placeholder-2.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="kelas-card_harga">799.000</div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">Daftar Kelas</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="kelas-tabs w-tabs">
              <div class="kelas-tabs_menu-wrapper w-tab-menu">
                <a data-w-tab="Tab 1" class="kelas-tabs_menu w-inline-block w-tab-link w--current">
                  <div>COURSE</div>
                </a>
                <a data-w-tab="Tab 2" class="kelas-tabs_menu w-inline-block w-tab-link">
                  <div>INVOICE</div>
                </a>
                <a data-w-tab="Tab 3" class="kelas-tabs_menu w-inline-block w-tab-link">
                  <div>CERTIFICATE</div>
                </a>
              </div>
              <div class="kelas-tabs_content marginless w-tab-content">
                <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
                  <div class="w-layout-grid grid-3-column">
                    <?php 
                      foreach($courses->result() as $row){ 
                        $getLabel = $this->M_Labels->getByCourse($row->id);
                    ?>
                      <div id="w-node-e660144b-2bb6-35ff-374f-59076a41254e-9de08e24" class="kelas-card_wrapper">
                        <div class="kelas-card_image-wrapper">
                          <img src="<?= base_url('uploads/courses/' . $row->cover)?>" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, 457.390625px" srcset="<?= base_url('uploads/courses/' . $row->cover)?> 500w, <?= base_url('uploads/courses/' . $row->cover)?> 576w" alt="" class="kelas-card_image">
                        </div>
                        <div class="kelas-card_content">
                          <div style="display: flex;">
                            <?php foreach($getLabel->result() as $l){ ?>
                              <div class="kelas-kategori_pill">
                                  <div class="pill-text"><?= $l->label ?></div>
                              </div> &nbsp;
                            <?php } ?>
                          </div>
                          <div class="kelas-card_title-wrapper">
                            <div class="margin-bottom-8">
                              <h3 class="heading-xtrasmall no-margin"><?= $row->judul ?></h3>
                            </div>
                            <div class="kelas-card_creator">By <?= $row->nama ?></div>
                          </div>
                          <div class="kelas-card_harga"><?= discount($row->price, $row->discount) ?></div>
                          <div class="divider"></div>
                          <a href="<?= site_url('kelas/' . $row->flag . '/detail') ?>" class="button is-yellow w-button">Lihat Kelas</a>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
                <div data-w-tab="Tab 2" class="w-tab-pane">
                  <div class="w-layout-grid grid-3-column">
                    <?php 
                      foreach($courses->result() as $inv){ 
                        $getLabel = $this->M_Labels->getByCourse($inv->id);
                    ?>
                      <div id="w-node-e2e08830-b906-9521-435f-58d6cd2026aa-9de08e24" class="kelas-card_wrapper">
                        <div class="kelas-card_image-wrapper">
                          <img src="<?= base_url('uploads/courses/' . $inv->cover)?>" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, 457.390625px" srcset="<?= base_url('uploads/courses/' . $inv->cover)?> 500w, <?= base_url('uploads/courses/' . $inv->cover)?> 576w" alt="" class="kelas-card_image">
                        </div>
                        <div class="kelas-card_content">
                          <div style="display: flex;">
                            <?php foreach($getLabel->result() as $lli){ ?>
                              <div class="kelas-kategori_pill">
                                  <div class="pill-text"><?= $lli->label ?></div>
                              </div> &nbsp;
                            <?php } ?>
                          </div>
                          <div class="kelas-card_title-wrapper">
                            <div class="margin-bottom-8">
                              <h3 class="heading-xtrasmall no-margin"><?= $inv->judul ?></h3>
                            </div>
                            <div class="kelas-card_creator">By <?= $inv->nama ?></div>
                          </div>
                          <div class="divider"></div>
                          <a href="<?= site_url('invoice/' . $inv->orderid . '/pdf') ?>" class="button is-yellow w-button">Download Invoice</a>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
                <div data-w-tab="Tab 3" class="w-tab-pane">
                  <div class="w-layout-grid grid-3-column">
                    <div id="w-node-_3f78bbea-2b61-79e4-8d0b-ed933599677b-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-1.webp" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, 457.390625px" srcset="images/placeholder-1-p-500.jpg 500w, images/placeholder-1.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">DOWNLOAD SERTIFIKAT</a>
                      </div>
                    </div>
                    <div id="w-node-_3f78bbea-2b61-79e4-8d0b-ed933599678d-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-2.webp" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, 457.390625px" srcset="images/placeholder-2-p-500.jpg 500w, images/placeholder-2.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">DOWNLOAD SERTIFIKAT</a>
                      </div>
                    </div>
                    <div id="w-node-_3f78bbea-2b61-79e4-8d0b-ed933599679f-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-1.webp" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, 457.390625px" srcset="images/placeholder-1-p-500.jpg 500w, images/placeholder-1.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">DOWNLOAD SERTIFIKAT</a>
                      </div>
                    </div>
                    <div id="w-node-_3f78bbea-2b61-79e4-8d0b-ed93359967b1-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-2.webp" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, 457.390625px" srcset="images/placeholder-2-p-500.jpg 500w, images/placeholder-2.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">DOWNLOAD SERTIFIKAT</a>
                      </div>
                    </div>
                    <div id="w-node-_3f78bbea-2b61-79e4-8d0b-ed93359967c3-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-1.webp" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, 457.390625px" srcset="images/placeholder-1-p-500.jpg 500w, images/placeholder-1.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">DOWNLOAD SERTIFIKAT</a>
                      </div>
                    </div>
                    <div id="w-node-_3f78bbea-2b61-79e4-8d0b-ed93359967d5-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-2.webp" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, 457.390625px" srcset="images/placeholder-2-p-500.jpg 500w, images/placeholder-2.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">DOWNLOAD SERTIFIKAT</a>
                      </div>
                    </div>
                    <div id="w-node-_3f78bbea-2b61-79e4-8d0b-ed93359967e7-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-1.webp" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, 457.390625px" srcset="images/placeholder-1-p-500.jpg 500w, images/placeholder-1.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">DOWNLOAD SERTIFIKAT</a>
                      </div>
                    </div>
                    <div id="w-node-_3f78bbea-2b61-79e4-8d0b-ed93359967f9-9de08e24" class="kelas-card_wrapper">
                      <div class="kelas-card_image-wrapper"><img src="images/placeholder-2.webp" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, 457.390625px" srcset="images/placeholder-2-p-500.jpg 500w, images/placeholder-2.webp 576w" alt="" class="kelas-card_image"></div>
                      <div class="kelas-card_content">
                        <div class="kelas-kategori_pill">
                          <div class="pill-text">EKONOMI</div>
                        </div>
                        <div class="kelas-card_title-wrapper">
                          <div class="margin-bottom-8">
                            <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                          </div>
                          <div class="kelas-card_creator">By Satria Sambiring</div>
                        </div>
                        <div class="divider"></div>
                        <a href="#" class="button is-yellow w-button">DOWNLOAD SERTIFIKAT</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>