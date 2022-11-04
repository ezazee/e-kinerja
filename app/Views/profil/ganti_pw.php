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

        <!-- ============================================================== -->

        <!-- End Bread crumb and right sidebar toggle -->

        <!-- ============================================================== -->

        <!-- ============================================================== -->

        <!-- Start Page Content -->

        <!-- ============================================================== -->

        <!-- Row -->


        <div class="row">
            <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('success'); ?>"></div>
            <div class="flashdata_gagal" data-flashdata_gagal="<?php echo session()->getFlashdata('gagal'); ?>"></div>
            <div class="col-lg-4 col-xlg-3 col-md-5">

                <div class="card">

                    <div class="card-body">

                        <center class="m-t-30">

                            <img src="<?= base_url('assets/images/profile/' . $user['foto_peserta']) ?>" class="img-circle" width="150" />

                            <h4 class="card-title m-t-10"><?= $user['nama_peserta']; ?></h4>

                            <h6 class="card-subtitle"></h6>

                            <br>
                            <a href="/profil" class="btn btn-info">

                                Kembali ke Profil

                            </a>

                        </center>

                    </div>

                    <div>

                        <hr />

                    </div>

                    <div class="card-body">

                        <small class="text-muted">Email address </small>

                        <h6><?= $user['email_peserta']; ?></h6>

                        <small class="text-muted p-t-30 db">Phone</small>

                        <h6><?= $user['no_hp_peserta']; ?></h6>

                        <small class="text-muted p-t-30 db">Address</small>

                        <h6><?= $user['alamat_peserta']; ?></h6>





                    </div>

                </div>

            </div>

            <!-- Column -->

            <!-- Column -->

            <div class="col-lg-8 col-xlg-9 col-md-7">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Ganti Password</h4>

                        <ul class="nav nav-tabs profile-tab" role="tablist">





                        </ul>

                        <!-- Tab panes -->

                        <div class="tab-content">

                            <div class="tab-pane active" id="home" role="tabpanel">

                                <div class="card-body">
                                    <?= form_open(base_url('profil/update_password'), 'id="msform" class="form-horizontal"'); ?>

                                    <div class="form-group">

                                        <div class="col-md-12">
                                            <input type="password" placeholder="Password Sekarang" name="current_password" placeholder="Password Lama" class="form-control form-control-line <?= ($validation->hasError('current_password')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('current_password'); ?>" />
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('current_password'); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-md-12">
                                            <input type="password" name="new_password1" placeholder="Password Baru" class="form-control form-control-line <?= ($validation->hasError('new_password1')) ? 'is-invalid' : ''; ?>" value="<?= old('new_password1'); ?>" />
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('new_password1'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-md-12">
                                            <input type="password" name="new_password2" placeholder="Konfirmasi Password Baru" class="form-control form-control-line <?= ($validation->hasError('new_password2')) ? 'is-invalid' : ''; ?>" value="<?= old('new_password2'); ?>" />
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('new_password2'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-sm-12">
                                            <input type="hidden" class="form-control" name="id_peserta" value="<?= $user['id_peserta']; ?>" id="id_peserta">

                                            <button type="submit" class="btn btn-success">

                                                Ganti Password

                                            </button>

                                        </div>

                                    </div>

                                    <?= form_close() ?>

                                </div>

                            </div>



                        </div>

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



    </div>

    <!-- ============================================================== -->

    <!-- End Container fluid  -->

    <!-- ============================================================== -->

</div>

<?= $this->include('layout/footer'); ?>
<script src="/assets/node_modules/dropify/dist/js/dropify.min.js"></script>

<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });

    const flashData = $('.flash-data').data('flashdata');
    const flashData_gagal = $('.flashdata_gagal').data('flashdata_gagal');
    if (flashData) {
        $.toast({
            heading: 'Berhasil !',
            text: '' + flashData,
            position: 'top-center',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3500
        });
    }

    if (flashData_gagal) {
        $.toast({
            heading: 'Gagal !',
            text: '' + flashData_gagal,
            position: 'top-center',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 3500
        });
    }
</script>
<?= $this->endSection(); ?>