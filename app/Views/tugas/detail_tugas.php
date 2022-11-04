<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>

<div class="page-wrapper">

    <!-- ============================================================== -->

    <!-- Container fluid  -->

    <!-- ============================================================== -->

    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"><?= $submenu; ?> </h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)"><?= $menu; ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?= $submenu; ?></li>
                    </ol>
                    <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15">
                                <i class="fa fa-plus-circle"></i> Create New
                            </button> -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row col-md-12 col-xs-12 d-flex justify-content-between">
                            <h4 class="card-title">Detail Tugas</h4>
                            <!-- <div class="d-flex justify-content-end">
                                <button type="button" class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-plus-circle"></i> Tambah Data</button>
                            </div> -->
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="text-center">Tugas Dari </label>
                            <h5 class="font-weight-bold text-info"><?= $detail_tugas['nama_pembuat']; ?></h5>
                        </div>
                        <div class="form-group">
                            <label class="text-center">Tugas Untuk </label>
                            <h5 class="font-weight-bold text-info"><?= $detail_tugas['nama_peserta']; ?></h5>
                        </div>
                        <div class="form-group">
                            <label class="text-center">Nama Tugas </label>
                            <h5 class="font-weight-bold text-info"><?= $detail_tugas['nama_tugas']; ?></h5>
                        </div>
                        <div class="form-group">
                            <label class="text-center">Keterangan Tugas </label>
                            <div class="font-weight-bold text-info"><?= $detail_tugas['ket_tugas']; ?></div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row col-md-12 col-xs-12 d-flex justify-content-between">
                            <h4 class="card-title">Laporan pengerjaan tugas dari <span class="text-warning font-weight-bold"> <?= $detail_tugas['nama_peserta']; ?> </span></h4>
                            <!-- <div class="d-flex justify-content-end">
                                <button type="button" class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-plus-circle"></i> Tambah Data</button>
                            </div> -->
                        </div>
                        <hr>
                        <?php if ($detail_tugas_kinerja != null) : ?>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="text-center">Tanggal pengerjaan </label>
                                    <h5 class="font-weight-bold text-info"><?= longdate_indo($detail_tugas_kinerja['tgl_kin']); ?></h5>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label class="text-center">Jam mulai pengerjaan </label>
                                    <h5 class="font-weight-bold text-info"><?= $detail_tugas_kinerja['jam_mulai']; ?></h5>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="text-center">Jam selesai pengerjaan </label>
                                    <h5 class="font-weight-bold text-info"><?= $detail_tugas_kinerja['jam_selesai']; ?></h5>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="text-center">Waktu pengerjaan </label>
                                    <h5 class="font-weight-bold text-info"><?= $detail_tugas_kinerja['waktu_kin']; ?></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="text-center">Nama pekerjaan </label>
                                    <h5 class="font-weight-bold text-info"><?= $detail_tugas_kinerja['pekerjaan']; ?></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="text-center">Keterangan pekerjaan </label>
                                    <h5 class="font-weight-bold text-info"><?= $detail_tugas_kinerja['ket_kin']; ?></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="text-center">Link Dokumen </label>
                                    <?php if ($detail_tugas_kinerja['link_file'] != null) : ?>
                                        <h5 class="font-weight-bold text-danger"><a href="<?= $detail_tugas_kinerja['link_file']; ?>" target="_blank"><?= $detail_tugas_kinerja['link_file']; ?></a></h5>
                                    <?php else : ?>
                                        <h5 class="font-weight-bold text-danger">Link file tidak di input</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="text-center">Status pekerjaan </label>
                                    <h5 class="font-weight-bold text-info text-align-middle">
                                        <?php if ($detail_tugas_kinerja['status_tugas'] == 0) : ?>
                                            <span class="badge badge-pill badge-danger text-white ml-auto">
                                                <h4> Belum dikerjakan</h4>
                                            </span>
                                        <?php elseif ($detail_tugas_kinerja['status_tugas'] == 1) : ?>
                                            <span class="badge badge-pill badge-primary text-white ml-auto">
                                                <h4> sedang dikerjakan</h4>
                                            </span>
                                        <?php elseif ($detail_tugas_kinerja['status_tugas'] == 2) : ?>
                                            <span class="badge badge-pill badge-info text-white ml-auto">
                                                <h4> menunggu verifikasi</h4>
                                            </span>
                                        <?php elseif ($detail_tugas_kinerja['status_tugas'] == 3) : ?>
                                            <span class="badge badge-pill badge-success text-white ml-auto">
                                                <h4> Ok</h4>
                                            </span>
                                        <?php elseif ($detail_tugas_kinerja['status_tugas'] == 4) : ?>
                                            <span class="badge badge-pill badge-warning text-white ml-auto">
                                                <h4> Revisi</h4>
                                            </span>
                                        <?php endif; ?>
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="text-center">Lampiran file </label><br>
                                    <?php if ($detail_tugas_kinerja['file_tugas'] != null) : ?>
                                        <a href="/assets/upload/dokumen/<?= $detail_tugas_kinerja['file_tugas']; ?>" class="btn btn-success waves-effect waves-light" type="button"><span class="btn-label"></span> download file</a>
                                    <?php else : ?>
                                        <h5 class="font-weight-bold text-danger">Tidak ada lampiran file</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ($detail_tugas_kinerja['file_tugas'] != null) : ?>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="text-center">Preview file :</label><br>
                                        <?php if ($detail_tugas_kinerja['file_tugas'] != null) : ?>
                                            <a href="https://docs.google.com/viewer?url=<?= base_url(); ?>/assets/upload/dokumen/<?= $detail_tugas_kinerja['file_tugas']; ?>&embedded=true" target="_blank" class="btn btn-info waves-effect waves-light" type="button"><span class="btn-label"></span> Preview file di tab baru </a><br>
                                        <?php endif; ?>
                                        <span class="help-block text-danger"><small>jika preview tidak tampil reload/refresh halaman, jika masih tidak tampil (tong janten emutan) langsung download saja </small></span>
                                    </div>
                                </div><br>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://docs.google.com/viewer?url=<?= base_url(); ?>/assets/upload/dokumen/<?= $detail_tugas_kinerja['file_tugas']; ?>&embedded=true" width="600" height="780" style="border: none;">
                                    </iframe>
                                </div>
                            <?php endif; ?>
                            <br>


                            <hr>
                            <div class="form-group">

                                <div class="col-sm-12">
                                    <input type="hidden" class="form-control" name="id_pembuat" value="<?= $user['id_peserta']; ?>" id="id_pembuat">
                                    <?php if ($detail_tugas_kinerja['status_tugas'] != 3 && $detail_tugas_kinerja['status_tugas'] != 4 && $detail_tugas_kinerja['id_pembuat'] == $user['id_peserta']) : ?>
                                        <a href="/tugas/tugas_disetujui/<?= $detail_tugas_kinerja['id_tugas']; ?>" class="btn btn-success waves-effect waves-light" type="button"><span class="btn-label"><i class="ti-thumb-up"></i></span> Approve </a>

                                    <?php endif; ?>
                                    <!-- <button class="btn btn-warning waves-effect waves-light" type="button"><span class="btn-label"><i class="ti-thumb-down" disabled></i></span> Revisi</button> -->

                                </div>
                            </div>
                        <?php else : ?>
                            <div class="row mt-4">
                                <div class="form-group col-md-12">
                                    <h4 class="font-weight-bold text-danger text-center">Belum ada feedback untuk tugas ini .</h4>
                                </div>
                            </div>

                        <?php endif; ?>





                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- ============================================================== -->

    <!-- End Container fluid  -->

    <!-- ============================================================== -->

</div>

<?= $this->include('layout/footer'); ?>
<script src="/assets/node_modules/dropify/dist/js/dropify.min.js"></script>

<script>
    $('#tabelku').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

    $(function() {
        jQuery('.mydatepicker2').datepicker({
            autoclose: true,
            todayHighlight: true,
            dateFormat: "dd-mm-yy",
            orientation: 'bottom'

        });
    });
    $(function() {
        jQuery('.mydatepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            dateFormat: "dd-mm-yy",

        });
    });
    $('.waktuMulai').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.waktuSelesai').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $(".select2").select2({
        placeholder: 'Pilih Karyawan',
        orientation: 'bottom',
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