<footer class="footer wf-section">
    <div class="footer-container">
      <div class="w-layout-grid footer-grid-content">
        <div class="footer-column">
          <div class="footer-column_heading-wrapper">
            <h2 class="footer-column-heading">LINGKAR EDUKASI</h2>
          </div>
          <div class="footer-column_content">
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet pellentesque velit. Cras aliquam pretium urna, nec faucibus nisi consectetur a</div>
          </div>
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
            <h2 class="footer-column-heading">SOCIAL MEDIA</h2>
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
            <h2 class="footer-column-heading">LINGKAR EDUKASI</h2>
          </div>
          <div class="footer-column_content">
            <div>
              Ruko Dynasty Walk kav 29B/15, Jln Jalur Sutera, Alam Sutera, Tlp : 021 – 29213742 Fax : <?= $setting->fax ?>
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
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>