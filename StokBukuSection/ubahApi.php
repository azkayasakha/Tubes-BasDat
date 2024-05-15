<?php
include '../koneksi.php';
function ubah_data($data) {
    $isbn = $data['isbn'];
    $jumlah_buku = $data['jumlah_buku'];

    $query =  "SELECT COUNT(isbn) AS jumlah_isbn FROM tbl_peminjaman WHERE isbn = '$isbn';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    $jumlah_isbn = mysqli_fetch_assoc($sql)['jumlah_isbn'];

    $tersedia =  $jumlah_buku - $jumlah_isbn;

    $query = "UPDATE tbl_stok_buku SET jumlah_buku = '$jumlah_buku', tersedia = '$tersedia' WHERE isbn = '$isbn';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

if ($_POST['aksi'] == "edit") {
    $berhasil = ubah_data($_POST);
    if ($berhasil) {
        header("location: ../index.php");
    } else {
        echo $berhasil;
    }
}
?>