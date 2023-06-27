<?php 
require 'functions.php';
$nim = $_GET["nim"];
$foto = $_GET["foto"];
        if (deleteMhs($nim, $foto) > 0) {
            echo "
                <script>
                    alert('Data berhasil dihapus')
                    document.location.href = '../index.php'
                </script>
                ";
        } else if (deleteMhs($nim, $foto) == -1) {
            echo "
                <script>
                    alert('Data gagal dihapus')
                    document.location.href = '../index.php'
                </script>
            ";
        }
