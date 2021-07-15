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

// var_dump($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Home-PENGADUAN MASYARAKAT</title>
</head>

<body>
    <div class="container">

        <!-- JUDUL APP -->
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="text-center">
                        APLIKASI PELAPORAN PENGADUAN MASYARAKAT
                    </h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="nav">
                    <a href="home.php" class="nav-link">home</a>
                    <a href="pengaduan.php" class="nav-link">pengaduan</a>
                    <a href="tanggpan.php" class="nav-link">tanggapan</a>
                    <a href="../../logout.php" class="nav-link">logout</a>
                </div>
                <h1>Selamat datang, <?= $_SESSION['nama']; ?> </h1>
                <ol>
                    <li>kedaftar pengaduan untuk melihat daftar pengaduan</li>
                </ol>
            </div>
        </div>
    </div>
</body>

</html>