<?php 
    $conn = mysqli_connect("localhost", "root", "", "db_siakad");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambahMhs($data) {
        global $conn;
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama_lengkap"]);
        $jenKel = htmlspecialchars($data["jen_kel"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $noHp = htmlspecialchars($data["no_hp"]);
        $prodi = htmlspecialchars($data["prodi"]);
        $kelas = htmlspecialchars($data["kelas"]);
        
        $foto = upload();

        if(!$prodi || !$kelas || !$foto) {
            return -1;
            exit;
        }

        $query = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$jenKel', '$alamat', '$noHp', '$prodi', '$kelas', '$foto')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function tambahProdi($data) {
        global $conn;
        $kodeProdi = htmlspecialchars($data["kode_prodi"]);
        $namaProdi = htmlspecialchars($data["nama_prodi"]);

        $query = "INSERT INTO prodi VALUES ('$kodeProdi', '$namaProdi')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function upload(){
        $namaFile = $_FILES["foto"]["name"];
        $ukuranFile = $_FILES["foto"]["size"];
        $error = $_FILES["foto"]["error"];
        $tmpName = $_FILES["foto"]["tmp_name"];

        if ($error == 4) {
            echo "
                <script>
                    alert('Upload gambar terlebih dahulu')
                </script>
            ";
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "
                <script>
                    alert('Periksa ekstensi gambar anda')
                </script>
            ";
            return false;
        }

        if($ukuranFile > 256000) {
            echo "
                <script>
                    alert('Ukuran foto terlalu besar')
                </script>
            ";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, '../assets/img/mhs/'.$namaFileBaru);

        return $namaFileBaru;
    }

    function deleteMhs($nim, $foto) {
        global $conn;
        $target = '../assets/img/mhs/'.$foto;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = '$nim'");
        if (file_exists($target)) {
            unlink($target);
        }
        return mysqli_affected_rows($conn);
    }

    function deleteProdi($kode) {
        global $conn;
        mysqli_query($conn, "DELETE FROM prodi WHERE kode_prodi = '$kode'");
        return mysqli_affected_rows($conn);
    }

    function ubahMhs($data){
        global $conn;
        $nim = $data["nim"];
        $nama = htmlspecialchars($data["nama_lengkap"]);
        $jenKel = htmlspecialchars($data["jen_kel"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $noHp = htmlspecialchars($data["no_hp"]);
        $prodi = htmlspecialchars($data["prodi"]);
        $kelas = htmlspecialchars($data["kelas"]);
        $fotoLama = htmlspecialchars($data["fotoLama"]);

        if ($_FILES['foto']['error'] === 4) {
            $foto = $fotoLama;
        } else {
            $foto = upload();
        }

        if(!$prodi || !$kelas) {
            return -1;
            exit;
        }
        $query = "UPDATE mahasiswa SET
                    nama_lengkap = '$nama',
                    jen_kel = '$jenKel',
                    alamat = '$alamat',
                    no_hp = '$noHp',
                    kode_prodi = '$prodi',
                    kelas = '$kelas',
                    foto = '$foto'
                WHERE nim = $nim
        ";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function ubahProdi($data){
        global $conn;
        $kodeProdi = htmlspecialchars($data["kode_prodi"]);
        $namaProdi = htmlspecialchars($data["nama_prodi"]);

        $query = "UPDATE prodi SET nama_prodi = '$namaProdi' WHERE kode_prodi = '$kodeProdi'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function cari($keyword) {
        
        $query = "SELECT * FROM mahasiswa WHERE 
                    nim LIKE '%$keyword%' OR
                    nama_lengkap LIKE '%$keyword%'
        ";

        return query($query);
    }

    function cariProdi($keyword) {
    
        $query = "SELECT * FROM prodi WHERE 
                    kode_prodi LIKE '%$keyword%' OR
                    nama_prodi LIKE '%$keyword%'
        ";

        return query($query);
    }

