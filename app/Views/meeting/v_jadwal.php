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
                            <h4 class="card-title">Data <?= $judul; ?></h4>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-plus-circle"></i> Tambah Data</button>
                            </div>
                        </div>
                        <hr>
                        <div class="m-t-40">
                            <table id="tabelku" class="table display table-bordered table-striped info-bordered-table" style="width:100%;table-layout:auto">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle" style="width: 5%;">No</th>
                                        <th class="text-center align-middle" style="width: 10%;">Tanggal</th>
                                        <th class="text-center align-middle" style="width: 7%;">Jam Mulai</th>
                                        <th class="text-center align-middle" style="width: 7%;">Jam Selesai</th>
                                        <th class="text-center align-middle" style="width: 15%;">Judul Meeting</th>
                                        <th class="text-center align-middle">Point Pembahasan</th>
                                        <th class="text-center align-middle" style="width: 15%;">Partisipan</th>
                                        <th class="text-center align-middle" style="width: 6%;">Status</th>
                                        <th class="text-center align-middle">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($meeting as $row) : ?>
                                        <tr>
                                            <td class="text-center align-middle"><?= $no++; ?></td>
                                            <td class="text-center align-middle"><?= longdate_indo($row['tgl_meeting']); ?></td>
                                            <td class="text-center align-middle"><?= $row['waktu_mulai']; ?></td>
                                            <td class="text-center align-middle"><?= $row['waktu_selesai']; ?></td>
                                            <td class="text-center align-middle"><?= $row['nama_meeting']; ?></td>
                                            <td class="text-left align-middle"><?= $row['point_meeting']; ?></td>
                                            <td class="text-center align-middle"><?= $row['partisipan']; ?></td>
                                            <td class="text-center align-middle">
                                                <?php if ($row['status_meeting'] == 1) : ?>
                                                    <span class="badge badge-pill badge-success text-white ml-auto">Selesai</span>
                                                <?php else : ?>
                                                    <span class="badge badge-pill badge-danger text-white ml-auto">Belum</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                    <?php if ($row['status_meeting'] == 1) : ?>

                                                        <a href="/meeting/lihat_notulensi/<?= $row['id_meeting']; ?>" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Notulensi">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </a>

                                                    <?php endif; ?>
                                                    <?php if ($row['status_meeting'] != 1) : ?>
                                                        <a href="/meeting/tambah_notulensi/<?= $row['id_meeting']; ?>" class="btn btn-danger btn-edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Buat notulensi">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
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

<!-- MODAL ADD -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Pekerjaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?= form_open('meeting/tambah_jadwal'); ?>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Judul Meeting :</label>
                    <input type="text" class="form-control" name="nama_meeting" id="nama_meeting" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Tanggal :</label>
                    <div class="input-group">
                        <input type="text" class="form-control mydatepicker" data-date-format='dd/mm/yyyy' name="tgl_meeting" id="tgl_meeting" placeholder="dd/mm/yyyy" autocomplete="off" required>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="icon-calender"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="recipient-name" class="control-label">Jam Mulai:</label>
                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                            <input type="text" class="form-control waktuMulai" name="waktu_mulai" id="waktuMulai" autocomplete="off" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                        </div>
                        <span class="help-block text-danger"><small>format waktu 24jam, harap teliti saat input.</small></span>
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="recipient-name" class="control-label">Jam Selesai:</label>
                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                            <input type="text" class="form-control waktuSelesai" name="waktu_selesai" id="waktuSelesai" autocomplete="off" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                        </div>
                        <span class="help-block text-danger"><small>format waktu 24jam, harap teliti saat input.</small></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Partisipan :</label>
                    <select class="select2 m-b-10 select2-multiple" multiple="multiple" name="partisipan[]" id="partisipan" style="width: 100%; height:36px;">
                        <option value=""></option>
                        <?php foreach ($peserta as $d) : ?>
                            <option value="<?= $d['nama_peserta']; ?> | <?= $d['nama_jabatan']; ?>"><?= $d['nama_peserta']; ?> | <?= $d['nama_jabatan']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Point Pembahasan :</label>
                    <textarea id="point_meeting" name="point_meeting"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control" value="<?= $user['id_peserta']; ?>" name="pembuat_meeting" id="pembuat_meeting">
                <input type="hidden" class="form-control" value="<?= $user['nama_peserta']; ?>" name="nama_pembuat_meeting" id="nama_pembuat_meeting">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- MODAL EDIT -->
