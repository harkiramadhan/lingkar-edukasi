
<main>
    <div class="courselist-hero_section wf-section">
      <div class="courselist-hero_container">
        <div class="courselist-hero_card">
          <div class="hero-content_left">
            <div class="margin-bottom-20">
              <h1 class="heading-xxlarge is-yellow no-margin">Tingkatkan keterampilan dan karier mu!</h1>
            </div>
            <div>Mulailah, beralih, atau memajukan karir mu dengan lebih dari 100 kursus dan sertifikat profesional</div>
          </div>
          <div class="hero-slide_image-wrapper"><img src="<?= base_url('assets/user/images/home-hero-mainimage.webp')?>" loading="lazy" sizes="(max-width: 479px) 85vw, (max-width: 500px) 83vw, (max-width: 991px) 300px, 400px" srcset="<?= base_url('assets/user/images/home-hero-mainimage.webp')?> 500w, <?= base_url('assets/user/images/home-hero-mainimage.webp')?> 883w" alt="" class="hero-slide_image"></div>
        </div>
      </div>
    </div>
    <section class="section wf-section">
      <div class="padding-top padding-60">
        <div class="container">
          <div class="section-title-wrapper">
            <h2><?= $setting->judul_section_course ?></h2>
            <div><?= $setting->deskripsi_section_course ?></div>
          </div>
          <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="kelas-tabs w-tabs">
            <div class="kelas-tabs_menu-wrapper w-tab-menu">
              <?php 
                  $noS = 1;
                  foreach($labels->result() as $ls){
              ?>
              <a data-w-tab="Tab <?= $noS ?>" class="kelas-tabs_menu w-inline-block w-tab-link <?= ($noS == 1) ? 'w--current' : '' ?>">
                  <div><?= $ls->label ?></div>
              </a>
              <?php $noS++; } ?>
            </div>
            <div class="kelas-tabs_content w-tab-content">

              <?php 
                  $noL = 1;
                  foreach($labels->result() as $l){
              ?>
              <div data-w-tab="Tab <?= $noL ?>" class="w-tab-pane <?= ($noL == 1) ? 'w--tab-active' : '' ?>">
                  <div class="w-layout-grid grid-4-column">
                      <div id="w-node-e660144b-2bb6-35ff-374f-59076a41254e-f92afb62" class="kelas-card_wrapper">
                          <div class="kelas-card_image-wrapper"><img src="<?= base_url('assets/user/images/placeholder-1.webp')?>" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, (max-width: 1439px) 92vw, 1296px" srcset="<?= base_url('assets/user/images/placeholder-2.webp')?> 500w, <?= base_url('assets/user/images/placeholder-2.webp')?> 576w" alt="" class="kelas-card_image"></div>
                          <div class="kelas-card_content">
                              <div class="kelas-kategori_pill">
                              <div class="pill-text"><?= $l->label ?></div>
                              </div>
                              <div class="kelas-card_title-wrapper">
                              <div class="margin-bottom-8">
                                  <h3 class="heading-xtrasmall no-margin">Ini adalah kelas paling populer di Indonesia</h3>
                              </div>
                              <div class="kelas-card_creator">By Satria Sambiring</div>
                              </div>
                              <div class="kelas-card_harga">Rp. 799.000</div>
                              <div class="divider"></div>
                              <a href="<?= site_url('/course/detail') ?>" class="button is-yellow w-button">Daftar Kelas</a>
                          </div>
                      </div>
                  </div>
              </div>
              <?php $noL++; } ?>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>