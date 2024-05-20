<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../show-password-toggle.css">
    <title>Tambah Data Petugas</title>
</head>

<body>
    <div class="main-container">
        <div class="content">
            <nav class="navbar navbar-dark justify-content-center" style="background-color: #3D8BFD;">
                <a class="navbar-brand" href="../index.php?login=<?php echo $login ?>">
                    <h1 class="fs-4 m-0"><span class="bg-white text-primary rounded shadow px-2 me-2"><i class="fa-solid fa-book-open-reader"></i></span> <span class="text-white">ePerpus</span></h1>
                </a>
            </nav>

            <h3 class="mt-4 text-center">Formulir Tambah Data Petugas</h3>

            <div class="container mt-4">
                <form method="POST" action="tambahApi.php" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="kode" name="kode" placeholder="ABC">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Kata Sandi</label>
                        <div class="col input-group">
                            <input required type="password" id="password" name="password" autocomplete="password"
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
                        <label for="foto" class="col-sm-2 col-form-label">Foto Petugas</label>
                        <div class="col">
                            <input required class="form-control" type="file" id="foto" name="foto" accept="image/*">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-2 col-form-label">Jenis Role</label>
                        <div class="col">
                            <select required id="role" name="role" class="form-select">
                                <option value="admin">Admin</option>
                                <option selected value="petugas">Petugas</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row mt-4 text-center">
                        <div class="col">
                            <button type="submit" name="aksi" value="add" class="btn btn-primary fw-bold"
                                style="width: 150px;"><i class="fa-solid fa-floppy-disk"></i>&ensp;Tambahkan</button>
                            <a href="../index.php?login=<?php include '../loginKey.php'; echo $login ?>" type="button" class="btn btn-danger fw-bold" style="width: 150px;"><i
                                    class="fa fa-reply" aria-hidden="true"></i>&ensp;Batal</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="../Script/show-password-toggle.js"></script>
</body>

</html>