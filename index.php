<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Aplikasi Perpustakaan</title>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Aplikasi Perpustakaan</h1>

        <a class="btn btn-primary" href="buku.php">Lihat daftar buku</a>
        <a class="btn btn-success" href="staff.php">Lihat daftar staff</a>
        <form action="logout.php" class="my-3" onclick="return validateForm()">
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function validateForm() {
            Swal.fire({
                title: 'Yakin ingin logout',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'No Doubt!',
                cancelButtonText: 'Wait'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = 'logout.php';
                }
            });
            return false;
        }
    </script>
</body>

</html>