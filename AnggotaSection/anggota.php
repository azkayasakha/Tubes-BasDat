<?php
include '../koneksi.php';
session_start();

$queryAnggota = "SELECT * FROM tbl_siswa;";
$sqlAnggota = mysqli_query($conn, $queryAnggota);
?>

<div class="container d-flex align-items-center justify-content-center">
    <h3>Data Anggota</h3>
</div>

<div class="table-responsive">
    <table id="tbl_anggota" class="table align-middle table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
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
            while ($result = mysqli_fetch_assoc($sqlAnggota)) {
            ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $result['nisn']; ?></td>
                    <td><?php echo $result['nama']; ?></td>
                    <td><?php echo $result['tempat_lahir']; ?></td>
                    <td><?php echo $result['tanggal_lahir']; ?></td>
                    <td><?php echo $result['jenis_kelamin'] ?></td>
                    <td><?php echo $result['alamat'] ?></td>
                    <td><img src="Image/FotoSiswa/<?php echo $result['foto']; ?>" style="width: 100px;"></td>
                    <td>
                        <a href="AnggotaSection/ubah.php?nisn=<?php echo $result['nisn']; ?>" type="button" class="btn btn-success btn-sm fw-bold"><i class="fa fa-pencil"></i></a>
                        <a href="AnggotaSection/hapusApi.php?nisn=<?php echo $result['nisn']; ?>" type="button" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<a href="AnggotaSection/tambah.php" type="button" class="btn btn-primary mb-3 fw-bold"><i class="fa fa-plus"></i>&ensp;Tambah Data</a>

<script>
    $(document).ready(function() {
        $('#tbl_anggota').DataTable();
    });
</script>