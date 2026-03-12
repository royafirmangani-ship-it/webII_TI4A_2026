<?php
session_start();
require_once '../models/config.php';

 if (!isset($_SESSION['login'])) 
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "DELETE FROM mahasiswa WHERE id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Berhasil! ID " . $id . " sudah dihapus.');
                window.location = 'admin_mahasiswa.php';
              </script>";
    } else {
        echo "Error Database: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak terbaca dari URL. Pastikan link di tabel benar.";
}
?>