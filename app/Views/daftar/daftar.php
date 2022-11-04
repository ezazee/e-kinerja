<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>

<div class="page-wrapper">

    <!-- ============================================================== -->

    <!-- Container fluid  -->

    <!-- ============================================================== -->

    <div class="container-fluid">

        <!-- ============================================================== -->

        <!-- Bread crumb and right sidebar toggle -->

        <!-- ============================================================== -->

        <div class="row page-titles">

            <div class="col-md-5 align-self-center">

                <h4 class="text-themecolor">Profile</h4>

            </div>

            <div class="col-md-7 align-self-center text-right">

                <div class="d-flex justify-content-end align-items-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">

                            <a href="javascript:void(0)">Home</a>

                        </li>

                        <li class="breadcrumb-item active">Profile</li>

                    </ol>

                    <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15">

                                <i class="fa fa-plus-circle"></i> Create New

                            </button> -->

                </div>

            </div>

        </div>



        <div class="alert alert-info">

            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>

            <h3 class="text-info"><i class="fa fa-exclamation-circle"></i> Information</h3> This is an example top alert. You can edit what u wish. Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.

        </div>



        <div class="row">

            <div class="col-lg-6">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Data diri</h4>

                        <h6 class="card-subtitle">di ambil otomatis dari data profil</h6>

                        <form class="form-horizontal p-t-20">

                            <center class="m-t-30">

                                <img src="<?= base_url('assets/images/profile/' . $user['foto_peserta']) ?>" class="img-circle" width="150" />



                            </center>

                            <br>

                            <div class="form-group row">

                                <label for="exampleInputuname3" class="col-sm-3 control-label">Nama*</label>

                                <div class="col-sm-9">

                                    <div class="input-group">

                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>

                                        <input type="text" class="form-control" value="<?= $user['nama_peserta']; ?>" id="exampleInputuname3" placeholder="Nama">

                                    </div>

                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Email*</label>

                                <div class="col-sm-9">

                                    <div class="input-group">

                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-email"></i></span></div>

                                        <input type="email" class="form-control" value="<?= $user['email_peserta']; ?>" id="exampleInputEmail3" placeholder="Enter email">

                                    </div>

                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="web" class="col-sm-3 control-label">Alamat</label>

                                <div class="col-sm-9">

                                    <div class="input-group">

                                        <div class="input-group-prepend"><span class="input-group-text"><i class=" fas fa-location-arrow"></i></span></div>

                                        <input type="text" class="form-control" value="<?= $user['alamat_peserta']; ?>" id="web" placeholder="Alamat">

                                    </div>

                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="inputPassword4" class="col-sm-3 control-label">No. Handphone*</label>

                                <div class="col-sm-9">

                                    <div class="input-group">

                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone-square"></i></span></div>

                                        <input type="text" class="form-control" value="<?= $user['no_hp_peserta']; ?>" id="exampleInputpwd4" placeholder="No. Handphone">

                                    </div>

                                </div>

                            </div>









                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Pemilihan Lokasi Pelatihan</h4>

                        <br>

                        <h6 class="card-subtitle"></h6>



                        <div class="form-group row">

                            <label for="uname" class="col-sm-3 control-label">Provinsi*</label>

                            <div class="col-sm-9">

                                <div class="input-group">

                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;">

                                        <option></option>

                                        <?php foreach ($provinsi as $d) : ?>

                                            <option value="<?= $d['id_prov']; ?>"><?= $d['nama_prov']; ?></option>

                                        <?php endforeach; ?>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="email2" class="col-sm-3 control-label">Kabupaten/Kota*</label>

                            <div class="col-sm-9">

                                <div class="input-group">

                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;">

                                        <option></option>

                                        <?php foreach ($provinsi as $d) : ?>

                                            <option value="<?= $d['id_prov']; ?>"><?= $d['nama_prov']; ?></option>

                                        <?php endforeach; ?>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="web1" class="col-sm-3 control-label">Kecamatan</label>

                            <div class="col-sm-9">

                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;">

                                    <option></option>

                                    <?php foreach ($provinsi as $d) : ?>

                                        <option value="<?= $d['id_prov']; ?>"><?= $d['nama_prov']; ?></option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="pass3" class="col-sm-3 control-label">Kelurahan/Desa*</label>

                            <div class="col-sm-9">

                                <div class="input-group">

                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;">

                                        <option></option>

                                        <?php foreach ($provinsi as $d) : ?>

                                            <option value="<?= $d['id_prov']; ?>"><?= $d['nama_prov']; ?></option>

                                        <?php endforeach; ?>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="pass4" class="col-sm-3 control-label">LPK*</label>

                            <div class="col-sm-9">

                                <div class="input-group">

                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;">

                                        <option></option>

                                        <?php foreach ($provinsi as $d) : ?>

                                            <option value="<?= $d['id_prov']; ?>"><?= $d['nama_prov']; ?></option>

                                        <?php endforeach; ?>

                                    </select>

                                </div>

                            </div>

                        </div>



                        <div class="form-group row m-b-0">

                            <div class="offset-sm-3 col-sm-9 ">

                                <button type="submit" class="btn btn-success waves-effect waves-light">Daftar</button>

                            </div>

                        </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!-- ============================================================== -->

        <!-- End Bread crumb and right sidebar toggle -->

        <!-- ============================================================== -->

        <!-- ============================================================== -->

        <!-- Start Page Content -->

        <!-- ============================================================== -->

        <!-- Row -->

        <div class="row">

            <div class="col-12">



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



</div>

<!-- ============================================================== -->

<!-- End Container fluid  -->

<!-- ============================================================== -->

</div>

<?= $this->endSection(); ?>