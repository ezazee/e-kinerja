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
                <h4 class="text-themecolor"><?= $judul; ?></h4>
            </div>
            <div class="col-md-7 col-xs-12 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>

                    </ol>


                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('success'); ?>"></div>
                <div class="flashdata_gagal" data-flashdata_gagal="<?php echo session()->getFlashdata('gagal'); ?>"></div>
                <div class="card">
                    <div class="card-body">
                        <div class="row col-md-12 col-xs-12 d-flex justify-content-between">
                            <h4 class="card-title"><?= $judul; ?> | <span class="text-info"><?= $user['nama_peserta']; ?></span></h4>
                            <!-- <div class="d-flex justify-content-end">
                                <button type="button" class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-plus-circle"></i> Tambah Data</button>
                            </div> -->
                        </div>
                        <hr>
                        <div class="text-left ml-4">
                            <h4>Informasi Status tugas</h4>

                            <span class="badge badge-pill badge-danger text-white ml-auto">Belum dikerjakan</span>&emsp;&emsp;&ensp; : tugas belum di terima karyawan<br>
                            <span class="badge badge-pill badge-primary text-white ml-auto">Sedang dikerjakan</span>&emsp;&emsp; : tugas sedang dikerjakan karyawan<br>
                            <span class="badge badge-pill badge-info text-white ml-auto">Menunggu verifikasi</span> &emsp;&ensp;: tugas belum di verifikasi pimpinan<br>
                            <span class="badge badge-pill badge-success text-white ml-auto">Ok</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : tugas selesai/sudah di verifikasi pimpinan<br>
                        </div>

                        <div class="m-t-40">
                            <table id="tabelku" class="table table-bordered table-striped color-bordered-table info-bordered-table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle">Tugas Dari</th>
                                        <th class="text-center align-middle">Nama Tugas</th>
                                        <th class="text-center align-middle">Keterangan Tugas</th>
                                        <th class="text-center align-middle">Tanggal Tugas</th>
                                        <th class="text-center align-middle">Status Tugas</th>
                                        <th class="text-center align-middle">Lampiran Tugas</th>
                                        <th class="text-center align-middle">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($penerima_tugas as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_pembuat']; ?></td>
                                            <td><?= $row['nama_tugas']; ?></td>
                                            <td><?= $row['ket_tugas']; ?></td>
                                            <td><?= longdate_indo($row['tgl_tugas']); ?></td>
                                            <td class="text-center align-middle">
                                                <?php if ($row['status_tugas'] == 0) : ?>
                                                    <span class="badge badge-pill badge-danger text-white ml-auto">Belum dikerjakan</span>
                                                <?php elseif ($row['status_tugas'] == 1) : ?>
                                                    <span class="badge badge-pill badge-primary text-white ml-auto">sedang dikerjakan</span>
                                                <?php elseif ($row['status_tugas'] == 2) : ?>
                                                    <span class="badge badge-pill badge-info text-white ml-auto">menunggu verifikasi</span>
                                                <?php elseif ($row['status_tugas'] == 3) : ?>
                                                    <span class="badge badge-pill badge-success text-white ml-auto">Ok</span>
                                                <?php elseif ($row['status_tugas'] == 4) : ?>
                                                    <span class="badge badge-pill badge-warning text-white ml-auto">Revisi</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center align-middle">
                                                <?php if ($row['file_tugas'] != null) : ?>
                                                    <span class="badge badge-pill badge-success text-white ml-auto">Ada</span>
                                                <?php else : ?>
                                                    <span class="badge badge-pill badge-danger text-white ml-auto">Tidak ada</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                    <?php if ($row['status_tugas'] == 0) : ?>
                                                        <a href="/tugas/terima_tugas/<?= $row['id_tugas']; ?>" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terima tugas"><i class="fas fa-check-square"></i></a>
                                                    <?php else : ?>
                                                        <button href="/tugas/terima_tugas/<?= $row['id_tugas']; ?>" target="_blank" type="button" class="btn btn-success" disabled><i class="fas fa-check-square" data-toggle="tooltip" data-placement="top" title="" data-original-title="Disable"></i></button>
                                                    <?php endif; ?>
                                                    <?php if ($row['status_tugas'] != 0 && $row['status_tugas'] != 2 && $row['status_tugas'] != 3) : ?>
                                                        <a href="/tugas/detail_tugas_kar/<?= $row['id_tugas']; ?>" target="_blank" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Buat laporan tugas"><i class="ti-hand-point-up"></i></a>
                                                    <?php else : ?>
                                                        <button href="/tugas/detail_tugas_kar/<?= $row['id_tugas']; ?>" target="_blank" type="button" class="btn btn-info" disabled><i class="ti-hand-point-up" data-toggle="tooltip" data-placement="top" title="" data-original-title="Disable"></i></button>
                                                    <?php endif; ?>
                                                    <!-- tombol lihat tugas -->
                                                    <?php $array = [2, 3];
                                                    if (in_array($row['status_tugas'], $array)) : ?>
                                                        <a href="/tugas/lihat_tugas/<?= $row['id_tugas']; ?>" target="_blank" type="button" class="btn btn-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Laporan"><i class="fas fa-file-alt"></i></a>
                                                    <?php endif; ?>

                                                </div>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
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
    $('#tabelku').DataTable({
        responsive: true
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