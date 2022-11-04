<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">


    <link rel="apple-touch-icon-precomposed" href="/assets/images/pangling-icon-57-precomposed.png"> <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/pangling-icon-114-precomposed.png"> <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/pangling-icon-72-precomposed.png"> <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/pangling-icon-144-precomposed.png"> <!-- For iPad Retina display -->

    <title>
        <?= $judul; ?>
    </title>
    <link href="/dist/css/pages/other-pages.css" rel="stylesheet">
    <link href="/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">



    <!-- Daterange picker plugins css -->
    <link href="/assets/node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="/assets/node_modules/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="/assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="/assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="/assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="/assets/node_modules/tablesaw/dist/tablesaw.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/node_modules/dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="/assets/node_modules/html5-editor/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- Custom CSS -->
    <link href="/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="horizontal-nav boxed skin-blue-dark fixed-layout" onload="startTime()">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">E-kinerja PT GRAHA KARA DIGITAL</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span class="hidden-sm-down">
                            <!-- dark Logo text -->
                            <img src="/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="/assets/images/logo-light-text.png" class="light-logo" style="width:160px" alt="homepage" /></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item">
                            <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sidebartoggler d-none waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <?php $now = date_create()->format('Y-m-d'); ?>
                        <div class="ml-3 mt-3 align-middle text-white">
                            <h4><?= mediumdate_indo($now); ?><p id="txt" class="text-white">.text-white</p>
                            </h4>
                        </div>

                        <!-- <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Search & enter" />
                            </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" data-placement="top" title="" data-original-title="Jangan ditekan !">
                                    <i class="ti-bell"></i>
                                    <div class="notify">
                                        <span class="heartbit"><span class="badge badge-pill badge-info"></span></span> <span class="point"></span>
                                    </div>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Pemberitahuan</div>
                                    </li>
                                    <li>
                                        <div class="message-center">

                                            <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle">
                                                    <i class="ti-face-sad"></i>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5 name="nama_pembuat"></h5>
                                                    <span class="mail-desc"></span>
                                                    <span class="time"></span>
                                                </div>
                                            </a>


                                            <!--<a href="javascript:void(0)">
                                                <div class="btn btn-success btn-circle">
                                                    <i class="ti-face-smile"></i>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>Ba</h5>
                                                    <span class="mail-desc">KE</span>
                                                    <span class="time">9:20 AM</span>
                                                </div>
                                            </a>
                                            
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-info btn-circle">
                                                    <i class="ti-comments-smiley"></i>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>..</h5>
                                                    <span class="mail-desc">KOK</span>
                                                    <span class="time">9:10 AM</span>
                                                </div>
                                            </a> -->

                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);">
                                            <strong>Lihat semua</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->


                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('/assets/images/profile/' . $user['foto_peserta']) ?>" alt="user" class="" />
                                <span class="hidden-md-down"><?= $user['nama_peserta']; ?> &nbsp;<i class="fa fa-angle-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="/profil" class="dropdown-item"><i class="ti-user"></i> My
                                    Profile</a>
                                <!-- text-->

                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="/auth/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->

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
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro">
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="<?= base_url('/assets/images/profile/' . $user['foto_peserta']) ?>" alt="user-img" class="img-circle" /><span class="hide-menu"><?= $user['nama_peserta']; ?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="/profil"><i class="ti-user"></i> My Profile</a>
                                </li>
                                <li>
                                    <a href="/auth/logout"><i class="fa fa-power-off"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">-- MENU</li>
                        <?php $member = [1, 2, 3, 4, 5]; ?>
                        <?php $pimpinan = [1, 2, 3, 4]; ?>
                        <?php $mempin = [1, 2, 4, 5]; ?>
                        <?php $direksi = [1, 2, 3]; ?>
                        <?php $admin = [1, 2]; ?>
                        <?php if (in_array($user['role_id'], $member)) : ?>
                            <li>
                                <a <?php if ($menu == "Dashboard") echo "class='waves-effect waves-dark active'"; ?> class="waves-effect waves-dark" href="/home" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array($user['role_id'], $direksi)) : ?>
                            <li> <a <?php if ($menu == "Master") echo "class='has-arrow waves-effect waves-dark active'"; ?> class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-tags"></i><span class="hide-menu">Master</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="/master">Master Departemen</a></li>
                                    <li><a href="/master/jabatan">Master Jabatan</a></li>
                                    <li><a href="/master/karyawan">Master Karyawan</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a <?php if ($menu == "Profil") echo "class='waves-effect waves-dark active'"; ?> class="waves-effect waves-dark" href="/profil" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Profil
                            </a>
                        </li>
                        <?php if (in_array($user['role_id'], $mempin)) : ?>
                            <li>
                                <a <?php if ($menu == "Kinerja") echo "class='waves-effect waves-dark active'"; ?> class="waves-effect waves-dark" href="/kinerja" aria-expanded="false"><i class="ti-receipt"></i><span class="hide-menu">Kinerja
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array($user['role_id'], $pimpinan)) : ?>
                            <li>
                                <a <?php if ($menu == "Penugasan") echo "class='waves-effect waves-dark active'"; ?> class="waves-effect waves-dark" href="/tugas" aria-expanded="false"><i class="icons-Affiliate"></i><span class="hide-menu">Penugasan
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array($user['role_id'], $member)) : ?>
                            <li>
                                <a <?php if ($menu == "Tugas") echo "class='waves-effect waves-dark active'"; ?> class="waves-effect waves-dark" href="/tugas/data_tugas" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Tugas
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array($user['role_id'], $direksi) || $user['id_peserta'] == 24 || $user['id_peserta'] == 14) : ?>
                            <li> <a <?php if ($menu == "Meeting") echo "class='has-arrow waves-effect waves-dark active'"; ?> class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-handshake"></i></i><span class="hide-menu">Meeting</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="/meeting/jadwal">Jadwal</a></li>
                                    <!-- <li><a href="/meeting">Notulensi</a></li> -->
                                </ul>
                            </li>
                        <?php endif; ?>
                        <li> <a <?php if ($menu == "Laporan") echo "class='has-arrow waves-effect waves-dark active'"; ?> class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-printer"></i><span class="hide-menu">Laporan</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/laporan">Laporan Kinerja Harian </a></li>
                                <li><a href="/laporan/laporan_bulan">Laporan Kinerja Bulanan</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->


        <?= $this->renderSection('konten'); ?>