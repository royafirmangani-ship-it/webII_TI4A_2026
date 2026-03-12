<?php
session_start();
require_once '../models/config.php';

// 1. Periksa apakah user sudah login
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit; // Wajib ada exit setelah header
}

// 2. Periksa apakah ada ID di URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // 3. Proses hapus
    $query = "DELETE FROM tugas WHERE id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Berhasil! Tugas sudah dihapus.');
                window.location = 'admin_tugas.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus: " . mysqli_error($conn) . "');
                window.location = 'admin_tugas.php';
              </script>";
    }
} else {
    // 4. Jika tidak ada ID, kembalikan ke daftar tugas
    header("Location: admin_tugas.php");
    exit;
}
?>