<?php 
session_start();
require_once 'models/config.php'; 

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password_input = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($password_input, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role']; 
            header("Location: views/dashboard_admin.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card shadow p-4" style="width: 400px;">
        <h3 class="text-center mb-4">Login User</h3>
        <?php if(isset($error)) echo "<p class='text-danger text-center'>Username/Password Salah!</p>"; ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3 text-center">Belum punya akun? <a href="register.php">Buat di sini</a></p>
    </div>
</body>
</html>