<div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModalLabel1">Edit Data Pekerjaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?= form_open('kinerja/update'); ?>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Nama Pekerjaan:</label>
                    <input type="text" class="form-control" name="pekerjaan2" id="pekerjaan2" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Tanggal :</label>
                    <div class="input-group">
                        <input type="text" class="form-control mydatepicker2" data-date-format='dd/mm/yyyy' name="tgl_kin2" id="tgl_kin2" placeholder="dd/mm/yyyy" autocomplete="off" required>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="icon-calender"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 col-xs-12">
                        <label for="recipient-name" class="control-label">Jam Mulai:</label>
                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                            <input type="text" class="form-control waktuMulai" name="jam_mulai2" id="waktuMulai2" autocomplete="off" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-xs-12">
                        <label for="recipient-name" class="control-label">Jam Selesai:</label>
                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                            <input type="text" class="form-control waktuSelesai" name="jam_selesai2" id="waktuSelesai2" autocomplete="off" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-xs-12">
                        <label for="recipient-name" class="control-label">Waktu Kerja:</label>
                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                            <input type="text" class="form-control" placeholder="terisi otomatis" name="waktu_kin2" id="selisih2" autocomplete="off" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Link File :</label>
                    <input type="text" class="form-control" name="link_file2" id="link_file2" placeholder="Masukan link download file(jika ada)" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Keterangan:</label>
                    <textarea id="ket_kin2" name="ket_kin2"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control" name="id_kinerja" id="id_kinerja">
                <input type="hidden" class="form-control" value="<?= $user['id_peserta']; ?>" name="id_user_kin2" id="id_user_kin">
                <input type="hidden" class="form-control" value="<?= $user['nama_peserta']; ?>" name="nama_user_kin2" id="nama_user_kin">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- MODAL EDIT -->
<div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteModalLabel1">Hapus Data Pekerjaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?= form_open('kinerja/delete'); ?>
                <h4>Anda yakin akan menghapus data ini ?</h4>
            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control" name="id_kinerja2" id="id_kinerja2">
                <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus !</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->
<?= $this->include('layout/footer'); ?>

<script>
    $(".select2").select2();
    $("#partisipan").select2({
        placeholder: 'Pilih Partisipan',
        orientation: 'bottom',
    });
    $('#tabelku').DataTable({
        responsive: true
    });

    $(function() {
        jQuery('.mydatepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            dateFormat: "dd-mm-yy",

        });
    });
    $(function() {
        jQuery('.mydatepicker2').datepicker({
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
    $('.waktuMulai2').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.waktuSelesai2').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
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
        $("input").change(function() {
            var waktuMulai = $('#waktuMulai2').val(),
                waktuSelesai = $('#waktuSelesai2').val(),
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

            $('#selisih2').val(hours - a + ':' + minutes);
        });
    });

    $(document).ready(function() {

        if ($("#point_meeting").length > 0) {
            tinymce.init({
                selector: "textarea#point_meeting",
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
    $(document).ready(function() {

        if ($("#ket_kin2").length > 0) {
            tinymce.init({
                selector: "textarea#ket_kin2",
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

    $(document).ready(function() {

        // get Edit Product
        $('#tabelku').on('click', '.btn-edit', function() {
            // get data from button edit
            const id = $(this).data('id');
            const pekerjaan = $(this).data('pekerjaan');
            const link = $(this).data('link');
            const tgl_kin = $(this).data('tgl_kin');
            const jam_mulai = $(this).data('jam_mulai');
            const jam_selesai = $(this).data('jam_selesai');
            const waktu_kin = $(this).data('waktu_kin');
            const ket_kin = $(this).data('ket_kin');
            // Set data to Form Edit
            $('#id_kinerja').val(id);
            $('#pekerjaan2').val(pekerjaan);
            $('#link_file2').val(link);
            $('#tgl_kin2').val(tgl_kin);
            $('#waktuMulai2').val(jam_mulai);
            $('#waktuSelesai2').val(jam_selesai);
            $('#selisih2').val(waktu_kin);
            tinyMCE.activeEditor.setContent(ket_kin);

            // Call Modal Edit
            $('#editModal').modal('show');
        });

        // get Delete Product
        $('#tabelku').on('click', '.btn-delete', function() {
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('#id_kinerja2').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

    });
</script>

<?= $this->endSection(); ?>