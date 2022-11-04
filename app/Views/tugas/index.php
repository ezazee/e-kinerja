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
            <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('success'); ?>"></div>
            <div class="flashdata_gagal" data-flashdata_gagal="<?php echo session()->getFlashdata('gagal'); ?>"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tugas untuk</h4>
                        <div class="card-body">
                            <?= form_open('tugas/tambah_tugas', 'id="FormLaporan"'); ?>
                            <?php $pimpinan = [1, 2, 3, 4]; ?>
                            <?php $direksi = [1, 2, 3]; ?>
                            <?php if (in_array($user['role_id'], $pimpinan)) : ?>
                                <div class="form-group">
                                    <label>Nama Karyawan</label>
                                    <select class="select2 form-control custom-select" name="id_user_tugas" id="id_user_tugas" style="width: 100%; height:36px;" required>
                                        <option value=""></option>
                                        <?php foreach ($peserta as $d) : ?>
                                            <option value="<?= $d['id_peserta']; ?>"><?= $d['nama_peserta']; ?> | <?= $d['nama_jabatan']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                            <?php if ($user['role_id'] != 1) : ?>
                                <input type="hidden" class="form-control" value="<?= $user['id_peserta']; ?>" name="nama_pes" id="nama_pes">
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Tanggal tugas :</label>
                                <div class="input-group">
                                    <input type="text" class="form-control mydatepicker2" data-date-format='dd/mm/yyyy' name="tgl_tugas" id="tgl_tugas" placeholder="dd/mm/yyyy" autocomplete="off" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row col-md-12 col-xs-12 d-flex justify-content-between">
                            <h4 class="card-title">Detail Tugas</h4>
                            <?php if (in_array($user['role_id'], $direksi)) : ?>
                                <div class="d-flex justify-content-end">
                                    <a href="/tugas/semua_tugas" class="btn waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="klik untuk melihat semua tugas yang di buat pimpinan"><i class="fas fa-align-left"></i> Lihat Semua data tugas</a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Tugas:</label>
                                <input type="text" class="form-control" name="nama_tugas" id="nama_tugas" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="control-label">Keterangan:</label>
                                <textarea id="mymce" name="ket_tugas"></textarea>

                            </div>

                            <div class="form-group">

                                <div class="col-sm-12">
                                    <input type="hidden" class="form-control" name="id_pembuat" value="<?= $user['id_peserta']; ?>" id="id_pembuat">
                                    <button type="submit" class="btn btn-success">
                                        Submit Penugasan
                                    </button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Column -->

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row col-md-12 col-xs-12 d-flex justify-content-between">
                            <h4 class="card-title">Riwayat Penugasan</h4>
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
                            <table id="tabelku" class="table table-bordered table-striped color-bordered-table danger-bordered-table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle">Nama Karyawan</th>
                                        <th class="text-center align-middle">Tanggal tugas</th>
                                        <th class="text-center align-middle">Nama Tugas</th>
                                        <th class="text-center align-middle">Keterangan</th>
                                        <th class="text-center align-middle">Tanggal dibuat</th>
                                        <th class="text-center align-middle">Status Tugas</th>
                                        <th class="text-center align-middle">Lampiran Tugas</th>
                                        <th class="text-center align-middle">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tugas as $row) : ?>
                                        <tr>
                                            <td class="text-center align-middle"><?= $no++; ?></td>
                                            <td class="text-center align-middle"><?= $row['nama_peserta']; ?></td>
                                            <td class="text-center align-middle"><?= $row['tgl_tugas']; ?></td>
                                            <td class="text-center align-middle"><?= $row['nama_tugas']; ?></td>
                                            <td class="text-center align-middle"><?= $row['ket_tugas']; ?></td>
                                            <td class="text-center align-middle"><?= date('d/m/Y H:i', strtotime($row['tgl_dibuat'])); ?></td>
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
                                            <td class="text-center align-middle"><a href="tugas/detail_tugas/<?= $row['id_tugas']; ?>" target="_blank" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail tugas"><i class="ti-zoom-in"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
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
        responsive: true
    });
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

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 100,
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