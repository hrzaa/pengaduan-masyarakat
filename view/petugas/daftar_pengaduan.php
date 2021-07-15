<?php

session_start();
include('../../koneksi.php');

if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href='index.php'</script>";
    # code...
}
if (($_SESSION['level']) !== 'admin') {
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
    <title>Admin-Pengaduan masyarakat</title>
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
        <?php if ($_SESSION['level'] == 'admin') { ?>
            <div class="nav">
                <a href="home.php" class="nav-link">home</a>
                <a href="daftar_pengaduan.php" class="nav-link">daftar pengaduan</a>
                <a href="registrasi_admin.php" class="nav-link">registrasi admin</a>
                <a href="laporan.php" class="nav-link">laporan</a>
                <a href="../../logout.php" class="nav-link">logout</a>
            </div>

        <?php } else { ?>
            <div class="nav">
                <a href="home.php" class="nav-link">home</a>
                <a href="daftar_pengaduan" class="nav-link">daftar pengaduan</a>
                <a href="../../logout.php" class="nav-link">logout</a>
            </div>
        <?php }  ?>

        <h1 class="text-center">Laporan Pengaduan</h1>
        <button type="submit" onclick="window.location.href='home.php'" class="btn btn-primary">kembali</button>
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>nama pelapor</th>
                            <th>tanggal pengaduan</th>
                            <th>isi laporan</th>
                            <th>foto</th>
                            <th>status</th>
                            <th>verifikasi</th>
                            <th>tanggapi</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['tgl_pengaduan']; ?></td>
                                <td><?= $row['isi_laporan']; ?></td>
                                <td><img src="../../assets/img/<?= $row['foto']; ?>" width="200"></td>
                                <td><?= $row['status']; ?></td>
                                <td><button onclick="window.location.href='verifikasi.php?id=<?= $row['id_pengaduan']; ?>'" type="submit" class="btn btn-success" name="terima">terima</button></td>

                                <td><button onclick="window.location.href='tanggapan_petugas.php?id=<?= $row['id_pengaduan']; ?>'" type="submit" class="btn btn-warning">tanggapi</button></td>
                                <td><button onclick="window.location.href='hapus_pengaduan.php?id=<?= $row['id_pengaduan']; ?>' " type="submit" class="btn btn-danger">hapus</button></td>
                            </tr>
                        <?php    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>