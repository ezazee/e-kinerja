<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"><?= $judul; ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)"><?= $menu; ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
                    </ol>
                    <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15">

                                <i class="fa fa-plus-circle"></i> Create New

                            </button> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30">
                            <img src="<?= base_url('assets/images/profile/' . $karyawan['foto_peserta']) ?>" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10"><?= $karyawan['nama_peserta']; ?></h4>
                            <h6 class="card-subtitle"><?= $karyawan['nama_jabatan']; ?></h6>

                        </center>
                    </div>
                    <div>
                        <hr />
                    </div>
                    <div class="card-body">
                        <small class="text-muted p-t-30 db">Jabatan</small>
                        <h5><?= $karyawan['nama_jabatan']; ?></h5>
                        <small class="text-muted p-t-30 db">Departemen</small>
                        <h5><?= $karyawan['nama_dept']; ?></h5>
                        <small class="text-muted p-t-30 db">Handphone</small>
                        <h5><?= $karyawan['no_hp_peserta']; ?></h5>
                        <small class="text-muted">Email </small>
                        <h5><?= $karyawan['email_peserta']; ?></h5>
                        <small class="text-muted p-t-30 db">No KTP</small>
                        <h5><?= $karyawan['no_ktp']; ?></h5>
                        <small class="text-muted p-t-30 db">NIP</small>
                        <h5><?= $karyawan['nip']; ?></h5>
                        <small class="text-muted p-t-30 db">No. Kontrak</small>
                        <h5><?= $karyawan['no_kontrak']; ?></h5>
                        <small class="text-muted p-t-30 db">No. BPJSTKU</small>
                        <h5><?= $karyawan['no_bpjstku']; ?></h5>
                        <small class="text-muted p-t-30 db">No Rekening</small>
                        <h5><?= $karyawan['no_rek']; ?></h5>
                        <small class="text-muted p-t-30 db">Level Akses Aplikasi</small>
                        <h5><?= $karyawan['nama_akses']; ?></h5>
                        <small class="text-muted p-t-30 db">Alamat</small>
                        <h5><?= $karyawan['alamat_peserta']; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('success'); ?>"></div>
                    <div class="flashdata_gagal" data-flashdata_gagal="<?php echo session()->getFlashdata('gagal'); ?>"></div>
                    <div class="card-body">
                        <h4 class="card-title">Data Keluarga</h4>
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer'); ?>
<script src="/assets/node_modules/dropify/dist/js/dropify.min.js"></script>

<script>
    $(document).ready(function() {
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