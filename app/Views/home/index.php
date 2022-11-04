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
                <h4 class="text-themecolor"><?= $judul; ?> </h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tombol Shortcut</h4>
                        <h6 class="card-subtitle"></h6>
                        <hr>
                        <div class="row button-group">
                            <div class="col-lg-2 col-md-4">
                                <button type="button" class="btn btn-block btn-lg btn-info">Data Karyawan</button>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <button type="button" class="btn btn-block btn-lg btn-success">Buat Tugas</button>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <button type="button" class="btn btn-block btn-lg btn-primary">Lihat Tugas Saya</button>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <button type="button" class="btn btn-block btn-lg btn-danger">Tambah Kinerja</button>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <button type="button" class="btn btn-block btn-lg btn-dark">Lihat Laporan</button>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <button type="button" class="btn btn-block btn-lg btn-warning">Update Profile</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-12">
                <div class="card">
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white">22</h1>
                        <h6 class="text-white">Jumlah Karyawan </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">
                <div class="card">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white">3</h1>
                        <h6 class="text-white">Karyawan Training </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">
                <div class="card">
                    <div class="box bg-primary text-center">
                        <h1 class="font-light text-white">7</h1>
                        <h6 class="text-white">Tugas Saya </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">
                <div class="card">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white">3</h1>
                        <h6 class="text-white">Penugasan </h6>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30">
                            <img src="<?= base_url('assets/images/profile/' . $user['foto_peserta']) ?>" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10"><?= $user['nama_peserta']; ?></h4>
                            <h6 class="card-subtitle"></h6>
                            <br>
                            <a href="/profil" class="btn btn-info">
                                Update Profil
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
            <!-- column -->
            <!-- column -->
            <div class="col-lg-8 col-xlg-3 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Karyawan berdasarkan Departemen</h4>
                        <div>
                            <canvas id="chart2" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            <h3 class="text-info"><i class="fa fa-exclamation-circle"></i> Hai <?= $user['nama_peserta']; ?></h3> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid error reprehenderit voluptates repellat omnis labore qui, fugiat quos, aspernatur, quae deserunt soluta? Id deserunt fugit temporibus natus asperiores adipisci cumque praesentium autem voluptate voluptates! Nesciunt,
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row col-md-12 col-xs-12 d-flex justify-content-between">
                            <h4 class="card-title">Tugas saya | <span class="text-info"><?= $user['nama_peserta']; ?></span></h4>
                            <div class="d-flex justify-content-end">
                                <a href="/tugas/data_tugas" type="button" class="btn btn-sm waves-effect waves-light btn-info"><i class=" fas fa-align-left"></i> Lihat semua tugas</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-widgets m-b-20">
                        <!-- Comment Row -->
                        <?php foreach ($tugas as $row) : ?>
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2">
                                    <span class="round">
                                        <img src="<?= base_url('assets/images/profile/' . $row['foto_peserta']) ?>" alt="user" width="50">
                                    </span>
                                </div>
                                <div class="comment-text w-100">
                                    <div class="d-flex justify-content-between">
                                        <h5><?= $row['nama_peserta']; ?></h5>
                                        <div class="d-flex justify-content-end">
                                            <?php if ($row['status_tugas'] == 0) : ?>
                                                <a href="/tugas/terima_tugas/<?= $row['id_tugas']; ?>" class="badge badge-success">Terima tugas</a>
                                            <?php else : ?>
                                                <span href="/tugas/terima_tugas/<?= $row['id_tugas']; ?>" class="badge badge-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="tugas sudah di proses">Terima tugas</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="comment-footer">
                                        <span class="date"><?= date('d/m/Y H:i', strtotime($row['tgl_dibuat'])); ?></span>
                                        <?php if ($row['status_tugas'] == 0) : ?>
                                            <span class="label label-danger">belum dikerjakan</span>
                                        <?php elseif ($row['status_tugas'] == 1) : ?>
                                            <span class="label label-primary">sedang dikerjakan</span>
                                        <?php elseif ($row['status_tugas'] == 2) : ?>
                                            <span class="label label-info">menunggu verifikasi</span>
                                        <?php elseif ($row['status_tugas'] == 3) : ?>
                                            <span class="label label-success">Ok</span>
                                        <?php endif; ?>


                                    </div>
                                    <p class="font-weight-bold mt-2"><?= $row['nama_tugas']; ?> <br>
                                        <?= $row['ket_tugas']; ?></p>

                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>

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

        <?php
        /* Mengambil query report*/
        foreach ($chart as $result) {
            $departemen[] = $result->departemen; //ambil bulan
            $total_dept[] = (float) $result->total_dept; //ambil nilai
        }
        /* end mengambil query*/
        ?>
        new Chart(document.getElementById("chart2"), {
            "type": "bar",
            "data": {
                "labels": <?php echo json_encode($departemen); ?>,
                "datasets": [{
                    "label": "Jumlah Karyawan",
                    "data": <?php echo json_encode($total_dept); ?>,
                    "fill": false,
                    "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                    "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                    "borderWidth": 1
                }]
            },
            "options": {
                "scales": {
                    "yAxes": [{
                        "ticks": {
                            "beginAtZero": true
                        }
                    }]
                }
            }
        });



    });
</script>
<?= $this->endSection(); ?>