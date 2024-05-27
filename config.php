<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan');

if ($koneksi->connect_error) {
    die("Koneksi gagal". $koneksi->connect_error);
} 
?>