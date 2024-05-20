<?php
    include '../koneksi.php';
    include '../loginKey.php';

    function hapus($data) {
        $nisn = $data['nisn'];

        $queryShow = "SELECT * FROM tbl_siswa WHERE nisn = '$nisn'";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        unlink("../Image/FotoSiswa/".$result['foto']);

        $query = "DELETE FROM tbl_siswa WHERE nisn = '$nisn'";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }
    
    if (isset($_GET['nisn'])) {
        $berhasil = hapus($_GET);
        if ($berhasil) {
            header("location: ../index.php?login=$login");
        } else {
            echo $berhasil;
        }
    }
?>