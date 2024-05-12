<?php
include '../koneksi.php';

$queryStokBuku = "SELECT * FROM tbl_stok_buku;";
$sqlstokBuku  = mysqli_query($conn, $queryStokBuku);
?>

<div class="table-responsive">
    <table id="tbl_stok_buku" class="table align-middle table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ISBN</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Sampul</th>
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
                    <td><img src="Image/Sampul/<?php echo $result['sampul']; ?>" style="width: 100px;"></td>
                    <td><?php echo $result['jumlah_buku'] ?></td>
                    <td><?php echo $result['tersedia'] ?></td>
                    <td>
                        <a href="kelola.php?ubah=<?php echo $result['isbn']; ?>" type="button" class="btn btn-success btn-sm fw-bold"><i class="fa-solid fa-pencil"></i></i></i></a>
                        <a href="proses.php?hapus=<?php echo $result['isbn']; ?>" type="button" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')"><i class="fa-solid fa-trash-can"></i></i></a>
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
    $(document).ready(function() {
        $('#tbl_stok_buku').DataTable();
    });
</script>