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


$id_pengaduan = $_GET['id'];
$update = mysqli_query($conn, "UPDATE pengaduan SET status='proses' WHERE id_pengaduan = $id_pengaduan");

if ($update) {
    echo "<script>alert('Tanggapan diterima');
        window.location.href='daftar_pengaduan.php'
        </script>";
    # code...
}
