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

        <div class="row">
            <div class="col-md-6">
                <div class="card border-warning">
                    <div class="card-header bg-warning">
                        <h4 class="m-b-0 text-white">Informasi Meeting</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Judul Meeting : <?= $notulen['nama_meeting']; ?></h3>
                        <h4 class="card-title">Point Pembahasan
                            <?= $notulen['point_meeting']; ?>
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
                        <h3 class="card-title"><?= longdate_indo($notulen['tgl_meeting']); ?></h3>
                        <h4 class="card-title">Jam : <?= $notulen['waktu_mulai']; ?> - <?= $notulen['waktu_selesai']; ?></h4>
                        <h4 class="card-title"><?= $notulen['partisipan']; ?></h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card border-warning">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Notulensi Meeting</h4>
                    </div>
                    <div class="card-body">

                        <h3 class="card-title"><?= longdate_indo($notulen['tgl_notulensi']); ?></h3>
                        <h4 class="card-title">Jam : <?= $notulen['jam_mulai']; ?> - <?= $notulen['jam_selesai']; ?></h4>
                        <h4 class="card-title"><?= $notulen['partisipan_not']; ?></h4>
                        <hr>
                        <h4 class="card-title">Pembahasan</h4>
                        <h5 class="card-text"><?= $notulen['hasil_notulen']; ?></h5>
                        <hr>
                        <h4 class="card-title">To Do</h4>
                        <h5 class="card-text"><?= $notulen['todo_notulen']; ?></h5>
                    </div>
                </div>
            </div>

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