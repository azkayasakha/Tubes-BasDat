<?php
include '../koneksi.php';
$queryPeminjaman = "SELECT * FROM tbl_peminjaman;";
$sqlPeminjaman = mysqli_query($conn, $queryPeminjaman);
?>

<div class="container d-flex align-items-center justify-content-center">
    <h3>Riwayat Peminjaman</h3>
</div>
<div class="table-responsive">
    <table id="tbl_peminjaman" class="table align-middle table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ISBN</th>
                <th>Judul</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Tenggat</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            while ($result = mysqli_fetch_assoc($sqlPeminjaman)) {
                ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $result['isbn']; ?></td>
                    <td><?php echo $result['judul']; ?></td>
                    <td><?php echo $result['nisn']; ?></td>
                    <td><?php echo $result['nama']; ?></td>
                    <td><?php echo $result['tanggal_pinjam'] ?></td>
                    <td><?php echo $result['tanggal_tenggat'] ?></td>
                    <td><?php echo $result['tanggal_kembali'] ?></td>
                    <td
                        class="<?php echo $result['status'] == 'masuk' ? 'text-success' : ($result['status'] == 'keluar' ? 'text-danger' : ''); ?>">
                        <?php echo $result['status']; ?>
                    </td>

                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>