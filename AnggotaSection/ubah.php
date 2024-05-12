<?php
    include '../koneksi.php';

    $nisn = $_GET['nisn'];

    $query = "SELECT * FROM tbl_siswa WHERE nisn = '$nisn'";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    $nama = $result['nama'];
    $tempat_lahir = $result['tempat_lahir'];
    $tanggal_lahir = $result['tanggal_lahir'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $alamat = $result['alamat'];
    $nama = $result['nama'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Ubah Data Anggota</title>
</head>

<body>
    <div class="main-container">
        <div class="content">
            <nav class="navbar navbar-dark bg-dark justify-content-center">
                <a class="navbar-brand" href="../index.php">
                    <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2"><i class="fa-solid fa-book-open-reader"></i></span> <span class="text-white">ePerpus</span></h1>
                </a>
            </nav>

            <h3 class="mt-4 text-center">Ubah Data Anggota</h3>

            <div class="container mt-4">
                <form method="POST" action="ubahApi.php" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="nisn" name="nisn" placeholder="1234567890" value="<?php echo $nisn; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="nama" name="nama_siswa" placeholder="John Doe" value="<?php echo $nama; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Jakarta" value="<?php echo $tempat_lahir; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col">
                            <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col">
                            <select required id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                <option <?php if ($jenis_kelamin == 'Laki-laki') {echo "selected";}?> value="Laki-laki">Laki-laki</option>
                                <option <?php if ($jenis_kelamin == 'Perempuan') {echo "selected";}?> value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                        <div class="col">
                            <textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto Siswa</label>
                        <div class="col">
                            <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
                        </div>
                    </div>
                    <div class="mb-3 row mt-4 text-center">
                        <div class="col">
                            <button type="submit" name="aksi" value="edit" class="btn btn-primary fw-bold" style="width: 200px;"><i class="fa-solid fa-floppy-disk"></i>&ensp;Simpan Perubahan</button>
                            <a href="../index.php" type="button" class="btn btn-danger fw-bold" style="width: 200px;"><i class="fa fa-reply" aria-hidden="true"></i>&ensp;Batal</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>