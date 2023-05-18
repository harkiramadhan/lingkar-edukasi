<main>
    <section class="section wf-section">
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
              <div class="breadcrumb active"><strong class="bold-text">Profil</strong></div>
            </div>
          </div>
        </div>
        <div class="padding-top padding-60">
            <div class="container">
                <div class="section-title-wrapper">
                    <h2>Profile Page</h2>
                    <div>Ini adalah kelas paling populer di Indonesia</div>
                </div>
                <div class="profile-tabs-wrapper">
                    <div
                        data-current="Tab 2"
                        data-easing="ease"
                        data-duration-in="300"
                        data-duration-out="100"
                        class="profile-tabs w-tabs">
                        <div class="profile-tabs_menu-wrapper w-tab-menu">
                            <a
                                data-w-tab="Tab 2"
                                class="kelassaya-tabs_menu w-inline-block w-tab-link w--current">
                                <div>BIODATA</div>
                            </a>
                            <a data-w-tab="Tab 3" class="kelassaya-tabs_menu w-inline-block w-tab-link">
                                <div>PASSWORD</div>
                            </a>
                        </div>
                        <div class="profile-tabs_content w-tab-content">
                            <div data-w-tab="Tab 2" class="w-tab-pane w--tab-active">
                                <div class="signin-form w-form">
                                    <form method="post" class="form-field_wrapper" action="<?= site_url('profil/action') ?>">

                                            
                                        <!-- <div class="profile-foto_wrapper">
                                            <a href="#" class="profile-foto_edit w-inline-block">
                                                <img src="<?= base_url('assets/user/images/Mode-edit.svg')?>" loading="lazy" alt="">
                                            </a>
                                        </div> -->

                                        <div style="position: relative; width: 200px; height: 200px; border-radius: 50%; background-color: maroon; display: flex; align-items: center; justify-content: center; cursor: pointer;" onmouseover="showPencil()" onmouseout="hidePencil()">
                                            <label for="file-input">
                                                <div style="position: relative; width: 190px; height: 190px; border-radius: 50%; overflow: hidden;">
                                                <img id="avatar-img" src="https://www.charitycomms.org.uk/wp-content/uploads/2019/02/placeholder-image-square.jpg" alt="Preview" style="width: 200px; height: 200px; object-fit: cover;">
                                                </div>
                                                <div id="pencil-icon" style="position: absolute; top: 5px; right: 5px; display: none; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background-color: maroon; border-radius: 50%;">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/650/650143.png" alt="Edit" style="width: 20px; height: 20px;">
                                                </div>
                                            </label>
                                            <input id="file-input" type="file" onchange="previewImage(event);" style="display: none;">
                                        </div>

                                        <script>

                                                function previewImage(event) {
                                                var input = event.target;
                                                var reader = new FileReader();
                                                
                                                reader.onload = function() {
                                                    var imgElement = document.getElementById("avatar-img");
                                                    imgElement.src = reader.result;
                                                };
                                                
                                                reader.readAsDataURL(input.files[0]);
                                                }

                                        </script>


                                        <label for="name" class="text-size-regular">Nama Lengkap</label>
                                        <input type="text" class="text-field w-input" maxlength="256" name="name" data-name="Name" placeholder="Tulis nama lengkapmu" required="" value="<?= $user->name ?>">
                                        
                                        <label for="password-2" class="text-size-regular">Email Aktif</label>
                                        <input type="email" class="text-field w-input" maxlength="256" name="email" placeholder="email@gmail.com" required="" value="<?= $user->email ?>">
                                        
                                        <label for="name-2" class="text-size-regular">No HP</label>
                                        <input type="number" class="text-field w-input" maxlength="256" name="nohp" placeholder="0821xxxxx" required="" value="<?= $user->nohp ?>">
                                        
                                        <label for="name-3" class="text-size-regular">Jenis Kelamin</label>
                                        <select class="form-control form-control-lg default-select" tabindex="-98" name="jenkel" required>
                                            <option value="" selected>Pilih</option>
                                            <option value="L" <?= ($user->jenkel == 'L') ? 'selected' : '' ?>>Laki - laki</option>
                                            <option value="P" <?= ($user->jenkel == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                        </select>
                                        
                                        <label for="name-3" class="text-size-regular">Pendidikan Terahir</label>
                                        <select class="form-control form-control-lg default-select" tabindex="-98" name="pendidikan" required>
                                            <option value="" selected>Pilih</option>
                                            <option value="SMP" <?= ($user->pendidikan == 'SMP') ? 'selected' : '' ?>>SMP</option>
                                            <option value="SMA" <?= ($user->pendidikan == 'SMA') ? 'selected' : '' ?>>SMA</option>
                                            <option value="D3" <?= ($user->pendidikan == 'D3') ? 'selected' : '' ?>>D3</option>
                                            <option value="S1" <?= ($user->pendidikan == 'S1') ? 'selected' : '' ?>>S1</option>
                                            <option value="S2" <?= ($user->pendidikan == 'S2') ? 'selected' : '' ?>>S2</option>
                                          </select>
                                        <label for="name-3" class="text-size-regular">Tanggal Lahir</label>
                                        <input type="date" class="text-field w-input" maxlength="256" name="tgll" placeholder="0821xxxxx" required="" value="<?= $user->tgll ?>">
                                        <input type="submit" value="MASUK" data-wait="Please wait..." class="button is-yellow margin-top-24 w-button">
                                    </form>

                                    <div class="w-form-done">
                                        <div>Thank you! Your submission has been received!</div>
                                    </div>
                                    <div class="error-massage w-form-fail">
                                        <div class="error-massage_wrapper"><img
                                            src="<?= base_url('assets/user/images/Warning.svg')?>"
                                            loading="lazy"
                                            alt=""
                                            class="icon_error">
                                            <div>
                                                <em>Email atau password yang dimasukan salah</em>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-w-tab="Tab 3" class="w-tab-pane">
                                <div class="signin-form w-form">
                                    <form method="post" class="form-field_wrapper" action="<?= site_url('profil/changePassword') ?>">
                                        <label for="name-3" class="text-size-regular">Password Lama</label>
                                        <div class="text-field_block">
                                            <div class="eye-icon_wrapper">
                                                <img src="<?= base_url('assets/user/images/Remove-red-eye.svg')?>" loading="lazy" alt="" class="eye-icon">
                                            </div>
                                            <input type="password" class="text-field margin-bottom-20 w-input" name="old_pass" data-name="Password Baru" placeholder="Tulis passwordmu" id="password" required="">
                                        </div>
                                        
                                        <label for="password" class="text-size-regular">Password Baru</label>
                                        <input type="password" class="text-field w-input" name="new_pass" data-name="Password baru" placeholder="Tulis ulang passwordmu" id="new_password" required="">
                                        <input type="submit" value="Simpan" data-wait="Please wait..." class="button is-yellow margin-top-24 w-button">
                                    </form>
                                    <div class="w-form-done">
                                        <div>Thank you! Your submission has been received!</div>
                                    </div>
                                    <div class="error-massage w-form-fail">
                                        <div class="error-massage_wrapper"><img
                                            src="<?= base_url('assets/user/images/Warning.svg')?>"
                                            loading="lazy"
                                            alt=""
                                            class="icon_error">
                                            <div>
                                                <em>Email atau password yang dimasukan salah</em>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>