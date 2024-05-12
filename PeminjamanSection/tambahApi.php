<?php
    include '../koneksi.php';
    function tambah_data($data) {
        $isbn = $data['isbn'];
        $judul = $data['judul'];
        $nisn = $data['nisn'];
        $nama = $data['nama'];

        $tanggal_pinjam = date("Y-m-d");
        $tanggal_pinjam_unix = strtotime($tanggal_pinjam);
        $tanggal_tenggat_unix = strtotime("+7 day", $tanggal_pinjam_unix);
        $tanggal_tenggat = date("Y-m-d", $tanggal_tenggat_unix);

        $query = "INSERT INTO tbl_peminjaman VALUES (null, '$isbn', '$judul', '$nisn', '$nama', '$tanggal_pinjam', '$tanggal_tenggat', 'keluar')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        $query = "SELECT tersedia FROM tbl_stok_buku WHERE isbn = '$isbn';";
        $sql = mysqli_query($GLOBALS['conn'], $query);
        $result = mysqli_fetch_assoc($sql);
        $tersedia =  $result['tersedia'] - 1;

        $query = "UPDATE tbl_stok_buku SET tersedia = '$tersedia' WHERE isbn = '$isbn';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    if ($_POST['aksi'] == "add") {
        $berhasil = tambah_data($_POST);
        if ($berhasil) {
            header("location: ../index.php");
        } else {
            echo $berhasil;
        }
    }
?>