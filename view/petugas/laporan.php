<?php

session_start();
include('../../koneksi.php');
if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href='../../index.php'</script>";
    # code...
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Laporan Pengaduan</title>
    <style>
        /* @media print {
            a {
                display: none;
            }
        } */
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><?= date('l, j F Y h:i:s A') ?></p>
                <h1 class="text-center">LAPORAN PENGADUAN</h1>

                <!-- <button onclick="window.print()">print</button> -->

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>nama pelapor</th>
                            <th>nama petugas</th>
                            <th>tanggal pengaduaan</th>
                            <th>tanggal tanggapan</th>
                            <th>isi pengaduan</th>
                            <th>isi tanggapan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = mysqli_query($conn, "SELECT * FROM masyarakat INNER JOIN pengaduan ON masyarakat.nik = pengaduan.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas");

                        while ($row = mysqli_fetch_array($query)) {

                        ?>
                            <tr>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nama_petugas']; ?></td>
                                <td><?= $row['tgl_pengaduan']; ?></td>
                                <td><?= $row['tgl_tanggapan']; ?></td>
                                <td><?= $row['isi_laporan']; ?></td>
                                <td><?= $row['tanggapan']; ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>

</body>

</html>