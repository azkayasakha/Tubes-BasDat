<?php
    include '../koneksi.php';
    include '../loginKey.php';
    function tambah_data($data, $files) {
        $kode = $data['kode'];
        $kata_sandi = password_hash($data['kata_sandi'], PASSWORD_DEFAULT);
        $nama = $data['nama'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $alamat = $data['alamat'];
        $role = $data['role'];

        $split = explode('.', $files['foto']['name']);
        $ekstensi = $split[count($split) - 1];
        $foto = $kode.'.'.$ekstensi;

        $dir = "../Image/FotoPetugas/";
        $tmpFile = $files['foto']['tmp_name'];
        move_uploaded_file($tmpFile, $dir.$foto);

        $query = "INSERT INTO tbl_petugas VALUES ('$kode', '$kata_sandi', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$foto', '$role')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    if ($_POST['aksi'] == "add") {
        $berhasil = tambah_data($_POST, $_FILES);
        if ($berhasil) {
            header("location: ../index.php?login=$login");
        } else {
            echo $berhasil;
        }
    }
?>