<?php
include '../koneksi.php';
include '../loginKey.php';

$isbn = $_GET['isbn'];

$query = "SELECT * FROM tbl_buku WHERE isbn = '$isbn'";
$sql = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($sql);

$judul = $result['judul'];
$penulis = $result['penulis'];
$sinopsis = $result['sinopsis'];
$penerbit = $result['penerbit'];
$tanggal_terbit = $result['tanggal_terbit'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Ubah Data Buku</title>
</head>

<body>
    <div class="main-container">
        <div class="content">
            <nav class="navbar navbar-dark justify-content-center" style="background-color: #3D8BFD;">
                <a class="navbar-brand" href="../index.php?login=<?php echo $login ?>">
                    <h1 class="fs-4 m-0"><span class="bg-white text-primary rounded shadow px-2 me-2"><i class="fa-solid fa-book-open-reader"></i></span> <span class="text-white">ePerpus</span></h1>
                </a>
            </nav>

            <h3 class="mt-4 text-center">Ubah Data Buku</h3>

            <div class="container mt-4">
                <form method="POST" action="ubahApi.php" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="isbn" name="isbn"
                                value="<?php echo $isbn; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="judul" name="judul"
                                value="<?php echo $judul; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="penulis" name="penulis"
                                value="<?php echo $penulis; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
                        <div class="col">
                            <textarea required class="form-control" id="sinopsis" name="sinopsis"
                                rows="3"><?php echo $sinopsis; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="penerbit" name="penerbit"
                                value="<?php echo $penerbit; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_terbit" class="col-sm-2 col-form-label">Tanggal Terbit</label>
                        <div class="col">
                            <input required type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit"
                                value="<?php echo $tanggal_terbit; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sampul" class="col-sm-2 col-form-label">Sampul Buku</label>
                        <div class="col">
                            <input class="form-control" type="file" id="sampul" name="sampul" accept="image/*">
                        </div>
                    </div>
                    <div class="mb-3 row mt-4 text-center">
                        <div class="col">
                            <button type="submit" name="aksi" value="edit" class="btn btn-primary fw-bold"
                                style="width: 150px;"><i class="fa-solid fa-floppy-disk"></i>&ensp;Simpan</button>
                            <a href="../index.php?login=<?php echo $login ?>" type="button" class="btn btn-danger fw-bold" style="width: 150px;"><i
                                    class="fa fa-reply" aria-hidden="true"></i>&ensp;Batal</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>