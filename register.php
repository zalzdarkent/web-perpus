<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cekEmail = "SELECT email FROM user WHERE email = '$email'";
    $hasil = mysqli_query($koneksi, $cekEmail);
    if (mysqli_num_rows($hasil) > 0) {
        echo "<script>alert('Email sudah terdaftar'); window.location='register.php';</script>";
    } else {
        $query = "INSERT INTO user (email, password) VALUES ('$email', '$password')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Registrasi berhasil'); window.location='login.php';</script>";
            exit;
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        .card {
            margin-top: 10%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .form-control,
        .btn {
            border-radius: 10px;
        }

        .input-group-text {
            border-radius: 10px 0 0 10px;
        }

        body {
            background-color: #f8f9fa;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 400px;">
            <h1 class="card-title text-center my-4">Register</h1>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center"> 
                        <button type="submit" class="btn btn-primary w-50 mt-4">Daftar</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="login.php">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>