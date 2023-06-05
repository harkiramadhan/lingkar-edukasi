<style>
  .star {
    cursor: pointer;
  }

  .star .fa-star {
    color: gray;
  }

  .star.active .fa-star {
    color: gold;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
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
            <div class="margin-top-24">
              <div class="coursepill_wrapper">
                <div class="coursedetail-hero_pill">
                  <div class="coursedetail-pill-flex"><img src="<?= base_url('assets/user/images/Vectors-Wrapper.svg')?>" loading="lazy" alt="" class="coursepill-icon">
                    <div class="coursepill-text durasi-materi"><?= @$durasi->jumlah ?></div>
                  </div>
                </div>
                <div class="coursedetail-hero_pill">
                  <div class="coursedetail-pill-flex"><img src="<?= base_url('assets/user/images/Account-circle.svg')?>" loading="lazy" alt="" class="coursepill-icon">
                    <div class="coursepill-text"><?= @$participant->num_rows() ?> Participant</div>
                  </div>
                </div>
                <div class="coursedetail-hero_pill">
                  <div class="coursedetail-pill-flex"><img src="<?= base_url('assets/user/images/Assessment.svg')?>" loading="lazy" alt="" class="coursepill-icon">
                    <div class="coursepill-text"><?= ($course->level == 1) ? 'Beginner' : (($course->level == 2) ? 'Medium' : 'Advanced') ?></div>
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
                      <?php if(@$status->num_rows() > 0): ?>
                        <a href="<?= site_url('kelas/' . $course->flag . '/detail') ?>" class="kelas-button-full w-button">Lihat Kelas</a>
                      <?php else: ?>
                        <a href="#" class="kelas-button-full w-button pay-button">Daftar Kelas</a>
                      <?php endif; ?>
                    <?php else: ?>
                      <a href="<?= site_url('signin') ?>" class="kelas-button-full w-button">Daftar Kelas</a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="cdetail-sidebar show-tablet">
          <div class="cdetail-kelas_card">
            <div class="kelas-card_image-wrapper higher">
              <img src="<?= base_url('uploads/courses/' . $course->cover) ?>" loading="lazy" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, (max-width: 991px) 92vw, 100vw" srcset="<?= base_url('uploads/courses/' .  $course->cover) ?> 500w, <?= base_url('uploads/courses/' . $course->cover) ?> 576w" alt="" class="kelas-card_image">
            </div>
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
            <?php if($this->session->userdata('is_user')): ?>
              <a href="#" class="kelas-button-full w-button pay-button">Daftar Kelas</a>
            <?php else: ?>
              <a href="<?= site_url('signin') ?>" class="kelas-button-full w-button">Daftar Kelas</a>
            <?php endif; ?>
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

                    <?php 
                      $totalDurasi = [];
                      foreach($materi->result() as $mRow){ 
                        $video = $this->M_Video->getByMateri($mRow->id);
                    ?>
                      <div data-w-id="94122fb6-3714-9896-362c-306bc39c0a28-<?= $mRow->id ?>" class="materi_accordion-item">
                        <div class="materi-accordion_header">
                          <h3 class="materi-accordion_heading"><?= $mRow->materi ?></h3>
                          <div class="coursepill-text" style="color: #000000;" id="durasi-materi-<?= $mRow->id ?>"></div>
                        </div>
                        <ul>
                          <?php 
                            $totalDurasiMateri = [];
                            foreach($video->result() as $vRow){
                              array_push($totalDurasiMateri, $vRow->durasi);
                              array_push($totalDurasi, $vRow->durasi);
                          ?>
                            <li class="materi-accordion_header_item"><?= $vRow->judul ?></li>
                          <?php } ?>
                          <h1 class="d-none" id="durasi-video-<?= $mRow->id ?>"><?= durasi($totalDurasiMateri) ?></h1>
                        </ul>
                      </div>

                      <script>
                        $(document).ready(function(){
                          var durasiVideoMateri<?= $mRow->id ?> = $('#durasi-video-<?= $mRow->id ?>').text()
                          $('#durasi-materi-<?= $mRow->id ?>').text(durasiVideoMateri<?= $mRow->id ?>)
                        })
                      </script>
                    <?php } ?>

                    <h1 class="d-none" id="durasi-video"><?= durasi($totalDurasi) ?></h1>

                    <script>
                      $(document).ready(function(){
                        var totalDurasi = $('#durasi-video').text()
                        $('.durasi-materi').text(totalDurasi)
                      })
                    </script>

                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="cdetail-tutor" style="flex-direction: row;flex-wrap: nowrap;">
              <div class="" style="display: flex; flex-direction: column;">
                <div class="cdetail-tutor_pill" style="margin-bottom: 15px;">
                  <div class="pill-text">TENTANG TUTOR</div>
                </div>
                
                <?php if($tutor->img): ?>
                  <img src="<?= base_url('uploads/tutor/' . $tutor->img)?>" loading="lazy" alt="" class="cdetail-tutor_image" style="min-width: 150px;max-width: 150px; max-height: 150px;">
                <?php else: ?>
                  <img src="<?= base_url('assets/admin/images/placeholder-image.svg')?>" loading="lazy" alt="" class="cdetail-tutor_image" style="min-width: 150px;max-width: 150px; max-height: 150px;">
                <?php endif; ?>
                
                <h4 class="cdetail-tutor-name" style="margin-top: 10px;"><?= $tutor->nama ?></h4>
              </div>
              <div class="text-small text-grey">
                <?= $tutor->deskripsi ?>.
              </div>
            </div>
            <br>
            <div class="cdetail-tabs_menu-wrapper w-tab-menu">
              <a" class="cdetails-tabs_menu w-inline-block w--current">
                <div>REVIEWS</div>
              </a>
            </div>
            <div class="cdetail-tutor" style="flex-direction: row;flex-wrap: nowrap;">
              <?php foreach($reviews->result() as $row){ ?>
                <div class="materi-accordion">
                  <div data-w-id="94122fb6-3714-9896-362c-306bc39c0a28-14" class="materi_accordion-item">
                    <div class="materi-accordion_header">
                      <div>
                        <div class="rating" style="margin: auto;">
                          <?php for($i=1; $i<= 5; $i++){ ?>
                            <?php if($i <= $row->rating): ?>
                              <span class="star active" data-rating="<?= $i ?>"><i class="fas fa-star"></i></span>
                            <?php else: ?>
                              <span class="star" data-rating="<?= $i ?>"><i class="fas fa-star"></i></span>
                            <?php endif; ?>
                          <?php } ?>
                        </div>
                        <h3 class="materi-accordion_heading" style="margin-bottom: 5px;"><?= $row->name ?></h3>
                        <p class="materi-accordion_heading" style="font-weight: 300;"><?= $row->review ?></p>
                      </div>
                    </div>
                  <div>
                </div>
              <?php } ?>
            </div>
            
            <?php if(@$countReviews > 5): ?>
              <button type="button" class="button is-yellow w-button btn-load-other" data-course="<?= $course->id ?>" style="background: #dddddd;border: 1px solid rgba(40, 40, 40, .1);">LOAD MORE</button>
            <?php endif; ?>
          </div>  
        </div>
        <br>
      </div>
      <div class="cdetail-spacer" style="padding-bottom: 50px;"></div>
    </section>
</main>