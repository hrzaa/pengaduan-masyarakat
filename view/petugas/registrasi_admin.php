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

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    $query = mysqli_query($conn, "INSERT INTO petugas(id_petugas, nama_petugas, username, password, telp, level) VALUES
   ('', '$nama', '$username', '$password', '$telp', '$level')");

    if ($query) {
        echo "<script>alert('Registrasi berhasil');
            window.location.href='index.php'
            </script>";
    } else {
        echo "<script>alert('Registrasi gagal');
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
    <title>Registrasi masyarakat</title>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center">APLIKASI PENGADUAN MASYARAKAT</h1>
        </div>

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

        <!-- <button type="submit" onclick="window.location.href='home.php'" class="btn btn-primary">kembali</button> -->
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                        REGISTRASI PETUGAS
                    </div>
                    <div class="card-body">

                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" placeholder="nama petugas" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="username" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="telp" name="telp" class="form-control">
                            </div>
                            <div class="form-group">
                                <select name="level" id="" class="form-control">
                                    <option value="admin">admin</option>
                                    <option value="petugas">petugas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="kirim" class="btn btn-primary">kirim</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>