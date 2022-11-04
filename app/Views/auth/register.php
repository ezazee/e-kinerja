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

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">

    <link rel="apple-touch-icon-precomposed" href="assets/images/pangling-icon-57-precomposed.png"> <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/pangling-icon-114-precomposed.png"> <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/pangling-icon-72-precomposed.png"> <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/pangling-icon-144-precomposed.png"> <!-- For iPad Retina display -->



    <title><?= $judul; ?></title>

    <!-- page css -->

    <link href="/assets/node_modules/register-steps/steps.css" rel="stylesheet" />

    <link href="/dist/css/pages/register3.css" rel="stylesheet" />

    <link rel="stylesheet" href="/assets/node_modules/dropify/dist/css/dropify.min.css">

    <!-- Custom CSS -->

    <link href="/dist/css/style.min.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>



<body class="skin-default card-no-border">

    <!-- ============================================================== -->

    <!-- Preloader - style you can find in spinners.css -->

    <!-- ============================================================== -->

    <div class="preloader">

        <div class="loader">

            <div class="loader__figure"></div>

            <p class="loader__label">LPK Pang-ling</p>

        </div>

    </div>

    <!-- ============================================================== -->

    <!-- Main wrapper - style you can find in pages.scss -->

    <!-- ============================================================== -->



    <section id="wrapper" class="step-register">

        <div class="register-box mb-4">

            <div class="text-center">

                <a href="javascript:void(0)" class="text-center m-b-20">

                    <img src="/assets/images/logo-icon.png" alt="Home" /><br />

                    <img src="/assets/images/logo-text.png" alt="Home" />

                </a>











                <!-- multistep form -->

                <div class="text-center">

                    <a href="/auth" class="btn waves-effect waves-light btn-sm btn-success"><b>Kembali ke Login</b></a>

                </div>

                <?= form_open_multipart(base_url('auth/proses_register'), 'id="msform"'); ?>

                <!-- progressbar -->

                <ul id="eliteregister">

                    <li class="active">Pengaturan Akun</li>

                    <li>Profil</li>

                    <li>Personal Detail</li>

                </ul>

                <!-- fieldsets -->

                <fieldset>

                    <h2 class="fs-title">Pendaftaran</h2>

                    <h3 class="fs-subtitle">Lembaga Pelatihan Kerja</h3>

                    <input type="text" id="email" name="email" placeholder="Email" />

                    <input type="password" id="password1" name="password1" placeholder="Password" />

                    <input type="password" id="password2" name="password2" placeholder="Konformasi Password" />

                    <input type="button" name="next" class="next action-button" value="Lanjut" />

                </fieldset>

                <fieldset>

                    <div class="col-lg-12 col-md-12">

                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">Foto</h4>

                                <input type="file" id="input-file-now-custom-1" name="foto" class="dropify" data-default-file="/assets/images/profile/default.jpg" />

                            </div>

                        </div>

                    </div>

                    <!-- <input type="file" /> -->



                    <input type="button" name="previous" class="previous action-button" value="Kembali" />

                    <input type="button" name="next" class="next action-button" value="Lanjut" />

                </fieldset>

                <fieldset>

                    <h2 class="fs-title"></h2>

                    <h3 class="fs-subtitle"></h3>

                    <input type="text" name="nama_pes" placeholder="Nama" />

                    <input type="text" name="hp_pes" placeholder="No. Handphone" />

                    <textarea name="alamat_pes" placeholder="Alamat"></textarea>

                    <input type="button" name="previous" class="previous action-button" value="Kembali" />

                    <input type="submit" name="submit" class="action-button" value="Submit" />

                </fieldset>

                <?= form_close() ?>

                <div class="clear"></div>

            </div>

        </div>

        <br />

    </section>



    <br />

    <br />

    <!-- ============================================================== -->

    <!-- End Wrapper -->

    <!-- ============================================================== -->

    <!-- ============================================================== -->

    <!-- All Jquery -->

    <!-- ============================================================== -->

    <script src="/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap tether Core JavaScript -->

    <script src="/assets/node_modules/popper/popper.min.js"></script>

    <script src="/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Menu Plugin JavaScript -->

    <script src="/assets/node_modules/register-steps/jquery.easing.min.js"></script>

    <script src="/assets/node_modules/register-steps/register-init.js"></script>

    <!-- jQuery file upload -->

    <script src="/assets/node_modules/dropify/dist/js/dropify.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            // Basic

            $('.dropify').dropify();



        });

        $(function() {

            $(".preloader").fadeOut();

        });

        $(function() {

            $('[data-toggle="tooltip"]').tooltip();

        });

        // ==============================================================

        // Login and Recover Password

        // ==============================================================

        $("#to-recover").on("click", function() {

            $("#loginform").slideUp();

            $("#recoverform").fadeIn();

        });
    </script>

</body>



</html>