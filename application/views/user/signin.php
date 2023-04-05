<section class="section wf-section">
  <div class="padding-vertical padding-60">
    <div class="container">
      <h1 class="sign-heading"><strong class="semibolld">Selamat</strong> Datang Kembali!</h1>
      <div class="signin-content">
        <div class="signin-content_left">
          <div class="siginin-form_wrapper">
            <div class="signin-form w-form">
              
              <form method="POST" action="<?= site_url('auth/actionSignin') ?>" class="form-field">
                <label for="name" class="text-size-regular margin-bottom-16">Email</label>
                <input type="email" class="text-field margin-bottom-16 w-input" maxlength="256" name="email" data-name="email" placeholder="email@gmail.com" id="name" required="" value="<?= ($this->session->flashdata('email')) ? $this->session->flashdata('email') : '' ?>">
                
                <label for="password-2" class="text-size-regular margin-bottom-16">Password</label>
                <input type="password" class="text-field margin-bottom-20 w-input" maxlength="256" name="password" data-name="password" placeholder="Tulis passwordmu" id="password" required="">
                
                <button type="submit" class="button is-yellow margin-bottom-20 w-button">MASUK</button>
              </form>
              
              <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
              </div>

              <?php if($this->session->userdata('error')): ?>
              <div class="error-massage" style="margin-top: 10px; padding: 10px; background-color: #ffdede;">
                <div class="error-massage_wrapper">
                  <img src="<?= base_url('assets/user/images/Warning.svg') ?>" loading="lazy" alt="" class="icon_error">
                  <div><em><?= $this->session->flashdata('error') ?></em></div>
                </div>
              </div>
              <?php endif; ?>

            </div>

            <a href="<?= site_url('forgotpassword') ?>" class="text-size-medium is-red text-align-center">Lupa Password anda?</a>
            
            <div class="google-login-wrapper">
              <div class="blind-text">Atau</div>
              <?php if($login_button): ?>
                <a href="<?= $auth_url ?>" class="google-button margin-top-24 w-inline-block"><img src="<?= base_url('assets/user/images/google-icon.svg')?>" loading="lazy" alt="" class="button-image">
                  <div>Masuk dengan Google</div>
                </a>
              <?php endif; ?>
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