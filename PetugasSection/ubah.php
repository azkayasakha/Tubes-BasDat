<?php
include '../koneksi.php';
include '../loginKey.php';

$getKode = $_GET['kode'];
$kode = [];
for ($i = 0; $i < strlen($getKode); $i += 3) {
    $kode[] = substr($getKode, $i, 3);
}
$kodeAdm = $kode[0];
$kodePtg = $kode[1];

$query = "SELECT * FROM tbl_petugas WHERE kode = '$kodeAdm'";
$sql = mysqli_query($conn, $query);
$role = mysqli_fetch_assoc($sql)['role'];

$query = "SELECT * FROM tbl_petugas WHERE kode = '$kodePtg'";
$sql = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($sql);

$nama = $result['nama'];
$tempat_lahir = $result['tempat_lahir'];
$tanggal_lahir = $result['tanggal_lahir'];
$jenis_kelamin = $result['jenis_kelamin'];
$alamat = $result['alamat'];
$rolePtg = $result['role'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../show-password-toggle.css">
    <title>Ubah Data Petugas</title>
</head>

<body>
    <div class="main-container">
        <div class="content">
            <nav class="navbar navbar-dark bg-dark justify-content-center">
                <a class="navbar-brand" href="../index.php">
                    <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2"><i
                                class="fa-solid fa-book-open-reader"></i></span> <span class="text-white">ePerpus</span>
                    </h1>
                </a>
            </nav>

            <h3 class="mt-4 text-center">Ubah Data Petugas</h3>

            <div class="container mt-4">
                <form method="POST" action="ubahApi.php" enctype="multipart/form-data">
                    <div class="mb-3 row <?php if ($role !== 'admin') { echo 'd-none'; } ?>">
                        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="kode" name="kode"
                                value="<?php echo $kodePtg; ?>" style="text-transform: uppercase;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Kata Sandi</label>
                        <div class="col input-group">
                            <input type="password" id="password" name="password" autocomplete="password"
                                class="form-control rounded" spellcheck="false" autocorrect="off"
                                autocapitalize="off" />
                            <button id="toggle-password" type="button" class="d-none"
                                aria-label="Show password as plain text. Warning: this will display your password on the screen."></button>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="nama" name="nama"
                                value="<?php echo $nama; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="<?php echo $tempat_lahir; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col">
                            <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="<?php echo $tanggal_lahir; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col">
                            <select required id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                <option <?php if ($jenis_kelamin == 'Laki-laki') {
                                    echo "selected";
                                } ?> value="Laki-laki">
                                    Laki-laki</option>
                                <option <?php if ($jenis_kelamin == 'Perempuan') {
                                    echo "selected";
                                } ?> value="Perempuan">
                                    Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                        <div class="col">
                            <textarea required class="form-control" id="alamat" name="alamat"
                                rows="3"><?php echo $alamat; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col">
                            <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
                        </div>
                    </div>
                    <div class="mb-3 row <?php if ($role !== 'admin') { echo 'd-none'; } ?>">
                        <label for="role" class="col-sm-2 col-form-label">Jenis Role</label>
                        <div class="col">
                            <select required id="role" name="role" class="form-select">
                                <option <?php if ($rolePtg == 'admin') {
                                    echo "selected";
                                } ?> value="admin">Admin</option>
                                <option <?php if ($rolePtg == 'petugas') {
                                    echo "selected";
                                } ?> value="petugas">Petugas
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row mt-4 text-center">
                        <div class="col">
                            <button type="submit" name="aksi" value="edit" class="btn btn-primary fw-bold"
                                style="width: 150px;"><i class="fa-solid fa-floppy-disk"></i>&ensp;Simpan</button>
                            <a href="../index.php?login=<?php echo $login; ?>" type="button" class="btn btn-danger fw-bold" style="width: 150px;"><i
                                    class="fa fa-reply" aria-hidden="true"></i>&ensp;Batal</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="../show-password-toggle.js"></script>
</body>

</html>