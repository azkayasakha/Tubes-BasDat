<?php
include '../koneksi.php';

$queryTransaksi = "SELECT tbl_transaksi.id_transaksi, tbl_transaksi.id_peminjaman, tbl_transaksi.nisn, tbl_transaksi.tanggal, tbl_transaksi.biaya, tbl_transaksi.keterangan, tbl_siswa.nama FROM tbl_transaksi INNER JOIN tbl_siswa ON tbl_transaksi.nisn=tbl_siswa.nisn;";
$sqlTransaksi = mysqli_query($conn, $queryTransaksi);

$querySum = "SELECT SUM(biaya) AS total_biaya FROM tbl_transaksi;";
$sqlSum = mysqli_query($conn, $querySum);
?>

<div class="container d-flex align-items-center justify-content-center">
    <h3>Data Transaksi</h3>
</div>
<div class="table-responsive">
    <table id="tbl_transaksi" class="table align-middle table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Biaya</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            while ($result = mysqli_fetch_assoc($sqlTransaksi)) {
                ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $result['nisn']; ?></td>
                    <td><?php echo $result['nama']; ?></td>
                    <td><?php echo $result['tanggal']; ?></td>
                    <td><?php echo $result['biaya']; ?></td>
                    <td><?php echo $result['keterangan']; ?></td>
                    <td>
                        <a href="TransaksiSection/ubah.php?id=<?php echo $result['id_transaksi']; ?>" type="button" class="btn btn-success btn-sm fw-bold"><i class="fa-solid fa-pencil"></i></a>
                        <a href="TransaksiSection/hapusApi.php?id=<?php echo $result['id_transaksi']; ?>" type="button" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<h6 class="mb-3">Total biaya:&emsp;Rp<?php echo number_format(mysqli_fetch_assoc($sqlSum)['total_biaya'], 0, ',', '.') ?></h6>
<a href="TransaksiSection/tambah.php" type="button" class="btn btn-primary mb-3 fw-bold"><i class="fa fa-plus"></i>&ensp;Tambah Data</a>
<script>
    $(document).ready(function () {
        $('#tbl_transaksi').DataTable();
    });
</script>