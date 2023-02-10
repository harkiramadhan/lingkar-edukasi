<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Dashboard Admin - Lingkar Edukasi</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/admin/images/admin/brand/logo-only-main.svg')?>">
        <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/chartist/css/chartist.min.css') ?>">
        <link href="<?= base_url('assets/admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/vendor/perfect-scrollbar/css/perfect-scrollbar.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/vendor/owl-carousel/owl.carousel.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/vendor/metismenu/css/metisMenu.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/vendor/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/icon/admin/flaticon/flaticon.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/css/admin/style.css') ?>" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    </head>
    <body>

        <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div> 
        
        <div id="main-wrapper">
            
            <div class="nav-header">
                <a href="index.html" class="brand-logo">
                    <img class="logo-abbr" src="<?= base_url('assets/admin/images/admin/brand/logo-only-main.svg')?>" alt="">
                    <img class="logo-compact" src="<?= base_url('assets/admin/images/admin/brand/logo-only-main.svg')?>" alt="">
                    <img class="brand-title" src="<?= base_url('assets/admin/images/admin/brand/logo-text-main.svg')?>" alt="">
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
                                        <img src="<?= base_url('assets/admin/images/profile/17.jpg') ?>" width="20" alt=""/>
                                        <div class="header-info">
                                            <span class="text-black"><strong>Brian Lee</strong></span>
                                            <p class="fs-12 mb-0">Admin</p>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="./page-login.html" class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                            <span class="ml-2">Keluar </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            
            <div class="deznav">
                <div class="deznav-scroll">
                    <a href="javascript:void(0)" class="add-menu-sidebar" data-toggle="modal" data-target="#addOrderModalside" >+ Kelas Baru</a>
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                                <i class="flaticon-381-networking"></i>
                                <span class="nav-text">Overview</span>
                            </a>
                        </li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="flaticon-381-news"></i>
                                <span class="nav-text">Kelas</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="#">Daftar Kelas</a></li>
                                <li><a href="#">Tutor</a></li>
                                <li><a href="#">Label</a></li>
                                <li><a href="#">Peserta</a></li>
                                <li><a href="#">Transaksi</a></li>
                                <li><a href="#">Reviews</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="flaticon-381-album-3"></i>
                                <span class="nav-text">Landing Page</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="#">Daftar Kelas</a></li>
                                <li><a href="#">Tutor</a></li>
                                <li><a href="#">Label</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                                <i class="flaticon-381-bookmark-1"></i>
                                <span class="nav-text">Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                                <i class="flaticon-381-user-8"></i>
                                <span class="nav-text">Akun</span>
                            </a>
                        </li>
                        <li>
                            <a href="widget-basic.html" class="ai-icon" aria-expanded="false">
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
