<?php
require_once '../models/config.php';

$tugas = mysqli_query($conn, "SELECT * FROM tugas");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Data Tugas</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
      <a class="navbar-brand" href="dashboard_admin.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="admin_mahasiswa.php">Mahasiswa</a>
      <a class="nav-link active" href="admin_tugas.php">Tugas Mahasiswa</a>
    </div>
  </div>
   <form class="form-inline">
    <a class="nav-link active text-white" >Admin</a>
    <a href="../login.php" class="btn btn-danger btn-sm link-opacity-75-hover">Logout</a>
  </form>
</nav>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Data Tugas Mahasiswa</h4>
        <a href="tambah_tugas.php" class="btn btn-primary btn-sm shadow-sm">
            <i class="bi bi-plus-lg"></i> Tambah Tugas
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php while($row = mysqli_fetch_assoc($tugas)) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row['judul']; ?></td>
                    <td><?= $row['deskripsi']; ?></td>
                    <td><?= $row['deadline']; ?></td>
                   <td>
                    <a href="edit_tugas.php?id=1" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus_tugas.php?id=1" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php $i++; ?>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  </body>
</html>