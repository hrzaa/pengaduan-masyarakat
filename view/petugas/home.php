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
    <title>Home-admin</title>
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

        <div class="row">
            <div class="col">
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
                        <a href="daftar_pengaduan.php" class="nav-link">daftar pengaduan</a>
                        <a href="../../logout.php" class="nav-link">logout</a>
                    </div>
                <?php }  ?>
                <h1>Selamat datang, <?= $_SESSION['nama']; ?></h1>
            </div>
        </div>
    </div>
</body>

</html>