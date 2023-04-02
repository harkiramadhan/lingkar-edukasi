
<section class="section wf-section">
  <div class="padding-vertical padding-60">
    <div class="container">
      <h1 class="sign-heading"><strong class="semibolld">Daftarkan</strong> dirimu Sekarang Juga</h1>
      <div class="signin-content">
        <div class="signin-content_left">
          <div class="siginin-form_wrapper">
            <div class="signin-form w-form">
              <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form-field"><label for="name" class="text-size-regular margin-bottom-16">Nama Lengkap</label><input type="text" class="text-field margin-bottom-16 w-input" maxlength="256" name="name" data-name="Name" placeholder="Tulis nama lengkapmu" id="name" required=""><label for="name-2" class="text-size-regular margin-bottom-16">Email</label><input type="email" class="text-field margin-bottom-16 w-input" maxlength="256" name="name-2" data-name="Name 2" placeholder="Tulis passwordmu" id="name-2" required=""><label for="name-2" class="text-size-regular margin-bottom-16">Password</label><input type="password" class="text-field margin-bottom-16 w-input" maxlength="256" name="name-2" data-name="Name 2" placeholder="email@gmail.com" id="name-2" required=""><label for="password" class="text-size-regular margin-bottom-16">No HP</label><input type="tel" class="text-field margin-bottom-20 w-input" maxlength="256" name="email" data-name="Email" placeholder="0821xxxxx" id="password" required=""><input type="submit" value="DAFTAR" data-wait="Please wait..." class="button is-yellow margin-bottom-20 w-button"></form>
              <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
              </div>
              <div class="error-massage w-form-fail">
                <div><em>Email sudah terdaftar, gunakan email lain</em></div>
              </div>
            </div>
            <div class="google-login-wrapper">
              <div class="blind-text">Atau</div>
              <a href="#" class="google-button margin-top-24 w-inline-block"><img src="<?= base_url('assets/user/images/google-icon.svg')?>" loading="lazy" alt="" class="button-image">
                <div>Masuk dengan Google</div>
              </a>
              <div class="text-size-medium text-align-center margin-top-24">Sudah memiliki akun? klik <a href="<?= site_url('signin') ?>" class="link-span">Masuk</a>
              </div>
            </div>
          </div>
        </div>
        <div class="signin-image_right"><img src="<?= base_url('assets/user/images/home-hero-mainimage.webp')?>" loading="lazy" sizes="(max-width: 479px) 85vw, (max-width: 767px) 94vw, (max-width: 991px) 40vw, (max-width: 1439px) 41vw, 550px" srcset="<?= base_url('assets/user/images/home-hero-mainimage-p-500.png')?> 500w, <?= base_url('assets/user/images/home-hero-mainimage.webp')?> 883w" alt="" class="signin-image"></div>
      </div>
    </div>
  </div>
</section>