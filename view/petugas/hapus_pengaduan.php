<?php
session_start();
include('../../koneksi.php');

$id_pengaduan = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan' ");

if ($query) {
    echo "<script>alert('Pengaduan dihapus');
    window.location.href='daftar_pengaduan.php'
    </script>";
    # code...
}
