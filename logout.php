<?php
session_start();
session_destroy();
echo "<script>alert('logout berhasil');
window.location.href='index.php';
</script>";
