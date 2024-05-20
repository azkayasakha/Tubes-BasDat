<?php
include '../koneksi.php';
include '../loginKey.php';

function ubah_data($data) {
    $id_transaksi = $data['id_transaksi'];
    $nisn = $data['nisn'];
    $biaya = $data['biaya'];
    $keterangan = $data['keterangan'];

    $query = "UPDATE tbl_transaksi SET nisn = '$nisn', biaya = '$biaya', keterangan = '$keterangan' WHERE id_transaksi = '$id_transaksi';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

if ($_POST['aksi'] == "edit") {
    $berhasil = ubah_data($_POST);
    if ($berhasil) {
        header("location: ../index.php?login=$login");
    } else {
        echo $berhasil;
    }
}
?>