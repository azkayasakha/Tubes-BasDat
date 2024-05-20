<?php
include 'koneksi.php';

$query = "SELECT * FROM tbl_login";
$sql = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($sql);
$login = $result['id'];
$loginKode = $result['kode'];
?>