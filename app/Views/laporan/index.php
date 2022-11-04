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
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Filter</h4>
                        <?= form_open('laporan/filter', 'id="FormLaporan"'); ?>

                        <?= form_open('laporan/filter_bulan', 'id="FormLaporan"'); ?>
                        <?php if ($user['role_id'] != 5) : ?>
                            <div class="form-group">
                                <label>Karyawan</label>
                                <select class="select2 form-control custom-select" name="nama_pes" id="nama_pes" style="width: 100%; height:36px;" required>
                                    <option value=""></option>
                                    <?php if ($user['role_id'] == 1) : ?>
                                        <option value="0">Tampilkan Semua Karyawan</option>
                                    <?php endif; ?>
                                    <?php foreach ($peserta as $d) : ?>
                                        <option value="<?= $d['id_peserta']; ?>"><?= $d['nama_peserta']; ?> | <?= $d['nama_jabatan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                        <?php if ($user['role_id'] == 5) : ?>
                            <input type="hidden" class="form-control" value="<?= $user['id_peserta']; ?>" name="nama_pes" id="nama_pes">
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tanggal :</label>
                            <div class="input-group">
                                <input type="text" class="form-control mydatepicker2" data-date-format='yyyy-mm-dd' name="tgl_kin" id="tgl_kin" placeholder="dd/mm/yyyy" autocomplete="off" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">

                            <div class="offset-sm-3 col-sm-9 ">

                                <button type="submit" class="btn btn-success waves-effect waves-light">Filter</button>

                            </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Hasil Filter</h4>
                        <div class="m-t-10" id="result">

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

<script>
    $(function() {
        jQuery('.mydatepicker2').datepicker({
            autoclose: true,
            todayHighlight: true,
            dateFormat: "dd-mm-yy",
            orientation: 'bottom'

        });
    });
    $(".select2").select2({
        placeholder: 'Pilih Karyawan',
        orientation: 'bottom',
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