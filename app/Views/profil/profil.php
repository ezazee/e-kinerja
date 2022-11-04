<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Profile</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30">
                            <img src="<?= base_url('assets/images/profile/' . $user['foto_peserta']) ?>" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10"><?= $user['nama_peserta']; ?></h4>
                            <h6 class="card-subtitle"></h6>
                            <br>
                            <a href="/profil/ganti_password" class="btn btn-danger">
                                Ganti Password
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
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('success'); ?>"></div>
                    <div class="flashdata_gagal" data-flashdata_gagal="<?php echo session()->getFlashdata('gagal'); ?>"></div>
                    <div class="card-body">
                        <h4 class="card-title">Update Profile</h4>
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="card-body">
                                    <?= form_open_multipart(base_url('profil/update_profile'), 'id="msform" class="form-horizontal"'); ?>
                                    <div class="alert alert-info">Perhatikan maksimal file gambar yang di upload adalah 1024Kb/ 1MB .</div>
                                    <?php if ($validation->getError('foto')) : ?>
                                        <div class="alert alert-danger">Upload gagal ! <?= $validation->getError('foto'); ?> </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <label class="col-md-12">Foto</label>
                                        <div class="col-md-12">
                                            <input type="file" id="input-file-now-custom-1" class="dropify <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" data-default-file="<?= base_url('assets/images/profile/' . $user['foto_peserta']) ?>" name="foto" />
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('foto'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Nama</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Johnathan Doe" value="<?= $user['nama_peserta']; ?>" class="form-control form-control-line <?= ($validation->hasError('nama_pes')) ? 'is-invalid' : ''; ?>" name="nama_pes" />
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_pes'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= $user['email_peserta']; ?>" id="example-email" name="email" />
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="123 456 7890" value="<?= $user['no_hp_peserta']; ?>" class="form-control form-control-line <?= ($validation->hasError('hp_pes')) ? 'is-invalid' : ''; ?>" name="hp_pes" />
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('hp_pes'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Alamat</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" value="<?= $user['alamat_peserta']; ?>" class="form-control form-control-line" name="alamat_pes"><?= $user['alamat_peserta']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="hidden" class="form-control" name="id_peserta" value="<?= $user['id_peserta']; ?>" id="id_peserta">
                                            <button type="submit" class="btn btn-success">
                                                Update Profile
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
        </div>
    </div>
</div>

<?= $this->include('layout/footer'); ?>
<script src="/assets/node_modules/dropify/dist/js/dropify.min.js"></script>

<script>
    $(document).ready(function() {
        $('.dropify').dropify();
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