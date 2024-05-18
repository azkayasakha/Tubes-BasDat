<?php
include '../koneksi.php';
include '../loginKey.php';
function ubah_data($data, $files) {
    $isbn = $data['isbn'];
    $judul = $data['judul'];
    $penulis = $data['penulis'];
    $sinopsis = $data['sinopsis'];
    $penerbit = $data['penerbit'];
    $tanggal_terbit = $data['tanggal_terbit'];

    $queryShow = "SELECT * FROM tbl_buku WHERE isbn = '$isbn'";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if ($files['sampul']['name'] == "") {
        $sampul = $result['sampul'];
    } else {
        $split = explode('.', $files['sampul']['name']);
        $ekstensi = $split[count($split) - 1];
        $sampul = $result['isbn'] . '.' . $ekstensi;
        unlink("../Image/Sampul/" . $result['sampul']);
        move_uploaded_file($files['sampul']['tmp_name'], '../Image/Sampul/' . $sampul);
    }
    $query = "UPDATE tbl_buku SET isbn = '$isbn', judul = '$judul', penulis = '$penulis', sinopsis = '$sinopsis', penerbit = '$penerbit', tanggal_terbit = '$tanggal_terbit', sampul = '$sampul' WHERE isbn = '$isbn'";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

if ($_POST['aksi'] == "edit") {
    $berhasil = ubah_data($_POST, $_FILES);
    if ($berhasil) {
        header("location: ../index.php?login=$login");
    } else {
        echo $berhasil;
    }
}

?>