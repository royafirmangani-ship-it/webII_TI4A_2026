<?php
session_start();
require_once '../models/config.php';
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $judul   = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi  = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
    $cek_judul = mysqli_query($conn, "SELECT judul FROM tugas WHERE judul = '$judul'");
    
    if (mysqli_num_rows($cek_judul) > 0) {
        $error_msg = "Tugas sudah terdaftar dalam sistem!";
    } else {
        $query = "INSERT INTO tugas(judul, deskripsi, deadline) VALUES ('$judul', '$deskripsi', '$deadline')";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Data Tugas berhasil ditambahkan!');
                    window.location = 'admin_tugas.php';
                  </script>";
        } else {
            echo "Gagal menambah data: " . mysqli_error($conn);
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Tambah Tugas</title>
  </head>
  <body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow mx-auto" style="max-width: 600px;">
            <div class="card-header bg-dark text-white text-center">
                <h5 class="mb-0">Input Data TUgas Baru</h5>
            </div>
            <div class="card-body p-4">
                
                <?php if(isset($error_msg)) : ?>
                    <div class="alert alert-danger"><?= $error_msg; ?></div>
                <?php endif; ?>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan detail tugas di sini..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deadline</label>
                        <input type="date" name="deadlinne" class="form-control" placeholder="Masukkan Tenggat" required>
                    </div>
                    
                    <div class="d-flex justify-content-between pt-3">
                        <a href="admin_tugas.php" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" name="submit" class="btn btn-primary px-4">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  </body>
</html>