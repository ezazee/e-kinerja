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
            <div class="col-md-12">
                <h4 class="card-title"><a href="/meeting/jadwal" class="btn waves-effect waves-light btn-dark"><i class="fas fa-arrow-circle-left"></i> Kembali</a> &nbsp;</h4>
            </div>
        </div>
        <?php if ($meeting != NULL) : ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-warning">
                        <div class="card-header bg-warning">
                            <h4 class="m-b-0 text-white">Informasi Meeting</h4>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Judul Meeting : <?= $meeting['nama_meeting']; ?></h3>
                            <h4 class="card-title">Point Pembahasan
                                <?= $meeting['point_meeting']; ?>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-success">
                        <div class="card-header bg-success">
                            <h4 class="m-b-0 text-white">Jadwal & Partisipan</h4>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?= longdate_indo($meeting['tgl_meeting']); ?></h3>
                            <h4 class="card-title"><?= $meeting['waktu_mulai']; ?> - <?= $meeting['waktu_selesai']; ?></h4>
                            <h4 class="card-title"><?= $meeting['partisipan']; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('success'); ?>"></div>
            <div class="flashdata_gagal" data-flashdata_gagal="<?php echo session()->getFlashdata('gagal'); ?>"></div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $judul; ?></h4>
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="card-body">
                                    <?= form_open('/meeting/insert_notulen', 'class="mt-4"'); ?>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label class="col-md-12 text-info">Partisipan Meeting</label>
                                            <div class="col-md-12">
                                                <select class="select2 m-b-10 select2-multiple" multiple="multiple" name="partisipan_not[]" id="partisipan" style="width: 100%; height:36px;">
                                                    <option value=""></option>
                                                    <?php foreach ($peserta as $d) : ?>
                                                        <option value="<?= $d['nama_peserta']; ?> | <?= $d['nama_jabatan']; ?>"><?= $d['nama_peserta']; ?> | <?= $d['nama_jabatan']; ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label class="col-md-12 text-info">Tanggal Meeting</label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control mydatepicker" data-date-format='dd/mm/yyyy' name="tgl_notulensi" id="tgl_notulensi" placeholder="dd/mm/yyyy" autocomplete="off" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label class="col-md-12 text-info">Jam Mulai:</label>
                                            <div class="col-md-12">
                                                <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                    <input type="text" class="form-control waktuMulai" name="jam_mulai" id="waktuMulai" autocomplete="off" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label class="col-md-12 text-info">Jam Selesai:</label>
                                            <div class="col-md-12">
                                                <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                    <input type="text" class="form-control waktuMulai" name="jam_selesai" id="waktuSelesai" autocomplete="off" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="message-text" class="col-md-12 text-info">Pembahasan :</label>
                                            <div class="col-md-12">
                                                <textarea id="mymce" name="hasil_notulen"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="message-text" class="col-md-12 text-info">To Do :</label>
                                            <div class="col-md-12">
                                                <textarea id="mymce3" name="todo_notulen"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="hidden" class="form-control" value="<?= $user['id_peserta']; ?>" name="id_created" id="id_buat">
                                            <?php if ($meeting != NULL) : ?>
                                                <input type="hidden" class="form-control" value="<?= $meeting['id_meeting']; ?>" name="id_meeting" id="id_buat">
                                            <?php endif; ?>
                                            <button type="submit" class="btn btn-success">
                                                Buat Notulensi
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
<script type="text/javascript" src="/assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
<script src="/assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="/assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>

<script>
    $(".select2").select2();
    $("#partisipan_not").select2({
        placeholder: 'Pilih Partisipan',
        orientation: 'bottom',
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
    $(document).ready(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 200,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });

    $(document).ready(function() {

        if ($("#mymce3").length > 0) {
            tinymce.init({
                selector: "textarea#mymce3",
                theme: "modern",
                height: 200,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });

    $(function() {
        jQuery('.mydatepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            dateFormat: "dd-mm-yy",

        });
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