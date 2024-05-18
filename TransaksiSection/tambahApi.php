<?php
    include '../koneksi.php';
    include '../loginKey.php';
    function tambah_data($data, $files) {
        $nisn = $data['nisn'];
        $biaya = $data['biaya'];
        $keterangan = $data['keterangan'];
        $tanggal = date("Y-m-d");

        $query = "INSERT INTO tbl_transaksi(nisn, tanggal, biaya, keterangan) VALUES ('$nisn', '$tanggal', '$biaya', '$keterangan')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    if ($_POST['aksi'] == "add") {
        $berhasil = tambah_data($_POST, $_FILES);
        if ($berhasil) {
            header("location: ../index.php?login=$login");
        } else {
            echo $berhasil;
        }
    }
?>