<?php
include '../koneksi.php';

function hapus($data)
{
    $id_peminjaman = $data['id_peminjaman'];

    $query = "SELECT * FROM tbl_peminjaman WHERE id_peminjaman = '$id_peminjaman';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    $result = mysqli_fetch_assoc($sql);
    
    $isbn_result = $result['isbn'];
    $nisn_result = $result['nisn'];
    $nama_result = $result['nama'];

    $tanggal_tenggat = strtotime($result['tanggal_tenggat']);
    $tanggal_hari_ini = strtotime(date("Y-m-d"));
    $selisih_hari = ceil(($tanggal_tenggat - $tanggal_hari_ini) / (60 * 60 * 24));
    if ($selisih_hari < 0) {
        $terlambat = $selisih_hari * -1;
        $denda = $terlambat * 1000;

        $tanggal = date("Y-m-d");
        $query = "INSERT INTO tbl_transaksi VALUES (null, '$id_peminjaman', '$nisn_result', '$nama_result', '$tanggal', '$denda', 'Keterlambatan')";
        $sql = mysqli_query($GLOBALS['conn'], $query);
    }

    $query = "SELECT tersedia FROM tbl_stok_buku WHERE isbn = '$isbn_result';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    $result = mysqli_fetch_assoc($sql);
    $tersedia = $result['tersedia'] + 1;

    $query = "UPDATE tbl_stok_buku SET tersedia = '$tersedia' WHERE isbn = '$isbn_result';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    $query = "DELETE FROM tbl_peminjaman WHERE id_peminjaman = '$id_peminjaman'";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

if (isset($_GET['id_peminjaman'])) {
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