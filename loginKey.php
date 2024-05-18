<?php
include 'koneksi.php';

$query = "SELECT * FROM tbl_login";
$sql = mysqli_query($conn, $query);
$login = mysqli_fetch_assoc($sql)['id'];
?>