<?php
session_start();
include('../../koneksi.php');

if (isset($_POST['login'])) {
    $query = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "' ");

    $numRows = mysqli_num_rows($query);
    if ($numRows == 1) {
        $sesi = mysqli_fetch_assoc($query);

        $_SESSION['login'] = true;
        $_SESSION['id_petugas'] = $sesi['id_petugas'];
        $_SESSION['nama'] = $sesi['nama_petugas'];
        $_SESSION['telp'] = $sesi['telp'];
        $_SESSION['level'] = $sesi['level'];

        echo "<script>alert('Login berhasil');
        window.location.href='home.php'
        </script>";
    } else {
        echo "<script>alert('Login gagal');
        window.location.href='index.php'
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
    <title>APLIKASI PENGADUAN MASYARAKAT</title>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center">APLIKASI PENGADUAN MASYARAKAT</h1>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                        LOGIN PETUGAS
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" placeholder="username" name="username" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="password" name="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">login</button> <br>
                            <a href="registrasi_admin.php">belum, punya akun? daftar disini</a> <br>
                            <a href="view/masyarakat/index.php">login sebagai masyarakat</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>