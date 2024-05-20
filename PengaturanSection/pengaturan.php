<?php
include '../koneksi.php';

$query = "SELECT * FROM tbl_pengaturan";
$sql = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($sql);
?>

<div class="container d-flex align-items-center justify-content-center">
    <h3>Pengaturan</h3>
</div>

<div class="container mt-4">
    <form method="POST" action="PengaturanSection/ubahApi.php">
        <div class="mb-3 row">
            <label for="denda" class="col-sm-2 col-form-label">Denda</label>
            <div class="col">
                <input required type="number" class="form-control" id="denda" name="denda" value="<?php echo $result['denda']; ?>">
            </div>
        </div>
        <div class="mb-3 row mt-4 text-center">
            <div class="col">
                <button type="submit" name="aksi" value="edit" class="btn btn-primary fw-bold" style="width: 150px;"><i
                        class="fa-solid fa-floppy-disk"></i>&ensp;Simpan</button>
            </div>
        </div>

    </form>
</div>