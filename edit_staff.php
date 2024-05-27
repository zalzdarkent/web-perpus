<?php
include('config.php');

$id = $_GET['id'];

$ambil_data = mysqli_query($koneksi, "SELECT * FROM staff WHERE id = '$id'");
$staff = mysqli_fetch_array($ambil_data);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_staff = $_POST['nama'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];

    $query = "UPDATE staff SET nama='$nama_staff', telp='$telp', email='$email' WHERE id=$id";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diubah'); window.location='staff.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Staff</title>
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            margin-top: 10%;
        }
        .form-control, .btn {
            border-radius: 10px;
        }
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 400px;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="card w-100">
            <div class="card-body">
                <h1 class="card-title text-center my-4">Edit Staff</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="namaBuku" class="form-label">Nama Staff</label>
                        <input type="text" name="nama" value="<?php echo $staff['nama'];?>" class="form-control" id="namaBuku" required>
                    </div>
                    <div class="mb-3">
                        <label for="isbnBuku" class="form-label">Telepon</label>
                        <input type="number" name="telp" value="<?php echo $staff['telp'];?>" class="form-control" id="isbnBuku" required>
                    </div>
                    <div class="mb-3">
                        <label for="unitBuku" class="form-label">Email</label>
                        <input type="email" name="email" value="<?php echo $staff['email'];?>" class="form-control" id="unitBuku" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlCOmZbsk7QH2piU9dFQ9hKJ/6Q8lNfiJ043z1pMRxW5crvRj6ZnM9Hcgy0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGktK2zY2m7e3dMyz59b6xr61k5QJ6g9Vf5VVOjH5zqGF6D6Evo60Q8Q7Fz" crossorigin="anonymous"></script>
</body>

</html>