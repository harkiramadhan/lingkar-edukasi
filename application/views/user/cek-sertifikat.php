
<section class="section wf-section">
    <div class="padding-vertical padding-80">
      <div class="container">
        <div class="flex-vertical_center">
          <div class="verify-content">
            <h1 class="semibolld text-align-center">Cek Sertifikatmu</h1>
            <p class="blind-text width-40">Klik tombol di bawah untuk memulai kelas yang telah kamu ikuti</p>
          </div>
          <div class="cek-sertif_form w-form">
            <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form"><input type="email" class="text-field margin-bottom-20 w-input" maxlength="256" name="email" data-name="Email" placeholder="Nomor Sertifikat" id="email" required=""><input type="submit" value="CARI SERTIFIKAT" data-wait="Please wait..." class="button is-yellow width-40 w-button"></form>
            <div class="success-message w-form-done">
              <div class="success-sertifikat"><img src="<?= base_url('assets/user/images/Check-circle_1.svg')?>" loading="lazy" alt="">
                <h1 class="semibolld success-green">Sertifikatmu Valid</h1>
                <div class="card-cek_sertifikat">
                  <div class="cek-sertif_content">
                    <h6 class="heading-xs_thin">Nomor Sertifikat</h6>
                    <div class="heading-card_sertif">#121212221233</div>
                  </div>
                  <div class="cek-sertif_content">
                    <h6 class="heading-xs_thin">Kelas</h6>
                    <div class="heading-card_sertif">Tingkatkan keterampilan dan karier mu!</div>
                  </div>
                  <div class="cek-sertif_content">
                    <h6 class="heading-xs_thin">Nama</h6>
                    <div class="heading-card_sertif">Alfian Rahmatullah</div>
                  </div>
                </div>
                <a href="#" class="button is-yellow w-button">CARI SERTIFIKAT LAIN</a>
                <p class="blind-text width-40">Butuh bantuan? Mohon hubungi Lingkar Edukasi <a href="#" class="link-span-blind">Hubungi Kami</a>
                </p>
              </div>
            </div>
            <div class="error-message w-form-fail" style="border-radius: 16px;">
              <div class="success-sertifikat"><img src="<?= base_url('assets/user/images/Dangerous.svg')?>" loading="lazy" alt="">
                <h1 class="semibolld error-red">Sertifikatmu Tidak Valid</h1>
                <a href="#" class="button is-yellow w-button">CARI SERTIFIKAT LAIN</a>
                <p class="blind-text width-40">Butuh bantuan? Mohon hubungi Lingkar Edukasi <a href="#" class="link-span-blind">Hubungi Kami</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>