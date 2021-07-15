<?php
// session_start();
include('koneksi.php');

if (isset($_POST['kirim'])) {

    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];

    $query = mysqli_query($conn, "INSERT INTO masyarakat(nik, nama, username, password, telp) VALUES
   ('$nik', '$nama', '$username', '$password', '$telp')");

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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Registrasi masyarakat</title>
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
                        REGISTRASI MASYARAKAT
                    </div>
                    <div class="card-body">

                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" placeholder="nik" name="nik" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="nama" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="username" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="telp" name="telp" class="form-control">
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