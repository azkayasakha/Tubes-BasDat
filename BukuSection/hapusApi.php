<?php
    include '../koneksi.php';
    include '../loginKey.php';

    function hapus($data) {
        $isbn = $data['isbn'];

        $queryShow = "SELECT * FROM tbl_buku WHERE isbn = '$isbn'";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        unlink("../Image/Sampul/".$result['sampul']);

        $query = "DELETE FROM tbl_buku WHERE isbn = '$isbn'";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        $query = "DELETE FROM tbl_stok_buku WHERE isbn = '$isbn'";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }
    
    if (isset($_GET['isbn'])) {
        $berhasil = hapus($_GET);
        if ($berhasil) {
            // $_SESSION['eksekusi'] = "Data Berhasil Dihapus!";
            header("location: ../index.php?login=$login");
            echo $berhasil;
        } else {
            echo $berhasil;
        }
    }
?>