<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $title ?> </title>
    <!-- <title>List Gred <?= $position->position_name ?> </title> -->

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/summernote/summernote-bs4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('assets') ?>/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li> -->
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="https://www.moh.gov.my/" class="brand-link">
                <img src="<?= base_url('assets') ?>/dist/img/jata_128x128.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">WARAN PERJAWATAN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets') ?>/dist/img/avatar01.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $this->name ?> </a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/index') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/user/index') ?>" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                    Pengguna
                                </p>
                            </a>
                        </li>
                        <!-- DEPARTMENT -->
                        <li class="nav-item has-treeview">
                            <a href="<?= base_url('admin/department') ?>" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Jabatan
                                </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item has-treeview">
                            <a href="<?= base_url('admin/gred') ?>" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    gred
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Waran Perjawatan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <?php foreach ($this->waran  as $nav_waran) : ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url('admin/position/' . $nav_waran->department_id) ?>" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <?php if (strlen($nav_waran->department_name) > 20) : ?>
                                                <p style="font-size: 15px;"><?= $nav_waran->department_name ?></p>
                                            <?php else : ?>
                                                <p><?= $nav_waran->department_name ?></p>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </li>
                        <!-- laporan -->
                        <li class="nav-item">
                            <!-- <a href="#" class="nav-link "> -->
                            <!-- <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Laporan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/laporan/jabatan') ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jabatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/laporan/gred') ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Gred</p>
                                    </a>
                                </li> -->
                            <!-- </ul> -->
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('login') ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>