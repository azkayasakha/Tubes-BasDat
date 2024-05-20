<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Tambah Data Anggota</title>
</head>

<body>
    <div class="main-container">
        <div class="content">
            <nav class="navbar navbar-dark justify-content-center" style="background-color: #3D8BFD;">
                <a class="navbar-brand" href="../index.php?login=<?php echo $login ?>">
                    <h1 class="fs-4 m-0"><span class="bg-white text-primary rounded shadow px-2 me-2"><i class="fa-solid fa-book-open-reader"></i></span> <span class="text-white">ePerpus</span></h1>
                </a>
            </nav>

            <h3 class="mt-4 text-center">Tambah Data Anggota</h3>

            <div class="container mt-4">
                <form method="POST" action="tambahApi.php" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="nisn" name="nisn"
                                placeholder="1234567890">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="nama" name="nama_siswa"
                                placeholder="John Doe">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                placeholder="Jakarta">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col">
                            <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col">
                            <select required id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                        <div class="col">
                            <textarea required class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto Siswa</label>
                        <div class="col">
                            <input required class="form-control" type="file" id="foto" name="foto" accept="image/*">
                        </div>
                    </div>
                    <div class="mb-3 row mt-4 text-center">
                        <div class="col">
                            <button type="submit" name="aksi" value="add" class="btn btn-primary fw-bold"
                                style="width: 150px;"><i class="fa-solid fa-floppy-disk"></i>&ensp;Tambahkan</button>
                            <a href="../index.php?login=<?php include '../loginKey.php';
                            echo $login ?>" type="button"
                                class="btn btn-danger fw-bold" style="width: 150px;"><i class="fa fa-reply"
                                    aria-hidden="true"></i>&ensp;Batal</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>