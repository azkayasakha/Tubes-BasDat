<?php
include '../koneksi.php';

$queryPeminjaman = "SELECT * FROM tbl_peminjaman WHERE status='keluar'";
$sqlPeminjaman = mysqli_query($conn, $queryPeminjaman);
?>

<div class="container d-flex align-items-center justify-content-center">
    <h3>Data Peminjaman</h3>
</div>
<div class="table-responsive">
    <table id="tbl_peminjaman" class="table align-middle table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Petugas</th>
                <th>ISBN</th>
                <th>Judul</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Tenggat</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            while ($result = mysqli_fetch_assoc($sqlPeminjaman)) {
            ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $result['kode']; ?></td>
                    <td><?php echo $result['isbn']; ?></td>
                    <td><?php echo $result['judul']; ?></td>
                    <td><?php echo $result['nisn']; ?></td>
                    <td><?php echo $result['nama']; ?></td>
                    <td><?php echo $result['tanggal_pinjam'] ?></td>
                    <td><?php echo $result['tanggal_tenggat'] ?></td>
                    <td>
                        <?php
                        $tanggal_tenggat = strtotime($result['tanggal_tenggat']);
                        $tanggal_hari_ini = strtotime(date("Y-m-d"));
                        $selisih_hari = ceil(($tanggal_tenggat - $tanggal_hari_ini) / (60 * 60 * 24));
                        if ($selisih_hari >= 0) {
                            echo "Tersisa $selisih_hari hari";
                        } else {
                            $terlambat = $selisih_hari * -1;
                            $denda = $terlambat * 1000;
                            echo "<span style='color:red;'>Terlambat $terlambat hari, (Rp. $denda)</span>";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="PeminjamanSection/hapusApi.php?id_peminjaman=<?php echo $result['id_peminjaman']; ?>" type="button" class="btn btn-success btn-sm fw-bold"><i class="fa-solid fa-check"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<a href="PeminjamanSection/tambah.php" type="button" class="btn btn-primary mb-3 fw-bold"><i class="fa fa-plus"></i>&ensp;Tambah Data</a>

<script>
    $(document).ready(function() {
        $('#tbl_peminjaman').DataTable();
    });
</script>