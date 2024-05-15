<?php
    include '../koneksi.php';
    function ubah_data($data, $files) {
        $kode = $data['kode'];
        $nama = $data['nama'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $alamat = $data['alamat'];
        $role = $data['role'];

        $query = "SELECT * FROM tbl_petugas WHERE kode = '$kode'";
        $sql = mysqli_query($GLOBALS['conn'], $query);
        $result = mysqli_fetch_assoc($sql);

        if ($data['password' == ""]) {
            $kata_sandi = $result['kata_sandi'];
        } else {
            $kata_sandi = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        if ($files['foto']['name'] == "") {
            $foto = $result['foto'];
        } else {
            $split = explode('.', $files['foto']['name']);
            $ekstensi = $split[count($split)-1];
            $foto = $result['kode'].'.'.$ekstensi;
            unlink("../Image/FotoPetugas/".$result['foto']);
            move_uploaded_file($files['foto']['tmp_name'], '../Image/FotoPetugas/'.$foto);
        }
        $query = "UPDATE tbl_petugas SET kode='$kode', kata_sandi='$kata_sandi', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto='$foto', role='$role' WHERE kode='$kode'";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    if ($_POST['aksi'] == "edit") {
        $berhasil = ubah_data($_POST, $_FILES);
        if ($berhasil) {
            header("location: ../index.php");
        } else {
            echo $berhasil;
        }
    }
?>