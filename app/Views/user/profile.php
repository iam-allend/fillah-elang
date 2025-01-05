<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Profil</title>
    
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('frontend/images/logo-circle-bgwhite.png') ?>">
    <!-- Custom CSS -->
    <link href="<?= base_url('user/html/css/style.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('user/html/css/style-custom.css') ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<style>
    a{
        text-decoration: none !important;
    }
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand ms-4" href="home">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url('img/logo-white.png')?>" alt="homepage" width="20" class="dark-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            FALLAH
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white "
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto mt-md-0 ">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <li class="nav-item search-box">
                            <a class="nav-link text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search" style="display: none;">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            
                        <?php if (session()->get('logged_in')): ?>
							<!-- Cart Icon -->
							<li><a class="nav-link" href="<?= base_url('keranjang') ?>"><img src="<?= base_url() ?>frontend/images/cart.svg"></a></li>
							<li><a class="nav-link" href="<?= base_url('profile') ?>"><img style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%; border: 2px solid white;" src="<?= base_url(session()->get('img_user')) ?>"></a></li>

						<?php else: ?>
							<!-- Login Button -->
							<a href="/login" class="login-btn btn border-0 text-dark bg-white py-1">Login</a>
						<?php endif; ?>
                        </li>
                    </ul>

                    
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->  
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <!-- User Profile-->
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="home" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                                    class="hide-menu">Dashboard</span></a></li> -->
                                    
                        <li class="sidebar-item "> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('profile')?>" aria-expanded="false">
                                <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('transaksi')?>" aria-expanded="false"><i class="mdi me-2 mdi-cash-multiple"></i><span
                                    class="hide-menu">Transaksi</span></a></li>

                        <li class="sidebar-item "> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('keranjang')?>" aria-expanded="false">
                                <i class="mdi me-2 mdi-cart"></i><span class="hide-menu">Keranjang</span></a>
                        </li>
                                    
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="icon-material.html" aria-expanded="false"><i
                                    class="mdi me-2 mdi-emoticon"></i><span class="hide-menu">Icon</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="map-google.html" aria-expanded="false"><i class="mdi me-2 mdi-earth"></i><span
                                    class="hide-menu">Google Map</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pages-blank.html" aria-expanded="false"><i
                                    class="mdi me-2 mdi-book-open-variant"></i><span class="hide-menu">Blank</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pages-error-404.html" aria-expanded="false"><i class="mdi me-2 mdi-help-circle"></i><span
                                    class="hide-menu">Error 404</span></a>
                        </li>
                        <li class="text-center p-20 upgrade-btn"> -->
                            
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <div class="sidebar-footer">
                <div class="row">
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="<?= base_url()?>" class="link" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bantuan">
                            <i class="fa-regular fa-comment-dots"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="<?= base_url()?>home" class="link" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Home">
                            <i class="fa-solid fa-house"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <script type="text/javascript">
                            function confirm_logout() {
                            return confirm('Yakin ingin logout?');
                            }
                        </script>
                        <a onclick="return confirm_logout()" href="<?= base_url()?>logout" class="link" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Logout">
                        <i class="fa-solid fa-  -off"></i></a>
                    </div>
                </div>
            </div>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Profile</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn d-flex justify-content-end gap-1   ">
                            <div class="text-end">
                                <!-- <a href=""
                                    class="btn btn-danger d-none d-md-inline-block text-white" target="_blank">TEXT HERE</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-primary"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger"><?= implode('<br>', session()->getFlashdata('errors')) ?></div>
                <?php endif; ?> 
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class="mt-4"> <img style="width: 150px; height: 150px; object-fit: cover; " src="<?= base_url(session()->get('img_user')); ?>"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2"><?= esc($user['first_name']) ?> <?= esc($user['last_name']) ?></h4>
                                    <h6 class="card-subtitle"><?= esc($user['email']) ?></h6>
                                    <!-- <div class="row text-center justify-content-center">
                                        <div class="col-4">
                                            <a href="javascript:void(0)" class="link">
                                                <i class="icon-people" aria-hidden="true"></i>
                                                <span class="value-digit">254</span>
                                            </a></div>
                                        <div class="col-4">
                                            <a href="javascript:void(0)" class="link">
                                                <i class="icon-picture" aria-hidden="true"></i>
                                                <span class="value-digit">54</span>
                                            </a></div>
                                    </div> -->
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" method="post" action="<?= base_url('updateProfile') ?>" enctype="multipart/form-data">
                                    
                                <div class="form-group d-block">
                                    <label class="col-md-12 mb-0">Profile Picture</label>
                                    <div class="col-md-12 d-block">
                                        <div class="d-flex flex-column align-items-start mt-2 gap-3">
                                            <img id="imagePreview" 
                                                src="<?= base_url($user['img_user'] ?? 'img/default.svg') ?>" 
                                                alt="Profile Preview" 
                                                class="rounded-circle"
                                                style="width: 100px; height: 100px; object-fit: cover; ">
                                            <div class="input-group">
                                                <input type="file" 
                                                    name="img_user" 
                                                    id="profileImage"
                                                    class="form-control" 
                                                    accept="image/*"
                                                    onchange="previewImage(this);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label class="col-md-12 mb-0">Nama Depan</label>
                                                <input type="text" name="first_name" value="<?= esc($user['first_name']) ?>" class="form-control ps-0 form-control-line">
                                            </div>
                                            <div class="col">
                                                <label class="col-md-12 mb-0">Nama Belakang</label>
                                                <input type="text" name="last_name" value="<?= esc($user['last_name']) ?>" class="form-control ps-0 form-control-line">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label class="col-md-12 mb-0">Username</label>
                                                <input type="text" name="username" value="<?= esc($user['username']) ?>" class="form-control ps-0 form-control-line">
                                            </div>
                                            <div class="col">
                                                <label class="col-md-12 mb-0">Email</label>
                                                <input type="email" name="email" value="<?= esc($user['email']) ?>" class="form-control ps-0 form-control-line" id="example-email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label class="col-md-12 mb-0">Ubah Password</label>
                                            <input type="password" name="password" placeholder="*************" class="form-control ps-0 form-control-line">
                                            </div>
                                            <div class="col">
                                                <label class="col-md-12 mb-0">Nomor Telepon</label>
                                                <input type="number" name="phone_number" value="<?= esc($user['phone_number']) ?>" class="form-control ps-0 form-control-line">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Alamat</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" name="address" class="form-control ps-0 form-control-line"><?= esc($user['address']) ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <script type="text/javascript">
                                                function confirm_update() {
                                                return confirm('Yakin ingin mengubah data diri?');
                                                }
                                            </script>
                                            <button class="btn btn-success mx-auto mx-md-0 text-white" onclick="return confirm_update()">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> ©Copyright 2024 - by Anur Mustakim </a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>    

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>user/assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>user/html/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>user/html/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>user/html/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>user/html/js/custom.js"></script>
    <script src="https://kit.fontawesome.com/7cc4824a27.js" crossorigin="anonymous"></script>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const file = input.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>