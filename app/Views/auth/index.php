<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <link href="/dist/css/pages/login-register-lock.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="/dist/css/style.min.css" rel="stylesheet">





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->

</head>



<body>

    <!-- ============================================================== -->

    <!-- Preloader - style you can find in spinners.css -->

    <!-- ============================================================== -->

    <div class="preloader">

        <div class="loader">

            <div class="loader__figure"></div>

            <p class="loader__label">E-KINERJA GKD/p>

        </div>

    </div>

    <!-- ============================================================== -->

    <!-- Main wrapper - style you can find in pages.scss -->

    <!-- ============================================================== -->

    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(../assets/images/background/barber.jpg);" style="height: 1200px;
 width: 100%;
 text-align: center;
 
 background-size: cover;
 background-attachment: fixed;
 background-repeat: no-repeat;
 background-position: center; ">

        <div class="login-box card" style="opacity: .9;">

            <div class="card-body">

                <form class="form-horizontal form-material text-center" id="loginform" method="post" action="<?= base_url('auth/check_login'); ?>">

                    <a href="javascript:void(0)" class="db"><img src="../assets/images/logo-icon.png" alt="Home" style="width:100px" /><br /><img class="mt-2" src="../assets/images/logo-text.png" style="width:200px" alt="Home" /></a>



                    <div class="text-center mt-5 mb-5">

                        <h4 class="font-weight-bold">APLIKASI E-KINERJA</h4>

                    </div>

                    <div class="text-center mt-2">

                        <h5>Silahkan Login</h5>

                    </div>
                    <div class="form-group m-t-40">

                        <div class="col-xs-12">

                            <input class="form-control" id="email" name="email" type="text" value="<?= old('email'); ?>" type="text" required="" placeholder="Email">

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-xs-12">

                            <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password">

                        </div>

                    </div>
                    <?php if (session()->get('gagal')) : ?>
                        <div class="alert alert-danger">Login gagal ! <?= session()->getFlashdata('gagal'); ?> </div>
                    <?php endif; ?>


                    <div class="form-group row">

                        <div class="col-md-12">

                            <div class="d-flex no-block align-items-center">

                                <!-- <div class="custom-control custom-checkbox">

                                    <input type="checkbox" class="custom-control-input" id="customCheck1">

                                    <label class="custom-control-label" for="customCheck1">Remember me</label>

                                </div> -->

                                <div class="ml-auto">

                                    <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Lupa password?</a>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- <?php if (!empty(session()->getFlashdata('gagal'))) { ?>

                        <div class="alert alert-warning">

                            <?php echo session()->getFlashdata('gagal'); ?>

                        </div>

                    <?php } ?> -->



                    <!-- <?php

                            if (isset($validation)) { ?>

                        <div class="alert alert-danger">

                            <?php echo $validation->listErrors(); ?>

                        </div>

                    <?php } ?> -->

                    <div class="form-group text-center m-t-20">

                        <div class="col-xs-12">

                            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Login</button>

                        </div>

                    </div>

                    <!-- <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">

                            <div class="social">

                                <button class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </button>

                                <button class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus-g"></i> </button>

                            </div>

                        </div>

                    </div> -->

                    <!-- <div class="form-group m-b-0">

                        <div class="col-sm-12 text-center">

                            Belum punya akun ? <a href="/auth/register" class="text-primary m-l-5"><b>Daftar</b></a>

                        </div>

                    </div> -->

                </form>

                <form class="form-horizontal" id="recoverform" class="mt-3" action="index.html">

                    <div class="form-group ">
                        <div class="ml-auto">

                            <a href="javascript:void(0)" id="to-login" class="text-info "><i class=" fas fa-arrow-circle-left m-r-5"></i> Back to Login </a>

                        </div>
                        <br>

                        <div class="col-xs-12">

                            <h3>Recover Password</h3>

                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>

                        </div>

                    </div>

                    <div class="form-group ">

                        <div class="col-xs-12">

                            <input class="form-control" type="text" required="" placeholder="Email">

                        </div>

                    </div>

                    <div class="form-group text-center m-t-20">

                        <div class="col-xs-12">

                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </section>

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

    <script src="/assets/node_modules/toast-master/js/jquery.toast.js"></script>

    <!--Custom JavaScript -->

    <script type="text/javascript">
        $(function() {

            $(".preloader").fadeOut();

        });

        $(function() {

            $('[data-toggle="tooltip"]').tooltip()

        });

        // ============================================================== 

        // Login and Recover Password 

        // ============================================================== 

        $('#to-recover').on("click", function() {

            $("#loginform").slideUp();

            $("#recoverform").fadeIn();

        });

        $('#to-login').on("click", function() {

            $("#recoverform").slideUp();

            $("#loginform").fadeIn();

        });
    </script>



</body>



</html>