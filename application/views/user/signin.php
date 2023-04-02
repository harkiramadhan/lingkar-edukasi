<section class="section wf-section">
  <div class="padding-vertical padding-60">
    <div class="container">
      <h1 class="sign-heading"><strong class="semibolld">Selamat</strong> Datang Kembali!</h1>
      <div class="signin-content">
        <div class="signin-content_left">
          <div class="siginin-form_wrapper">
            <div class="signin-form w-form">
              <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form-field"><label for="name" class="text-size-regular margin-bottom-16">Email</label><input type="email" class="text-field margin-bottom-16 w-input" maxlength="256" name="name" data-name="Name" placeholder="email@gmail.com" id="name" required=""><label for="password-2" class="text-size-regular margin-bottom-16">Password</label><input type="password" class="text-field margin-bottom-20 w-input" maxlength="256" name="email" data-name="Email" placeholder="Tulis passwordmu" id="password" required=""><input type="submit" value="MASUK" data-wait="Please wait..." class="button is-yellow margin-bottom-20 w-button"></form>
              <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
              </div>
              <div class="error-massage w-form-fail">
                <div class="error-massage_wrapper"><img src="images/Warning.svg" loading="lazy" alt="" class="icon_error">
                  <div><em>Email atau password yang dimasukan salah</em></div>
                </div>
              </div>
            </div>
            <a href="<?= site_url('forgotpassword') ?>" class="text-size-medium is-red text-align-center">Lupa Password anda?</a>
            <div class="google-login-wrapper">
              <div class="blind-text">Atau</div>
              <a href="#" class="google-button margin-top-24 w-inline-block"><img src="<?= base_url('assets/user/images/google-icon.svg')?>" loading="lazy" alt="" class="button-image">
                <div>Masuk dengan Google</div>
              </a>
              <div class="text-size-medium text-align-center margin-top-24">Belum memiliki akun? klik <a href="<?= site_url('signup') ?>" class="link-span">Daftar</a>
              </div>
            </div>
          </div>
        </div>
        <div class="signin-image_right"><img src="<?= base_url('assets/user/images/home-hero-mainimage.webp')?>" loading="lazy" sizes="(max-width: 479px) 85vw, (max-width: 767px) 94vw, (max-width: 991px) 40vw, (max-width: 1439px) 41vw, 550px" srcset="<?= base_url('assets/user/images/home-hero-mainimage-p-500.png')?> 500w, <?= base_url('assets/user/images/home-hero-mainimage.webp')?> 883w" alt="" class="signin-image"></div>
      </div>
    </div>
  </div>
</section>