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
                            <h4 class="card-title">Buat Laporan pengerjaan tugas</h4>
                            <!-- <div class="d-flex justify-content-end">
                                <button type="button" class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-plus-circle"></i> Tambah Data</button>
                            </div> -->
                        </div>
                        <hr>

                        <?= form_open_multipart('tugas/buat_laporan_tugas'); ?>
                        <?php if ($validation->getError('file_tugas')) : ?>
                            <div class="alert alert-danger">Upload File gagal ! <?= $validation->listErrors(); ?> </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Pekerjaan:</label>
                            <input type="text" class="form-control  <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" name="pekerjaan" id="pekerjaan" autocomplete="off" value="<?= old('pekerjaan'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('pekerjaan'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tanggal :</label>
                            <div class="input-group">
                                <input type="text" class="form-control mydatepicker <?= ($validation->hasError('tgl_kin')) ? 'is-invalid' : ''; ?>" data-date-format='dd/mm/yyyy' name="tgl_kin" id="tgl_kin" placeholder="dd/mm/yyyy" autocomplete="off" value="<?= old('tgl_kin'); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                </div>
                            </div>
                            <?php if ($validation->hasError('tgl_kin')) : ?>
                                <small>
                                    <div class="text-danger">
                                        <?= $validation->getError('tgl_kin'); ?>
                                    </div>
                                </small>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 col-xs-12">
                                <label for="recipient-name" class="control-label">Jam Mulai:</label>
                                <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control waktuMulai <?= ($validation->hasError('jam_mulai')) ? 'is-invalid' : ''; ?>" name="jam_mulai" id="waktuMulai" autocomplete="off" value="<?= old('jam_mulai'); ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                </div>
                                <?php if ($validation->hasError('jam_mulai')) : ?>
                                    <small>
                                        <div class="text-danger">
                                            <?= $validation->getError('jam_mulai'); ?>
                                        </div>
                                    </small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label for="recipient-name" class="control-label">Jam Selesai:</label>
                                <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control waktuSelesai <?= ($validation->hasError('jam_selesai')) ? 'is-invalid' : ''; ?>" name="jam_selesai" id="waktuSelesai" autocomplete="off" value="<?= old('jam_selesai'); ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                </div>
                                <?php if ($validation->hasError('jam_selesai')) : ?>
                                    <small>
                                        <div class="text-danger">
                                            <?= $validation->getError('jam_selesai'); ?>
                                        </div>
                                    </small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label for="recipient-name" class="control-label">Waktu Kerja:</label>
                                <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control <?= ($validation->hasError('waktu_kin')) ? 'is-invalid' : ''; ?>" placeholder="terisi otomatis" name="waktu_kin" id="selisih" autocomplete="off" value="<?= old('waktu_kin'); ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    </div>
                                </div>
                                <?php if ($validation->hasError('waktu_kin')) : ?>
                                    <small>
                                        <div class="text-danger">
                                            <?= $validation->getError('waktu_kin'); ?>
                                        </div>
                                    </small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Upload file</label>
                            <input type="file" class="form-control  <?= ($validation->hasError('file_tugas')) ? 'is-invalid' : ''; ?>" name="file_tugas">
                            <span class="help-block text-info"><small>ini untuk upload file dokumen maksimal ukuran file 2MB.</small></span>
                            <div class="invalid-feedback">
                                <?= $validation->getError('file_tugas'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Link File :</label>
                            <input type="text" class="form-control" name="link_file" id="link_file" placeholder="Masukan link file" autocomplete="off">
                            <span class="help-block text-info"><small>opsional, jika file berupa foto/Video yang berukuran besar.</small></span>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Keterangan:</label>
                            <textarea id="ket_kin" name="ket_kin" class=" <?= ($validation->hasError('ket_kin')) ? 'is-invalid' : ''; ?>"><?= old('ket_kin'); ?></textarea>
                            <?php if ($validation->hasError('ket_kin')) : ?>
                                <small>
                                    <div class="text-danger">
                                        <?= $validation->getError('ket_kin'); ?>
                                    </div>
                                </small>
                            <?php endif; ?>
                        </div>

                        <hr>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" name="id_tugas" value="<?= $id_tugas; ?>" id="id_pembuat">
                                <input type="hidden" class="form-control" value="<?= $user['id_peserta']; ?>" name="id_user_kin" id="id_user_kin">
                                <input type="hidden" class="form-control" value="<?= $user['nama_peserta']; ?>" name="nama_user_kin" id="nama_user_kin">
                                <button class="btn btn-success waves-effect waves-light" type="submit"><span class="btn-label"><i class="fas fa-paper-plane"></i></span> Kirim laporan</button>
                            </div>
                        </div>
                        </form>




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
    $(document).ready(function() {
        $("input").change(function() {
            var waktuMulai = $('#waktuMulai').val(),
                waktuSelesai = $('#waktuSelesai').val(),
                hours = waktuSelesai.split(':')[0] - waktuMulai.split(':')[0],
                minutes = waktuSelesai.split(':')[1] - waktuMulai.split(':')[1];

            if (waktuMulai <= "12:00:00" && waktuSelesai >= "13:00:00") {
                a = 1;
            } else {
                a = 0;
            }
            minutes = minutes.toString().length < 2 ? '0' + minutes : minutes;
            if (minutes < 0) {
                hours--;
                minutes = 60 + minutes;
            }
            hours = hours.toString().length < 2 ? '0' + hours : hours;

            $('#selisih').val(hours - a + ':' + minutes);
        });
    });

    $(document).ready(function() {

        if ($("#ket_kin").length > 0) {
            tinymce.init({
                selector: "textarea#ket_kin",
                theme: "modern",
                height: 150,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
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