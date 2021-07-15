<?php
session_start();
include('../../koneksi.php');

if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href='../../index.php'</script>";
    # code...
}
if (($_SESSION['level']) !== 'masyarakat') {
    echo "<script>
   window.location.href='../../logout.php'
   </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Pengaduan masyarakat</title>
</head>

<body>
    <div class="container">
        <!-- JUDUL APP -->
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="text-center">
                        APLIKASI PENGADUAN MASYARAKAT
                    </h1>
                </div>
            </div>
        </div>

        <!-- NAVIGASI MENU -->
        <div class="row">
            <div class="col">
                <nav class="nav">
                    <a href="home.php" class="nav-link">home</a>
                    <a href="pengaduan.php" class="nav-link">Pengaduan</a>
                    <a href="tanggapan.php" class="nav-link">Tangapan</a>
                    <a href="../../logout.php" class="nav-link">Keluar</a>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>id pengaduan</th>
                            <th>tanggal pengaduan</th>
                            <th>nik</th>
                            <th>isi laporan</th>
                            <th>foto</th>
                            <th>status</th>
                            <th>tanggapan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = mysqli_query($conn, "SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?= $row['id_pengaduan']; ?></td>
                                <td><?= $row['tgl_pengaduan']; ?></td>
                                <td><?= $row['nik']; ?></td>
                                <td><?= $row['isi_laporan']; ?></td>
                                <td><img src="../../assets/img/<?= $row['foto']; ?>" width="200"></td>
                                <td><?= $row['status']; ?></td>
                                <td><button onclick="window.location.href='detail.php?id=<?= $row['id_pengaduan']; ?>'" type="submit" name="detail" class="btn btn-primary">detail</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>