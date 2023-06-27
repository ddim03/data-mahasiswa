<?php 
require 'functions.php';
$kode = $_GET["kode"];
        if (deleteProdi($kode) > 0) {
            echo "
                <script>
                    alert('Data berhasil dihapus')
                    document.location.href = '../view/prodi.php'
                </script>
                ";
        } else if (deleteProdi($kode) == -1) {
            echo "
                <script>
                    alert('Data Tidak Dapat dihapus, Terdapat mahasiswa yang mengambil Program Studi Ini')
                    document.location.href = '../view/prodi.php'
                </script>
            ";
        }