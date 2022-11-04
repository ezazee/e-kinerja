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
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            <h3 class="text-info"><i class="fa fa-exclamation-circle"></i> Informasi !</h3> Saat melakukan penambahan data member , akan dibuat otomatis akun untuk login aplikasi . <br>
            secara default untuk login menggunakan username "email" dan password default "qwerty123".
        </div>
        <div class="row">
            <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('success'); ?>"></div>
            <div class="flashdata_gagal" data-flashdata_gagal="<?php echo session()->getFlashdata('gagal'); ?>"></div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><a href="/master/karyawan" class="btn waves-effect waves-light btn-dark"><i class="fas fa-arrow-circle-left"></i> Kembali</a> &nbsp;<br><br><?= $judul; ?></h4>
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="card-body">
                                    <?= form_open('master/tambahKar', 'class="mt-4"'); ?>
                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="col-md-12 text-info">Nama</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Agung Sidik Muhamad" class="form-control form-control-line <?= ($validation->hasError('nama_pes')) ? 'is-invalid' : ''; ?>" name="nama_pes" autocomplete="off" required value="<?= old('nama_pes'); ?>" />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama_pes'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="example-email" class="col-md-12 text-info">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" placeholder="agungksidik@gmail.com" class="form-control form-control-line <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="example-email" name="email" autocomplete="off" required value="<?= old('email'); ?>" />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('email'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="col-md-12 text-info">No Handphone</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="085156780115" class="form-control form-control-line <?= ($validation->hasError('hp_pes')) ? 'is-invalid' : ''; ?>" name="hp_pes" autocomplete="off" />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('hp_pes'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="col-md-12 text-info">No KTP</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="16 digit" class="form-control form-control-line <?= ($validation->hasError('no_ktp')) ? 'is-invalid' : ''; ?>" name="no_ktp" autocomplete="off" />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('no_ktp'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="col-md-12 text-info">No Induk Pegawai</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="No Induk Pegawai" class="form-control form-control-line <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" name="nip" autocomplete="off" />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nip'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="col-md-12 text-info">No Kontrak Kerja</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="No Kontrak Kerja" class="form-control form-control-line <?= ($validation->hasError('no_kontrak')) ? 'is-invalid' : ''; ?>" name="no_kontrak" autocomplete="off" />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('no_kontrak'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="col-md-12 text-info">No BPJSTKU</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="11 digit" class="form-control form-control-line <?= ($validation->hasError('no_bpjstku')) ? 'is-invalid' : ''; ?>" name="no_bpjstku" autocomplete="off" />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('no_bpjstku'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="col-md-12 text-info">No Rekening</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="No Rekening" class="form-control form-control-line <?= ($validation->hasError('no_rek')) ? 'is-invalid' : ''; ?>" name="no_rek" autocomplete="off" />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('no_rek'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="col-md-12 text-info">Departemen</label>
                                            <div class="col-md-12">
                                                <select class="dept form-control custom-select" name="dept" id="dept" style="width: 100%; height:36px;">
                                                    <option value=""></option>
                                                    <?php foreach ($dept as $d) : ?>
                                                        <option value="<?= $d['id_dept']; ?>"><?= $d['nama_dept']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group  col-md-4 col-sm-12">
                                            <label class="col-md-12 text-info">Jabatan</label>
                                            <div class="col-md-12">
                                                <select class="jabatan form-control custom-select" name="jabatan" id="jabatan" style="width: 100%; height:36px;">
                                                    <option value=""></option>
                                                    <?php foreach ($jabatan as $d) : ?>
                                                        <option value="<?= $d['id_jabatan']; ?>"><?= $d['nama_jabatan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="col-md-12 text-info">Level Akses Aplikasi</label>
                                            <div class="col-md-12">
                                                <select class="dept form-control custom-select" name="akses" id="akses" style="width: 100%; height:36px;" required>
                                                    <option value=""></option>
                                                    <?php foreach ($akses as $d) : ?>
                                                        <option value="<?= $d['id_akses']; ?>"><?= $d['nama_akses']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="col-md-12 text-info">Tanggal masuk</label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control mydatepicker" data-date-format='dd/mm/yyyy' name="tgl_masuk" id="tgl_masuk" placeholder="dd/mm/yyyy" autocomplete="off" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="col-md-12 text-info">Alamat</label>
                                            <div class="col-md-12">
                                                <textarea rows="5" class="form-control form-control-line" name="alamat_pes" autocomplete="off" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="hidden" class="form-control" value="<?= $user['id_peserta']; ?>" name="id_buat" id="id_buat">
                                            <button type="submit" class="btn btn-success">
                                                Tambah
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

<script>
    $("#dept").select2({
        placeholder: 'Pilih Departemen',
        orientation: 'bottom',
    });
    $(".jabatan").select2({
        placeholder: 'Pilih Jabatan',
        orientation: 'bottom',
    });

    $("#akses").select2({
        placeholder: 'Pilih Level Akses',
        orientation: 'bottom',
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