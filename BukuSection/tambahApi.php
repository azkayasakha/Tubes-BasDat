<?php
    include '../koneksi.php';
    function tambah_data($data, $files) {
        $isbn = $data['isbn'];
        $judul = $data['judul'];
        $penulis = $data['penulis'];
        $sinopsis = $data['sinopsis'];
        $penerbit = $data['penerbit'];
        $tanggal_terbit = $data['tanggal_terbit'];
        $jumlah_buku = $data['jumlah_buku'];
        $tersedia = $data['jumlah_buku'];

        $split = explode('.', $files['sampul']['name']);
        $ekstensi = $split[count($split) - 1];
        $sampul = $isbn.'.'.$ekstensi;

        $dir = "../Image/Sampul/";
        $tmpFile = $files['sampul']['tmp_name'];
        move_uploaded_file($tmpFile, $dir.$sampul);

        $query = "INSERT INTO tbl_buku VALUES ('$isbn', '$judul', '$penulis', '$sinopsis', '$penerbit', '$tanggal_terbit', '$sampul')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        $query = "INSERT INTO tbl_stok_buku VALUES ('$isbn', '$judul', '$penulis', '$sampul', '$jumlah_buku', '$tersedia')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    if ($_POST['aksi'] == "add") {
        $berhasil = tambah_data($_POST, $_FILES);
        if ($berhasil) {
            header("location: ../index.php");
        } else {
            echo $berhasil;
        }
    }
?>