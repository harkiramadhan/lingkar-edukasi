<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard Tutor Lingkar Edukasi</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/admin/images/brand/logo-only-main.svg') ?>">
    <link href="<?= base_url('assets/admin/images/brand/logo-only-main.svg') ?>" rel="shortcut icon" type="image/x-icon">
    <link href="<?= base_url('assets/admin/images/brand/logo-only-main.svg') ?>" rel="apple-touch-icon">
    <link href="<?= base_url('assets/admin/css/style.css') ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100"> 
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-4">
										<img src="<?= base_url('assets/user/images/logo-main-white.svg')?>" style="height: 40px" alt="">
									</div>
                                    <h2 class="text-center mb-2 text-white"><strong>Lupa Password</strong></h2>
                                    <h5 class="text-center mb-3 text-white">Input email tutor anda, kami akan mengirimkan informasi akun anda.</h5>
                                    
                                    <?php if($this->session->flashdata('error')): ?>
                                        <h4 class="text-center mb-3 text-white"><?= $this->session->flashdata('error') ?></h4>
                                    <?php endif; ?>

                                    <form action="<?= site_url('tutor/tutor/sendMailForgotPassword') ?>" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input name="email" type="email" class="form-control" value="<?= ($this->session->flashdata('email')) ? $this->session->flashdata('email') : '' ?>" placeholder="hello@example.com" reqiored>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">SUBMIT</button>
                                            <a href="<?= site_url('/tutor') ?>" type="submit" class="btn border-1 text-white btn-block">ke Halaman Login</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets/admin/vendor/global/global.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/custom.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/deznav-init.js') ?>"></script>

</body>

</html>