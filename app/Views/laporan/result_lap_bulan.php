<a href="/laporan/laporan_bulan_pdf/<?= $id_user_kin; ?>/<?= $bulan; ?>" target="_blank" class="btn waves-effect waves-light btn-info ml-4"><i class="fas fa-print"></i> Print/Eksport PDF</a>
<table id="tabelku" class="table table-bordered table-striped color-bordered-table danger-bordered-table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="text-center align-middle">No</th>
            <th class="text-center align-middle">Nama</th>
            <th class="text-center align-middle">Tanggal</th>
            <th class="text-center align-middle">Jam Mulai</th>
            <th class="text-center align-middle">Jam Selesai</th>
            <th class="text-center align-middle">Efektifitas Kerja</th>
            <th class="text-center align-middle">Pekerjaan</th>
            <th class="text-center align-middle" style="min-width:120px">Rincian dan Status Pekerjaan</th>
            <th class="text-center align-middle">terakhir update</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($kinerja == null) : ?>
            <tr>
                <td colspan="8" align="center">
                    <h3 class="text-danger" align="center">Data tidak ditemukan pada bulan yang di pilih, silahkan coba bulan lain .</h3>
                </td>
            </tr>
        <?php endif; ?>
        <?php $no = 1; ?>
        <?php foreach ($kinerja as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_user_kin']; ?></td>
                <td><?= longdate_indo($row['tgl_kin']); ?></td>
                <td><?= $row['jam_mulai']; ?></td>
                <td><?= $row['jam_selesai']; ?></td>
                <td><?= $row['waktu_kin']; ?></td>
                <td><?= $row['pekerjaan']; ?></td>
                <td style="width:30%"><?= $row['ket_kin']; ?></td>
                <td><?= date('d/m/Y H:i', strtotime($row['dibuat_kin'])); ?></td>

            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<?php $total_menit = 0; ?>
<?php $total_jam = 0; ?>
<?php foreach ($kinerja as $row) : ?>
    <?php
    $menit = substr($row['waktu_kin'], -2);
    $jam = substr($row['waktu_kin'], 0, -3);
    ?>
    <?php $total_menit += $menit; ?>
    <?php $total_jam += $jam; ?>
    <?php $sisa_jam = $total_menit / 60; ?>


<?php endforeach; ?>


<?php if ($id_user_kin != 0) : ?>
    <div class="alert alert-info alert-rounded">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        <h5 class="text-default"> <img src="<?= base_url('assets/images/profile/' . $user['foto_peserta']) ?>" width="30" class="img-circle" alt="img" class="mr-5"> Efektifitas kerja <span class="font-weight-bold"><?= $user['nama_peserta']; ?></span> pada <span class="font-weight-bold"><?= bulan($bulan); ?></span> adalah <span class="font-weight-bold"><?= $total_jam . " Jam:" . $total_menit . " Menit"; ?></span></h5>

    </div>
<?php endif; ?>
<script>
    $('#tabelku').DataTable({
        responsive: true
    });
</script>