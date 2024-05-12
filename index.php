<?php
include 'koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />
    <title>ePerpus</title>
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-4 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><span class="bg-white text-primary rounded shadow px-2 me-2"><i
                            class="fa-solid fa-book-open-reader"></i></span> <span class="text-white">ePerpus</span>
                </h1>
                <!-- <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa fa-times"></i></button> -->
            </div>
            <ul class="list-unstyled px-4">
                <li class=""><a href="#dashboard" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house"></i>&emsp;<b>Dashboard</b></a></li>
                <li class=""><a href="#peminjaman" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-right-left"></i>&emsp;<b>Peminjaman</b></a></li>
                <li class=""><a href="#stok_buku" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-warehouse"></i>&emsp;<b>Stok Buku</b></a></li>
                <li class=""><a href="#buku" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-book"></i>&emsp;<b>Buku</b></a></li>
                <li class=""><a href="#transaksi" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-wallet"></i>&emsp;<b>Transaksi</b></a></li>
                <li class=""><a href="#anggota" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user-group"></i>&emsp;<b>Anggota</b></a></li>
                <li class=""><a href="#administrator" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user-gear"></i>&emsp;<b>Administrator</b></a></li>
                <!-- <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between"><span><i class="fal fa-comment"></i> Messages</span><span class="bg-dark rounded-pill text-white py-0 px-2">02</span></a></li> -->
            </ul>
            <hr class="h-color mx-2">
            <ul class="list-unstyled px-2">
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bars"></i>Settings</a></li>
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i>Notifications</a></li>
            </ul>
        </div>

        <div class="content">
            <nav class="navbar navbar-expand-md navbar-dark sticky-top" style="background-color: #3D8BFD;">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">
                        <button class="open-btn text-white" style="border: none; background: none;"><i class="fa-solid fa-bars"></i>&ensp;</button>
                        <button class="close-btn text-white" style="border: none; background: none;"><i class="fa-solid fa-xmark"></i>&ensp;</button>
                        <a class="navbar-brand fs-4" href="#"><span class="bg-light rounded px-2 py-0 text-primary"><i class="fa-solid fa-book-open-reader"></i></span>&ensp;<b>ePerpus</b></a>
                    </div>
                    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-sort-down"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section id="dashboard" class="content-fill px-4 pt-4"></section>
            <section id="peminjaman" class="content-fill px-4 pt-4"></section>
            <section id="stok_buku" class="content-fill px-4 pt-4"></section>
            <section id="buku" class="content-fill px-4 pt-4"></section>
            <section id="transaksi" class="content-fill px-4 pt-4"></section>
            <section id="anggota" class="content-fill px-4 pt-4"></section>
            <section id="administrator" class="content-fill px-4 pt-4"></section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
    <script src="script.js"></script>
</body>

</html>