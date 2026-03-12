<?php
$conn = mysqli_connect("localhost", "root", "", "web2_tugas");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>