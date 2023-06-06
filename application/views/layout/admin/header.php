<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Dashboard Admin Lingkar Edukasi</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/admin/images/brand/logo-only-main.svg') ?>">
        <link href="<?= base_url('assets/admin/images/brand/logo-only-main.svg') ?>" rel="shortcut icon" type="image/x-icon">
        <link href="<?= base_url('assets/admin/images/brand/logo-only-main.svg') ?>" rel="apple-touch-icon">
        <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/chartist/css/chartist.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/select2/css/select2.min.css')?>">
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
        <link href="<?= base_url('assets/admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/vendor/perfect-scrollbar/css/perfect-scrollbar.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/vendor/owl-carousel/owl.carousel.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/vendor/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/css/style.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/css/custom.css') ?>" rel="stylesheet">
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    
        <!-- Summernote -->
        <link href="<?= base_url('assets/admin/vendor/summernote/summernote.css')?>" rel="stylesheet">


    </head>
    <body>
        <!--******************* 
            Preloader start
        ********************-->
        <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>

        <div id="main-wrapper">
                
            <div class="nav-header">
                <a href="<?= site_url('admin/overview') ?>" class="brand-logo">
                    <img class="logo-abbr" src="<?= base_url('assets/admin/images/brand/logo-only-main.svg') ?>" alt="">
                    <img class="logo-compact" src="<?= base_url('assets/admin/images/brand/logo-text-only-main.svg') ?>" alt="">
                    <img class="brand-title" src="<?= base_url('assets/admin/images/brand/logo-text-main.svg') ?>" alt="">
                </a>

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>
            </div>

            <div class="header">
                    
                <div class="header-content">
                    <nav class="navbar navbar-expand">
                        <div class="collapse navbar-collapse justify-content-between">
                            <div class="header-left">
                                <div class="dashboard_bar">
                                    Dashboard
                                </div>
                            </div>
                            <ul class="navbar-nav header-right">
                                <li class="nav-item dropdown header-profile">
                                    <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                        
                                        <?php if($user->img): ?>
                                            <img src="<?= base_url('uploads/profile/' . $user->img) ?>" width="20" alt="" style="object-fit: cover;"/>
                                        <?php else: ?>
                                            <img src="<?= base_url('assets/admin/images/placeholder-image.svg') ?>" width="20" alt="" style="object-fit: cover;"/>
                                        <?php endif; ?>
                                        
                                        <div class="header-info">
                                            <span class="text-black"><strong><?= $user->nama ?></strong></span>
                                            <p class="fs-12 mb-0">Admin</p>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="<?= site_url('logout') ?>" class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                            <span class="ml-2">Logout </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-12" style="margin-top:20px">
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success solid alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            <strong>Success!</strong> <?= $this->session->flashdata('success') ?>.
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger solid alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong>Error!</strong> <?= $this->session->flashdata('error') ?>.
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="deznav">
                <div class="deznav-scroll">
                    <a href="<?= site_url('admin/course/tambah')?>" class="add-menu-sidebar" >+ Course Baru</a>
                    
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="<?= site_url('admin/overview') ?>" class="ai-icon" aria-expanded="false">
                                <i class="flaticon-381-networking"></i>
                                <span class="nav-text">Overview</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="flaticon-381-news"></i>
                                <span class="nav-text">Course</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="<?= site_url('admin/course')?>">Daftar Course</a></li>
                                <li><a href="<?= site_url('admin/peserta')?>">Peserta</a></li>
                                <li><a href="<?= site_url('admin/transaksi')?>">Transaksi</a></li>
                                <li><a href="<?= site_url('admin/reviews')?>">Reviews</a></li>
                                <li><a href="<?= site_url('admin/label')?>">Label</a></li>  
                                <li><a href="<?= site_url('admin/benefit')?>">Benefit</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/tutor')?>" class="ai-icon" aria-expanded="false">
                                <i class="flaticon-381-user-9"></i>
                                <span class="nav-text">Tutor</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/akun')?>" class="ai-icon" aria-expanded="false">
                                <i class="flaticon-381-user-8"></i>
                                <span class="nav-text">Akun</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="flaticon-381-album-3"></i>
                                <span class="nav-text">Konten Halaman</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="<?= site_url('admin/konten/landing')?>">Landing Page</a></li>
                                <li><a href="<?= site_url('admin/konten/header')?>">Judul Halaman</a></li>
                                <li><a href="<?= site_url('admin/konten/footer')?>">Footer</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/pengaturan') ?>" class="ai-icon" aria-expanded="false">
                                <i class="flaticon-381-settings-9"></i>
                                <span class="nav-text">Pengaturan</span>
                            </a>
                        </li>
                    </ul>
                    <div class="copyright">
                        <p><strong>Lingkar Edukasi Admin Dashboard</strong> © 2023 All Rights Reserved</p>
                    </div>
                </div>
            </div>
            