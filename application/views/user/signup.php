<section class="section wf-section">
  <div class="padding-vertical padding-60">
    <div class="container">
      <h1 class="sign-heading"><strong class="semibolld">Daftarkan</strong> dirimu Sekarang Juga</h1>
      <div class="signin-content">
        <div class="signin-content_left">
          <div class="siginin-form_wrapper">
            <div class="signin-form w-form">
              <form name="email-form" data-name="Email Form" method="POST" class="form-field" action="<?= site_url('auth/actionSignup') ?>">
                <label for="name" class="text-size-regular margin-bottom-16">Nama Lengkap</label>
                <input type="text" class="text-field margin-bottom-16 w-input" maxlength="255" name="name" placeholder="Tulis nama lengkapmu" required="" value="<?= ($this->session->flashdata('name')) ? $this->session->flashdata('name') : '' ?>">
                
                <label for="name-2" class="text-size-regular margin-bottom-16">Email</label>
                <input type="email" class="text-field margin-bottom-16 w-input" maxlength="255" name="email" placeholder="email@gmail.com"  required="" value="<?= ($this->session->flashdata('email')) ? $this->session->flashdata('email') : '' ?>">
                
                <label for="name-2" class="text-size-regular margin-bottom-16">Password</label>
                <input type="password" class="text-field margin-bottom-16 w-input" maxlength="255" name="password"  placeholder="Tulis Password Mu"  required="">
                
                <label for="password" class="text-size-regular margin-bottom-16">No HP</label>
                <input type="tel" class="text-field margin-bottom-20 w-input" maxlength="256" name="nohp" placeholder="0821xxxxx" required="" value="<?= ($this->session->flashdata('nohp')) ? $this->session->flashdata('nohp') : '' ?>">
                <input type="hidden" name="is_robot">

                <button type="submit" class="button is-yellow margin-bottom-20 w-button">DAFTAR</button>
                <!-- <input type="submit" value="DAFTAR" data-wait="Please wait..." class=""> -->
              </form>

              <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
              </div>

              <?php if($this->session->flashdata('error')): ?>
                <div class="error-massage" style="margin-top: 10px; padding: 10px; background-color: #ffdede;">
                  <div class="error-massage_wrapper">
                    <img src="<?= base_url('assets/user/images/Warning.svg') ?>" loading="lazy" alt="" class="icon_error">
                    <div><em>Email Sudah Terdaftar, Gunakan Email Lain</em></div>
                  </div>
                </div>
              <?php endif; ?>

            </div>
            <div class="google-login-wrapper">
              <div class="blind-text">Atau</div>
              <?php if($login_button): ?>
                <a href="<?= $auth_url ?>" class="google-button margin-top-24 w-inline-block"><img src="<?= base_url('assets/user/images/google-icon.svg')?>" loading="lazy" alt="" class="button-image">
                  <div>Daftar dengan Google</div>
                </a>
              <?php endif; ?>
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