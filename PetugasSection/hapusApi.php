<?php
    include '../koneksi.php';
    include '../loginKey.php';

    function hapus($data) {
        $kode = $data['kode'];

        $queryShow = "SELECT * FROM tbl_petugas WHERE kode = '$kode'";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        unlink("../Image/FotoPetugas/".$result['foto']);

        $query = "DELETE FROM tbl_petugas WHERE kode = '$kode'";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }
    
    if (isset($_GET['kode'])) {
        $berhasil = hapus($_GET);
        if ($berhasil) {
            header("location: ../index.php?login=$login");
            echo $berhasil;
        } else {
            echo $berhasil;
        }
    }
?>