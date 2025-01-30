<?php
    session_start();

    if (isset($_COOKIE['remember'])) {
        if($_COOKIE['remember'] == 'true') {
            $_SESSION['login'] = true;
        }
    }

    if (isset($_SESSION['login'])) {
        if ($_SESSION['login'] == true) {
            header("Location: mahasiswa.php");
            exit;
        }
    }

    $email = 'rizaldysopyan@gmail.com';
    $password = 'rizaldy123';

    if (isset($_POST['email']) && isset($_POST['password'])) {
        if ($_POST['email'] != $email) {
            echo "<div class='alert alert-danger text-center'>Email tidak terdaftar</div>";
            exit;
        }
        if ($_POST['password'] != $password) {
            echo "<div class='alert alert-danger text-center'>Password salah</div>";
            exit;
        }
        if ($_POST['email'] == $email && $_POST['password'] == $password) {
            if (isset($_POST['remember'])) {
                setcookie('remember', 'true', time() + 20);
            }

            $_SESSION['login'] = true;
            header("Location: mahasiswa.php");
            exit;    
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
        }
        .form-label {
            font-size: 14px;
        }
        .form-control {
            font-size: 14px;
            padding: 12px;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 bg-light w-100" style="max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
