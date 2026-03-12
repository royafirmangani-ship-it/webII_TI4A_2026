<?php
session_start();
require_once '../models/config.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = $id");
$mhs = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) < 1) {
    header("Location: admin_mahasiswa.php");
    exit;
}

if (isset($_POST['update'])) {
    $nim   = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama  = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "UPDATE mahasiswa SET 
                nim = '$nim', 
                nama = '$nama', 
                email = '$email' 
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                window.location = 'admin_mahasiswa.php';
              </script>";
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Edit Mahasiswa</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow mx-auto" style="max-width: 600px;">
            <div class="card-header bg-warning text-dark text-center">
                <h5 class="mb-0">Edit Data Mahasiswa</h5>
            </div>
            <div class="card-body p-4">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">NIM</label>
                        <input type="text" name="nim" class="form-control" value="<?= $mhs['nim']; ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?= $mhs['nama']; ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="text" name="email" class="form-control" value="<?= $mhs['email']; ?>" required>
                    </div>
                    
                    <div class="d-flex justify-content-between pt-3">
                        <a href="admin_mahasiswa.php" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" name="update" class="btn btn-warning px-4">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>