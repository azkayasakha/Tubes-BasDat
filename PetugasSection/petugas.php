<?php
include '../koneksi.php';

$query = "SELECT kode FROM tbl_login";
$sql = mysqli_query($conn, $query);
$kode =  mysqli_fetch_assoc($sql)['kode'];

$query = "SELECT * FROM tbl_petugas WHERE role='petugas';";
$sql = mysqli_query($conn, $query);
?>

<div class="container d-flex align-items-center justify-content-center">
    <h3>Data Petugas</h3>
</div>
<div class="table-responsive">
    <table id="tbl_petugas" class="table align-middle table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            while ($result = mysqli_fetch_assoc($sql)) {
            ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $result['kode']; ?></td>
                    <td><?php echo $result['nama']; ?></td>
                    <td><?php echo $result['tempat_lahir']; ?></td>
                    <td><?php echo $result['tanggal_lahir']; ?></td>
                    <td><?php echo $result['jenis_kelamin'] ?></td>
                    <td><?php echo $result['alamat'] ?></td>
                    <td><img src="Image/FotoPetugas/<?php echo $result['foto']; ?>" height="96px" width="64px"></td>
                    <td>
                        <a href="PetugasSection/ubah.php?kode=<?php echo $kode.$result['kode']; ?>" type="button" class="btn btn-success btn-sm fw-bold"><i class="fa fa-pencil"></i></a>
                        <a href="PetugasSection/hapusApi.php?kode=<?php echo $result['kode']; ?>" type="button" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<a href="petugasSection/tambah.php" type="button" class="btn btn-primary mb-3 fw-bold"><i class="fa fa-plus"></i>&ensp;Tambah Data</a>

<script>
    $(document).ready(function() {
        $('#tbl_petugas').DataTable();
    });
</script>