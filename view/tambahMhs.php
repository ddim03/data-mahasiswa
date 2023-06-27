<?php 
    require '../functions/functions.php';

    $prodi = query("SELECT * FROM prodi");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
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
            if (tambahMhs($_POST) > 0) {
                echo "
                <div class='alert alert-success mt-2' role='alert'>
                    <strong>Data berhasil ditambahkan</strong>
                </div>
                <script>
                    setTimeout(()=> {
                        document.location.href = '../index.php'
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
        <h3 class="mt-4 text-center">Tambah Data Mahasiswa</h3>
        <div class="container w-75 py-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nim" class="form-label">Nomor Induk Mahasiswa :</label>
                    <input type="text" class="form-control" id="nim" name="nim" required placeholder="Masukan NIM">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap :</label>
                    <input type="text" class="form-control" id="nim" name="nama_lengkap" required placeholder="Masukan Nama Lengkap">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Jenis Kelamin :</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jen_kel" id="laki-laki" value="Laki-Laki" required >
                        <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jen_kel" id="perempuan" value="Perempuan" required>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat :</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="Masukan Alamat">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP :</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required placeholder="Masukan Nomor HP">
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi :</label>
                    <select class="form-select" aria-label="Default select example" id="prodi" name="prodi" required>
                        <option selected disabled>Pilih salah satu</option>
                        <?php foreach($prodi as $pr) : ?>
                        <option value="<?= $pr['kode_prodi'] ?>"><?= $pr['nama_prodi'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas :</label>
                    <select class="form-select" aria-label="Default select example" id="kelas" name="kelas" required>
                        <option selected disabled>Pilih salah satu</option>
                        <option value="1-A">1-A</option>
                        <option value="1-B">1-B</option>
                        <option value="1-C">1-C</option>
                        <option value="1-D">1-D</option>
                        <option value="1-E">1-E</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Mahasiswa :</label>
                    <input class="form-control" type="file" id="foto" name="foto">
                </div>
                <div class="d-flex gap-2 justify-content-end pt-3">
                    <a href="../index.php" role="button" class="btn btn-secondary">Batal</a>
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