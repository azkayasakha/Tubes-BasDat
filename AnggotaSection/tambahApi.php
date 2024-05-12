<?php
    include '../koneksi.php';
    function tambah_data($data, $files) {
        $nisn = $data['nisn'];
        $nama_siswa = $data['nama_siswa'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $alamat = $data['alamat'];

        $split = explode('.', $files['foto']['name']);
        $ekstensi = $split[count($split) - 1];
        $foto = $nisn.'.'.$ekstensi;

        $dir = "../Image/FotoSiswa/";
        $tmpFile = $files['foto']['tmp_name'];
        move_uploaded_file($tmpFile, $dir.$foto);

        $query = "INSERT INTO tbl_siswa VALUES ('$nisn', '$nama_siswa', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$foto')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    if ($_POST['aksi'] == "add") {
        $berhasil = tambah_data($_POST, $_FILES);
        if ($berhasil) {
            header("location: ../index.php");
        } else {
            echo $berhasil;
        }
    }
?>