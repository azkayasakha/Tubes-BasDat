<?php
    include '../koneksi.php';
    function ubah_data($data, $files) {
        $nisn = $data['nisn'];
        $nama_siswa = $data['nama_siswa'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $alamat = $data['alamat'];

        $queryShow = "SELECT * FROM tbl_siswa WHERE nisn = '$nisn'";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        if ($files['foto']['name'] == "") {
            $foto = $result['foto'];
        } else {
            $split = explode('.', $files['foto']['name']);
            $ekstensi = $split[count($split)-1];
            $foto = $result['nisn'].'.'.$ekstensi;
            unlink("../Image/FotoSiswa/".$result['foto']);
            move_uploaded_file($files['foto']['tmp_name'], '../Image/FotoSiswa/'.$foto);
        }
        $query = "UPDATE tbl_siswa SET nisn='$nisn', nama='$nama_siswa', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto='$foto' WHERE nisn='$nisn'";
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