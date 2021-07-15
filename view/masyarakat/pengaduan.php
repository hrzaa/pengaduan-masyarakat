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


if (isset($_POST['kirim'])) {
    $tanggal = date('Y-m-d');
    $nik = $_SESSION['nik'];
    $isi = $_POST['isi'];
    $status = '0';
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "../../assets/img/";
    move_uploaded_file($tmp, $folder . $foto);

    $query = mysqli_query($conn, "INSERT INTO pengaduan (id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, status) VALUES('', '$tanggal', '$nik', '$isi', '$foto', '$status')");

    if ($query) {
        echo "<script>alert('Registrasi berhasil');
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
                <div class="card">
                    <div class="card-header">
                        KIRIM PENGADUAN
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <textarea name="isi" class="form-control" id="" cols="30" rows="10" placeholder="Tulis laporan Disini...!"></textarea>
                            <div class="form-group">
                                <input type="file" name="foto" accept="image/*" class="form-control"" required >
                            </div>
                            <button type=" submit" name="kirim" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>