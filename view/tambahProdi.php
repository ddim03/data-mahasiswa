<?php
require '../functions/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program Studi</title>
    <link rel="shortcut icon" href="../assets/img/icon/mhs.ico" type="image/x-icon">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container pb-5">
        <?php
        if (isset($_POST["submitData"])) {
            if (tambahProdi($_POST) > 0) {
                echo "
                <div class='alert alert-success mt-2' role='alert'>
                    <strong>Data berhasil ditambahkan</strong>
                </div>
                <script>
                    setTimeout(()=> {
                        document.location.href = 'prodi.php'
                    }, 1000)
                </script>
                ";
            } else {
                echo "
                <div class='alert alert-danger alert-dismissible fade show mt-2' role='alert'>
                <strong>Data gagal ditambahkan!</strong> Silahkan cek kembali data yang anda masukan
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
                ";
            }
        }
        ?>
        <h3 class="mt-4 text-center">Tambah Data Program Studi</h3>
        <div class="container w-75 py-4">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="kode_prodi" class="form-label">Kode Program Studi :</label>
                    <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" required placeholder="Masukan Kode Program Studi">
                </div>
                <div class="mb-3">
                    <label for="nama_prodi" class="form-label">Nama Program Studi :</label>
                    <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required placeholder="Masukan Nama Program Studi">
                </div>
                <div class="d-flex gap-2 justify-content-end pt-3">
                    <a href="prodi.php" role="button" class="btn btn-secondary">Batal</a>
                    <button type="submit" name="submitData" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <footer class="container-fluid bg-primary text-center text-lg-start position-fixed bottom-0 ">
        <div class="text-center p-2">
            <a class="text-light" href="#">siakad&copy;2023</a>
        </div>
    </footer>
</body>

</html>