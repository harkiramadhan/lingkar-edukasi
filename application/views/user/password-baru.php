
<section class="section wf-section">
    <div class="padding-vertical padding-80">
      <div class="container">
        <h1 class="sign-heading">Buat <strong class="semibolld">Password</strong> Barumu</h1>
        <div class="signin-content">
          <div class="signin-content_left">
            <div class="siginin-form_wrapper">
              <p class="text-lupa_password margin-bottom-20">Password barumumu harus berbeda dengan  sebelumnya</p>
              <div class="signin-form w-form">
                <form id="email-form" name="email-form" data-name="Email Form" method="post" action="<?= site_url('auth/createPassword') ?>" class="form-field">
                  
                  <label for="password" class="text-size-regular margin-bottom-16">Password</label>
                  <input type="password" class="text-field margin-bottom-20 w-input" maxlength="256" name="pwd" placeholder="Tulis passwordmu" id="password" required="">
                  
                  <label for="password" class="text-size-regular margin-bottom-16">Ulangi Password</label>
                  <div class="text-field_block">
                    <div class="eye-icon_wrapper">
                      <img src="<?= base_url('assets/user/images/Remove-red-eye.svg')?>" loading="lazy" alt="" class="eye-icon"></div>
                      <input type="password" class="text-field margin-bottom-20 w-input" maxlength="256" name="validate" placeholder="Tulis ulang password" id="password" required="">
                  </div>
                  
                  <input type="submit" value="BUAT PASSWORD" data-wait="Please wait..." class="button is-yellow margin-bottom-20 w-button">
                </form>
                <div class="w-form-done">
                  <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="error-massage w-form-fail">
                  <div class="error-massage_wrapper"><img src="<?= base_url('assets/user/images/Warning.svg')?>" loading="lazy" alt="" class="icon_error">
                    <div><em>Email tidak terdaftar</em></div>
                  </div>
                </div>
              </div>
              <div class="text-size-medium text-align-center margin-top-24">Belum memiliki akun? klik <a href="signup.html" class="link-span">Daftar</a>
              </div>
            </div>
          </div>
          <div class="signin-image_right"><img src="<?= base_url('assets/user/images/home-hero-mainimage.webp')?>" loading="lazy" sizes="(max-width: 479px) 85vw, (max-width: 767px) 94vw, (max-width: 991px) 40vw, (max-width: 1439px) 41vw, 550px" srcset="<?= base_url('assets/user/images/home-hero-mainimage-p-500.png')?> 500w, <?= base_url('assets/user/images/home-hero-mainimage.webp')?> 883w" alt="" class="signin-image"></div>
        </div>
      </div>
    </div>
  </section>