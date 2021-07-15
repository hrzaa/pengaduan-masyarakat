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

if (isset($_POST['kirim'])) {
    $id_petugas = $_SESSION['id_petugas'];
    // var_dump($id_petugas);
    $id_pengaduan = $_GET['id'];
    $tanggal = date('Y-m-d');
    $tanggapan = $_POST['tanggapan'];

    $query = mysqli_query($conn, "INSERT INTO tanggapan(id_tanggapan, id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('', '$id_pengaduan', '$tanggal', '$tanggapan', '$id_petugas')");

    $update = mysqli_query($conn, "UPDATE pengaduan SET status='selesai' WHERE id_pengaduan = '$id_pengaduan'  ");
    if ($query && $update) {
        echo "<script>alert('Tanggapan berhasil dikirim');
        window.location.href='daftar_pengaduan.php'
        </script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Tanggapan Petugas</title>
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

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        KIRIM TANGGAPAN
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <textarea name="tanggapan" class="form-control" id="" cols="30" rows="10" placeholder="Tulis Tanggapan Disini...!" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type=" submit" name="kirim" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>