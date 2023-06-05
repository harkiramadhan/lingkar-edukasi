<footer class="footer wf-section">
    <div class="footer-container">
      <div class="w-layout-grid footer-grid-content">
        <div class="footer-column">
          <div class="footer-column_heading-wrapper">
            <h2 class="footer-column-heading"><?= $setting->summary_footer_judul ?></h2>
          </div>
          <div class="footer-column_content">
            <div><?= $setting->summary_footer_desc ?></div>
          </div>

          <a href="<?= site_url('sertifikat/') ?>" class="footer-column-heading footer-link w-inline-block" style="margin-top: 10px;">
            <div>Verifikasi Sertifikat</div>
          </a>

        </div>
        <div class="footer-column">
          <div class="footer-column_heading-wrapper">
            <h2 class="footer-column-heading">KATEGORI</h2>
          </div>
          <div class="footer-column_content">
            <?php foreach($labels->result() as $lRow){ ?>
              <a href="<?= site_url('course/' . $lRow->id . '/category') ?>" class="footer-link w-inline-block">
                <div>&gt; <?= $lRow->label ?></div>
              </a>
            <?php } ?>
          </div>
        </div>
        <div class="footer-column">
          <div class="footer-column_heading-wrapper">
            <h2 class="footer-column-heading"><?= $setting->footer_desc_sosmed ?></h2>
          </div>
          <div class="footer-column_content">
            <a href="<?= $setting->fb_link ?>" class="footer-link w-inline-block">
              <div>Facebook</div>
            </a>
            <a href="<?= $setting->ig_link ?>" class="footer-link w-inline-block">
              <div>Instagram</div>
            </a>
            <a href="<?= $setting->tt_link ?>" class="footer-link w-inline-block">
              <div>Twitter</div>
            </a>
          </div>
        </div>
        <div class="footer-column">
          <div class="footer-column_heading-wrapper">
            <h2 class="footer-column-heading"><?= $setting->alamat_judul ?></h2>
          </div>
          <div class="footer-column_content">
            <div>
              <?= ($setting->alamat_1) ? $setting->alamat_1 . '<br>' : '' ?> 
              <?= ($setting->alamat_2) ? $setting->alamat_2 . '<br>' : '' ?> 
              <?= ($setting->telefon) ? 'Tlp : ' . $setting->telefon . '<br>' : '' ?> 
              <?= ($setting->telefon) ? 'Fax : ' . $setting->fax . '<br>' : '' ?> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-caption-wrapper">
      <div class="footer-caption">@<?= date('Y') ?> LINGKAR EDUKASI</div>
    </div>
  </footer>
  <script>
    var baseUrl = '<?= site_url('') ?>'
  </script>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=63ed53b6a4b18967392afb61" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/user/js/webflow.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/user/js/custom.js')?>" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>

  <?php if($this->uri->segment(1) == 'course' && $this->uri->segment(3) == 'detail'): ?>
    <script>
      $('.btn-load-other').click(function(){
          var course = $(this).attr('data-course')
          $.ajax({
              url: baseUrl + 'course/getOtherReview',
              type: 'get',
              data: {course: course},
              success: function(res){
                  $('.cdetail-tutor').html(res)
              }
          })
      })
    </script>

    <?php if($this->session->userdata('is_user')): ?>
    <script>
      var snapToken = '<?= @$snapToken ?>'
      var courseid = '<?= @$course->id ?>'
      var orderid = '<?= @$orderid ?>'
    </script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-sXV560B8LBgAVWJA"></script>
    <script src="<?= base_url('assets/user/js/course.js') ?>"></script>
    <?php endif; ?>

  <?php elseif($this->uri->segment(1) == 'kelas' && $this->uri->segment(3) == 'detail' && $this->session->userdata('is_user') != NULL): ?>
    <script src="<?= base_url('assets/user/js/video.js') ?>"></script>
  <?php elseif($this->uri->segment(1) == 'sertifikat' && $this->uri->segment(2) == NULL): ?>
    <script src="<?= base_url('assets/user/js/certificate.js') ?>"></script>
  <?php elseif($this->uri->segment(1) == 'review' && $this->uri->segment(3) == 'form'): ?>
    <!-- JS Rate US -->
    <script>
      $(document).ready(function() {
        $('.star').click(function() {
          var rating = $(this).data('rating');
          
          // Menghapus class active dari semua bintang
          $('.star').removeClass('active');
          
          // Menambahkan class active pada bintang yang diberi rating dan semua bintang sebelumnya
          $(this).addClass('active');
          $(this).prevAll('.star').addClass('active');
          
          // Mengatur nilai input tersembunyi sesuai dengan rating yang dipilih
          $('#rating-input').val(rating);
        });
      });
    </script>
  <?php endif; ?>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->

</body>
</html>