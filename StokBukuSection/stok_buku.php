<?php
include '../koneksi.php';

$queryStokBuku = "SELECT tbl_buku.isbn, tbl_buku.judul, tbl_buku.penulis, tbl_stok_buku.jumlah_buku, tbl_stok_buku.tersedia FROM tbl_buku INNER JOIN tbl_stok_buku ON tbl_buku.isbn=tbl_stok_buku.isbn";
$sqlstokBuku = mysqli_query($conn, $queryStokBuku);
?>

<div class="container d-flex align-items-center justify-content-center">
    <h3>Data Stok Buku</h3>
</div>
<div class="table-responsive">
    <table id="tbl_stok_buku" class="table align-middle table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ISBN</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Jumlah buku</th>
                <th>Tersedia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            while ($result = mysqli_fetch_assoc($sqlstokBuku)) {
                ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $result['isbn']; ?></td>
                    <td><?php echo $result['judul']; ?></td>
                    <td><?php echo $result['penulis']; ?></td>
                    <td><?php echo $result['jumlah_buku'] ?></td>
                    <td><?php echo $result['tersedia'] ?></td>
                    <td>
                        <a href="StokBukuSection/ubah.php?isbn=<?php echo $result['isbn']; ?>" type="button"
                            class="btn btn-success btn-sm fw-bold"><i class="fa-solid fa-pencil"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div class="mb-3"></div>
</div>

<script>
    $(document).ready(function () {
        $('#tbl_stok_buku').DataTable();
    });
</script>