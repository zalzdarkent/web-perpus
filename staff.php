<?php
include_once('config.php');

$query = mysqli_query($koneksi, "SELECT * FROM staff");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <div class="container w-75">
        <h1 class="my-4">Daftar Staff</h1>

        <a class="btn btn-secondary" href="index.php">Kembali</a>
        <a class="btn btn-success mb-4" style="float: right;" href="tambah_staff.php">Tambah Staff</a>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>ISBN</td>
                    <td>Unit</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($view = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $view['nama']; ?></td>
                        <td><?php echo $view['telp']; ?></td>
                        <td><?php echo $view['email']; ?></td>
                        <td>
                            <a href=<?php echo "edit_staff.php?id=" . $view['id'] ?>><button class="btn btn-primary">Edit</button></a>
                            <a onclick="return validateForm(<?php echo $view['id']; ?>)" href="#"><button class="btn btn-danger">Hapus</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        function validateForm(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus data ini?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = 'hapus_staff.php?id=' + id;
                }
            });
            return false;
        }
    </script>
</body>

</html>