<?php
    include '../koneksi.php';

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
            // $_SESSION['eksekusi'] = "Data Berhasil Dihapus!";
            header("location: ../index.php");
            echo $berhasil;
        } else {
            echo $berhasil;
        }
    }
?>