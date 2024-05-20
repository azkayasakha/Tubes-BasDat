<?php
include '../koneksi.php';
include '../loginKey.php';

function ubah_data($data)
{
    $denda = $data['denda'];

    $query = "UPDATE tbl_pengaturan SET denda='$denda'";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

if ($_POST['aksi'] == "edit") {
    $berhasil = ubah_data($_POST);
    if ($berhasil) {
        header("Location: ../index.php?login=$login");
    } else {
        echo $berhasil;
    }
}
?>