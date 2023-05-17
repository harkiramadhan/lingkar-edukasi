<main>
    <div class="home-hero_section wf-section">
        <div class="home-hero_container">
            <div data-delay="4000" data-animation="slide" class="home-hero_slider w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                <div class="hero-mask w-slider-mask">
                    <?php foreach($banners->result() as $rowbn){ ?>
                        <div class="slide w-slide">
                            <div class="home-hero_slide">
                            <div class="hero-content_left">
                                <div class="margin-bottom-20">
                                    <h1 class="heading-xxlarge is-yellow no-margin"><?= $rowbn->judul ?></h1>
                                </div>
                                <div><?= $rowbn->deskripsi ?></div>
                                <div class="margin-top-32">
                                    <a href="<?= $rowbn->link ?>" class="button is-white w-button"><?= $rowbn->text ?></a>
                                </div>
                            </div>
                            <div class="hero-slide_image-wrapper">
                                <img src="<?= base_url('uploads/banners/' . $rowbn->img)?>" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 83vw, (max-width: 991px) 400px, 500px" srcset="<?= base_url('uploads/banners/' . $rowbn->img)?> 500w, <?= base_url('uplodas/banners/' . $rowbn->img)?> 883w" alt="" class="hero-slide_image"></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="home_arrow-left w-slider-arrow-left">
                <div class="w-icon-slider-left"></div>
                </div>
                <div class="home_arrow-right w-slider-arrow-right">
                <div class="w-icon-slider-right"></div>
                </div>
                <div class="w-slider-nav w-slider-nav-invert w-round"></div>
            </div>
            <div class="hero_company-wrapper">
                <?php foreach($partner->result() as $rowP){ ?>
                    <img src="<?= base_url('uploads/partner/' . $rowP->img)?>" loading="lazy" alt="<?= $rowP->judul ?>" style="height: 30px;">
                <?php } ?>
            </div>
        </div>
    </div>
    <section class="section wf-section">
        <div class="padding-vertical padding-80">
            <div class="container">
                <div class="w-layout-grid grid-4-column">
                    <?php foreach($benefits->result() as $rowB){ ?>
                    <div id="w-node-ad3a1d84-0d50-3aa3-7474-9fb762263bde-f92afb62" data-w-id="ad3a1d84-0d50-3aa3-7474-9fb762263bde" class="keunggulan-card_wrapper">
                        <div class="keunggulan-card"><img src="<?= base_url('assets/user/images/award-icon.webp')?>" loading="lazy" alt="" class="keunggulan-icon">
                            <h2 class="heading-medium no-margin"><?= $rowB->benefit ?></h2>
                            <div class="text-small"><?= $rowB->deskripsi ?></div>
                        </div>
                        <div class="keunggulan-card_dark-box"></div>
                            <div data-w-id="ad3a1d84-0d50-3aa3-7474-9fb762263be6" class="keunggulan-card_hover">
                            <div><?= $rowB->text ?></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses -->
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
                                $getCourses = $this->M_Courses->getActiveByLabels($l->id, 10);
                        ?>
                            <div data-w-tab="Tab <?= $noL ?>" class="w-tab-pane <?= ($noL == 1) ? 'w--tab-active' : '' ?>">
                                <div class="w-layout-grid grid-4-column">
                                    <?php 
                                        foreach($getCourses->result() as $rowC){ 
                                            $getLabel = $this->M_Labels->getByCourse($rowC->id);
                                    ?>
                                    <div id="w-node-e660144b-2bb6-35ff-374f-59076a41254e-f92afb62" class="kelas-card_wrapper">
                                        <div class="kelas-card_image-wrapper">
                                            <img src="<?= base_url('uplodas/courses/' . $rowC->cover)?>" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, (max-width: 1439px) 92vw, 1296px" srcset="<?= base_url('uplodas/courses/' . $rowC->cover)?> 500w, <?= base_url('uploads/courses/' . $rowC->cover)?> 576w" alt="" class="kelas-card_image">
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
                                                    <h3 class="heading-xtrasmall no-margin"><?= $rowC->judul ?></h3>
                                                </div>
                                                <div class="kelas-card_creator">By <?= $rowC->nama ?></div>
                                            </div>
                                            <div class="kelas-card_harga"><?= discount($rowC->price, $rowC->discount) ?></div>
                                            <div class="divider"></div>
                                            <a href="<?= site_url('/course/' . $rowC->flag . '/detail') ?>" class="button is-yellow w-button">Daftar Kelas</a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php $noL++; } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <div class="section testimonial wf-section">
        <div class="padding-custom_testi">
            <div class="container">
                <div class="testi-slider_bg"></div>
                    <div class="test-slider_wrapper">
                    <div data-delay="4000" data-animation="slide" class="testi-slider w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="false">
                        <div class="testi-mask w-slider-mask">
                            <?php foreach($testimoni->result() as $rowT){ ?>
                            <div class="testi-slide w-slide">
                                <div class="testi-slide_content-wrapper"><img src="<?= base_url('uploads/testimoni/' . $rowT->img)?>" loading="lazy" alt="Testimoni <?= $rowT->nama ?>" class="testi-pp">
                                    <div class="testi-content">
                                        <div class="testi-text"><?= $rowT->testimoni ?></div>
                                        <div class="testi-details">
                                            <div class="testi-name"><?= $rowT->nama ?></div>
                                            <div class="testi-detail_kelas"><?= $rowT->kelas ?></div>
                                        </div>
                                    </div>
                                    <div class="testi-bg"></div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="slider-arrow-left w-slider-arrow-left">
                            <div class="w-icon-slider-left"></div>
                        </div>
                        <div class="slider-arrow-right w-slider-arrow-right">
                            <div class="w-icon-slider-right"></div>
                        </div>
                        <div class="slide-nav w-slider-nav w-round"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="section wf-section">
        <div class="padding-vertical padding-60">
            <div class="container">
                <div class="cta-container_card"><img src="<?= base_url('uploads/settings/' . $setting->cta_img)?>" loading="lazy" alt="" class="cta-container_image">
                    <div class="cta-container_content">
                        <div class="margin-bottom-16">
                            <h2 class="heading-large no-margin"><?= $setting->cta_judul ?></h2>
                        </div>
                        <div><?= $setting->cta_desc ?></div>
                        <div class="margin-top-24">
                            <a href="<?= $setting->cta_link ?>" class="button is-white w-button"><?= $setting->cta_btn_text ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>