<?php
require '../functions/functions.php';

$jumlahDataPerhalaman = 6;
$jumlahData = count(query("SELECT * FROM prodi"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
$prodis = query("SELECT * FROM prodi LIMIT $awalData, $jumlahDataPerhalaman");

$next = $halamanAktif + 1;
$prev = $halamanAktif - 1;

if (isset($_POST["search"])) {
    $prodis = cariProdi($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
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
        <h3 class="my-4 text-center">Sistem Informasi Akademik</h3>
        <nav class="my-4">
            <ul class="nav nav-underline">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="prodi.php">Data Program Studi</a>
                </li>
            </ul>
        </nav>
        <main>
            <div class="d-flex justify-content-between align-items-center">
                <form class="d-flex border rounded w-50" action="" method="post" role="search">
                    <input class="form-control border-0" type="search" name="keyword" placeholder="Masukan nama prodi" autocomplete="off" autofocus />
                    <button class="btn d-flex justify-content-center align-items-center" type="submit" name="search">
                        <span class="material-symbols-outlined ">
                            search
                        </span>
                    </button>
                </form>
                <a class="btn btn-sm btn-success p-2" href="tambahProdi.php" role="button">Tambah Data</a>
            </div>
            <div class="container-fluid overflow-x-auto p-0">
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr class="text-center align-middle">
                            <th scope="col">No</th>
                            <th scope="col">Kode Program Studi</th>
                            <th scope="col">Nama Program Studi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($prodis as $prodi) : ?>
                            <tr class="align-middle">
                                <td class="text-center"><?= $i + $awalData ?></td>
                                <td class="text-center"><?= $prodi["kode_prodi"] ?></td>
                                <td><?= $prodi["nama_prodi"] ?></td>
                                <td>
                                    <div class="d-grid gap-2 d-sm-block text-center">
                                        <a href="ubahProdi.php?kode=<?= $prodi['kode_prodi'] ?>" class="btn btn-sm btn-warning mb-sm-2 mb-md-0" role="button">
                                            <span class="material-symbols-outlined text-light">
                                                edit_square
                                            </span>
                                        </a>
                                        <a href="../functions/deleteProdi.php?kode=<?= $prodi['kode_prodi'] ?>" class="btn btn-sm btn-danger" role="button" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                                            <span class="material-symbols-outlined">
                                                delete
                                            </span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </main>
        <nav aria-label="Page navigation example" class="mt-2">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?= ($halamanAktif > 1) ? "href='?halaman=$prev'" : '' ?>>Previous</a>
                </li>
                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                    <?php if ($i == $halamanAktif) : ?>
                        <li class="page-item active"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                    <?php endif ?>
                <?php endfor ?>
                <li class="page-item">
                    <a class="page-link" <?= ($halamanAktif < $jumlahHalaman) ? "href='?halaman=$next'" : '' ?>>Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <footer class="container-fluid bg-primary text-center text-lg-start position-fixed bottom-0 ">
        <div class="text-center p-2">
            <a class="text-light" href="#">siakad&copy;2023</a>
        </div>
    </footer>
</body>

</html>