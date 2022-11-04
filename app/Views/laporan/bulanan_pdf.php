<!DOCTYPE html>
<html>

<head>

    <title>Laporan Kerja Bulanan GKD</title>

    <link rel="stylesheet" type="text/css" href="bootstrap.min.css" rel="stylesheet">



    <style>

    </style>
</head>

<body>
    <h3 style="text-align:center">Laporan Bulanan PT GRAHA KARA DIGITAL</h3>
    <br>
    <table border="1" width="100%" style="text-align:center;">
        <thead>
            <tr>
                <th class=" text-center align-middle">No</th>
                <th class="text-center align-middle">Nama</th>
                <th class="text-center align-middle">Tanggal</th>
                <th class="text-center align-middle">Jam Mulai</th>
                <th class="text-center align-middle">Jam Selesai</th>
                <th class="text-center align-middle">Efektifitas Kerja</th>
                <th class="text-center align-middle">Pekerjaan</th>
                <th class="text-center align-middle" style="min-width:120px">Keterangan</th>
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



</body>

</html>