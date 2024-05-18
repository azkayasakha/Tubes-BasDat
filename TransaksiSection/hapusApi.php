<?php
include '../koneksi.php';
include '../loginKey.php';

function hapus($data)
{
    $id = $data['id'];

    $query = "DELETE FROM tbl_transaksi WHERE id_transaksi = '$id'";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

if (isset($_GET['id'])) {
    $berhasil = hapus($_GET);
    if ($berhasil) {
        header("location: ../index.php?login=$login");
        echo $berhasil;
    } else {
        echo $berhasil;
    }
}
?>