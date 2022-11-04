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
                <h4 class="text-themecolor"><?= $submenu; ?> </h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)"><?= $judul; ?></a>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Rencana Kerja</h4>
                        <div id="education_fields"></div>
                        <div class="row">
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama_plan" name="nama_plan[]" value="" placeholder="Nama Pekerjaan">
                                </div>
                            </div>
                            <div class="col-sm-5 nopadding">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Keterangan Pekerjaan" name="ket_plan" id="ket_plan[]" required></textarea>

                                </div>
                            </div>
                            <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control mydatepicker2" data-date-format='dd/mm/yyyy' name="tgl_plan" id="tgl_plan[]" placeholder="dd/mm/yyyy" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="icon-calender"></i></span>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button" onclick="education_fields();"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->

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

<script>
    $(function() {
        $('.mydatepicker2').each(function() {
            $(this).datepicker({
                autoclose: true,
                todayHighlight: true,
                dateFormat: "dd-mm-yy",
                orientation: 'bottom'
            });
        });
    });


    $(".select2").select2({
        placeholder: 'Pilih Karyawan',
    });

    $(document).ready(function() {
        $("#FormLaporan").submit(function(e) {
            e.preventDefault();
            var nama_pes = $("#nama_pes").val();
            var tgl_kin = $("#tgl_kin").val();
            // console.log(id);
            var url = "laporan/filter/" + nama_pes + '/' + tgl_kin;
            $('#result').load(url);
        })
    });
</script>
<?= $this->endSection(); ?>