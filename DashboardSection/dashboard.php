<?php
include '../koneksi.php';

$query = "SELECT SUM(tersedia) AS jumlah_buku FROM tbl_stok_buku;";
$sql = mysqli_query($conn, $query);
$jumlah_buku = mysqli_fetch_assoc($sql)['jumlah_buku'];

$query = "SELECT COUNT(id_peminjaman) AS jumlah_peminjaman FROM tbl_peminjaman";
$sql = mysqli_query($conn, $query);
$jumlah_peminjaman = mysqli_fetch_assoc($sql)['jumlah_peminjaman'];

$query = "SELECT SUM(biaya) AS jumlah_biaya FROM tbl_transaksi;";
$sql = mysqli_query($conn, $query);
$jumlah_biaya = mysqli_fetch_assoc($sql)['jumlah_biaya'];

$query = "SELECT COUNT(nisn) AS jumlah_siswa FROM tbl_siswa";
$sql = mysqli_query($conn, $query);
$jumlah_siswa = mysqli_fetch_assoc($sql)['jumlah_siswa'];

$daftar_hari = array();
for ($i = 0; $i < 7; $i++) {
    $daftar_hari[$i] = date("Y-m-d", strtotime("-$i days"));
}
$json_daftar_hari = json_encode($daftar_hari);
echo "<script> var daftar_hari = $json_daftar_hari; </script>";

$daftar_jumlah = array();
for ($i = 6; $i >= 0; $i--) {
    $queryCount = "SELECT COUNT(id_peminjaman) AS jumlah_id FROM tbl_peminjaman WHERE tanggal_pinjam = '$daftar_hari[$i]';";
    $sqlCount = mysqli_query($conn, $queryCount);
    $jumlah = mysqli_fetch_assoc($sqlCount)['jumlah_id'];
    if (isset($jumlah)) {
        $daftar_jumlah[$i] = $jumlah;
    } else {
        $daftar_jumlah[$i] = 0;
    }
}
$json_daftar_jumlah = json_encode($daftar_jumlah);
echo "<script> var daftar_jumlah = $json_daftar_jumlah; </script>";
?>

<style>
    .card-container {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .card {
        width: 272px;
        height: 160px;
        border-radius: 16px;
    }

    @media (max-width: 768px) {
        .card-container {
            flex-direction: column;
            align-items: center;
        }

        .card {
            margin-bottom: 20px;
        }
    }
</style>

<div class="card-container mb-3">
    <div class="card" style="width: 100%; height: 128px;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center">
            <h1 class="card-title mb-0.5 mt-0 fs-1"><span class="bg-primary text-white rounded shadow px-2 me-2"><i class="fa-solid fa-book-open-reader"></i></span><span class="text-dark">ePerpus</span></h1>
            <p class="card-text mb-0 mt-0">Sistem Manajemen Perpustakaan Berbasis Web</p>
        </div>
    </div>
</div>

<div class="card-container mb-2">
    <div class="card text-bg-primary" style="height: 144px;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center">
            <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/courses.png" />
            <h5 class="card-text mb-0 mt-0">Data Buku</h5>
            <p class="card-text mb-0 mt-0">Jumlah buku yang tersedia <b><?php echo $jumlah_buku ?></b></p>
        </div>
    </div>
    <div class="card text-bg-primary" style="height: 144px;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center">
            <img width="50" height="50"
                src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/FFFFFF/external-transfer-management-kiranshastry-solid-kiranshastry-1.png" />
            <h5 class="card-text mb-0 mt-0">Peminjaman</h5>
            <p class="card-text mb-0 mt-0">Jumlah peminjaman buku <b><?php echo $jumlah_peminjaman ?></b></p>
        </div>
    </div>
    <div class="card text-bg-primary" style="height: 144px;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center">
            <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/ffffff/open-book.png" />
            <h5 class="card-text mb-0 mt-0">Transaksi</h5>
            <p class="card-text mb-0 mt-0">Jumlah pemasukkan <b>Rp<?php echo number_format($jumlah_biaya, 0, ',', '.') ?></b></p>
        </div>
    </div>
    <div class="card text-bg-primary" style="height: 144px;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center">
            <img width="50" height="50" src="https://img.icons8.com/sf-black-filled/64/FFFFFF/groups.png" />
            <h5 class="card-text mb-0 mt-0">Data Pengguna</h5>
            <p class="card-text mb-0 mt-0">Jumlah siswa yang terdaftar <b><?php echo $jumlah_siswa ?></b></p>
        </div>
    </div>
</div>

<div class="d-flex align-items-center justify-content-center">
    <div style="width: 704px;">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script>
    $(document).ready(function () {
        let labels = daftar_hari.sort(function (a, b) { return new Date(a) - new Date(b); });
        let itemData = [];
        for (let i = 6; i >= 0; i--) {
            itemData.push(daftar_jumlah[i]);
        }

        const data = {
            labels: labels,
            datasets: [{
                data: itemData,
                borderColor: 'rgb(13, 110, 253)',
                fill: true,
                backgroundColor: 'rgba(110, 167, 253, 0.31)',
                tension: 0.25,
                hoverBorderColor: 'red'
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: false
                    }, title: {
                        display: true,
                        text: "Grafik peminjaman dalam 7 hari terakhir"
                    }
                }
            }
        };

        const chart = new Chart(
            document.getElementById('myChart'),
            config
        )
    });
</script>