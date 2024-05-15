<?php
include '../koneksi.php';

$queryBuku = "SELECT * FROM tbl_buku;";
$sqlBuku = mysqli_query($conn, $queryBuku);
?>

<div class="container d-flex align-items-center justify-content-center">
    <h3>Data Buku</h3>
</div>
<div class="table-responsive">
    <table id="tbl_buku" class="table align-middle table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-sm-1">ISBN</th>
                <th class="col-sm-1">Judul</th>
                <th class="col-sm-1">Penulis</th>
                <th class="col-sm-2">Sinopsis</th>
                <th class="col-sm-1">Penerbit</th>
                <th class="col-sm-1">Tanggal Terbit</th>
                <th class="col-sm-1">Sampul</th>
                <th class="col-sm-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            while ($result = mysqli_fetch_assoc($sqlBuku)) {
                ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $result['isbn']; ?></td>
                    <td><?php echo $result['judul']; ?></td>
                    <td><?php echo $result['penulis']; ?></td>
                    <td><?php echo $result['sinopsis']; ?></td>
                    <td><?php echo $result['penerbit']; ?></td>
                    <td><?php echo $result['tanggal_terbit']; ?></td>
                    <td><img src="Image/Sampul/<?php echo $result['sampul']; ?>" style="width: 100px;"></td>
                    <td>
                        <a href="BukuSection/ubah.php?isbn=<?php echo $result['isbn']; ?>" type="button"
                            class="btn btn-success btn-sm fw-bold"><i class="fa-solid fa-pencil"></i></i></a>
                        <a href="BukuSection/hapusApi.php?isbn=<?php echo $result['isbn']; ?>" type="button"
                            class="btn btn-danger btn-sm fw-bold"
                            onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')"><i
                                class="fa-solid fa-trash-can"></i></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<a href="BukuSection/tambah.php" type="button" class="btn btn-primary mb-3 fw-bold"><i
        class="fa fa-plus"></i>&ensp;Tambah Data</a>

<script>
    $(document).ready(function () {
        $('#tbl_buku').DataTable();
    });
</script>