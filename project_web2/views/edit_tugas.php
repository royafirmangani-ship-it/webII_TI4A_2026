<?php
session_start();
require_once '../models/config.php';
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
if (!isset($_GET['id'])) {
    header("Location: admin_tugas.php");
    exit;
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM tugas WHERE id = '$id'");
$tgs = mysqli_fetch_assoc($result);

if (!$tgs) {
    echo "<script>alert('Data tugas tidak ditemukan!'); window.location='admin_tugas.php';</script>";
    exit;
}

if (isset($_POST['update'])) {
    $judul     = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $deadline  = mysqli_real_escape_string($conn, $_POST['deadline']);

    $query = "UPDATE tugas SET 
                judul = '$judul', 
                deskripsi = '$deskripsi', 
                deadline = '$deadline' 
              WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Tugas berhasil diperbarui!');
                window.location = 'admin_tugas.php';
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
    <title>Edit Tugas</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow mx-auto" style="max-width: 700px;">
            <div class="card-header bg-info text-white text-center">
                <h5 class="mb-0">Edit Detail Tugas</h5>
            </div>
            <div class="card-body p-4">
                <form action="" method="POST">
                    <div class="form-group mb-3">
                        <label class="fw-bold">Judul Tugas</label>
                        <input type="text" name="judul" class="form-control" value="<?= $tgs['judul']; ?>" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="fw-bold">Deadline</label>
                        <input type="date" name="deadline" class="form-control" value="<?= $tgs['deadline']; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="fw-bold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="5" required><?= $tgs['deskripsi']; ?></textarea>
                    </div>
                    
                    <div class="d-flex justify-content-between pt-3">
                        <a href="admin_tugas.php" class="btn btn-secondary">Batal</a>
                        <button type="submit" name="update" class="btn btn-info px-4 text-white">Update Tugas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>