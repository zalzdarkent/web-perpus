<?php
include('config.php');

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM buku WHERE id = '$id'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus'); window.location='buku.php';</script>";
}
?>