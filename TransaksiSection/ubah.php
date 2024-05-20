<?php
include '../koneksi.php';
include '../loginKey.php';

$getId = $_GET['id'];

$query = "SELECT * FROM tbl_transaksi WHERE id_transaksi = '$getId';";
$sql = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($sql);

$querySiswa = "SELECT nisn FROM tbl_siswa ORDER BY nisn ASC";
$sqlSiswa = mysqli_query($conn, $querySiswa);
$dataSiswa = array();
if (mysqli_num_rows($sqlSiswa) > 0) {
    while ($resultSiswa = mysqli_fetch_assoc($sqlSiswa)) {
        $dataSiswa[] = array(
            'label' => $resultSiswa["nisn"],
            'value' => $resultSiswa["nisn"]
        );
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Ubah Data Transaksi</title>
</head>

<body>
    <div class="main-container">
        <div class="content">
            <nav class="navbar navbar-dark justify-content-center" style="background-color: #3D8BFD;">
                <a class="navbar-brand" href="../index.php?login=<?php echo $login ?>">
                    <h1 class="fs-4 m-0"><span class="bg-white text-primary rounded shadow px-2 me-2"><i class="fa-solid fa-book-open-reader"></i></span> <span class="text-white">ePerpus</span></h1>
                </a>
            </nav>

            <h3 class="mt-4 text-center">Ubah Data Transaksi</h3>

            <div class="container mt-4">
                <form method="POST" action="ubahApi.php">
                    <div class="d-none">
                        <input required type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo $getId; ?>">
                    </div>
                    <div class="mb-3 row">
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="nisn" name="nisn"
                                placeholder="1234567890" value="<?php echo $result['nisn']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
                        <div class="col">
                            <input required type="number" class="form-control" id="biaya" name="biaya"
                                placeholder="1234567890" value="<?php echo $result['biaya']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="keterangan" name="keterangan"
                                placeholder="Keterlambatan" value="<?php echo $result['keterangan']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row mt-4 text-center">
                        <div class="col">
                            <button type="submit" name="aksi" value="edit" class="btn btn-primary fw-bold"
                                style="width: 150px;"><i class="fa-solid fa-floppy-disk"></i>&ensp;Simpan</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Script/autocomplete.js"></script>
    <script>
        var auto_complete = new Autocomplete(document.getElementById('nisn'), {
            data: <?php echo json_encode($dataSiswa); ?>,
            maximumItems: 10,
            highlightTyped: true,
            highlightClass: 'fw-bold text-primary'
        });
    </script>
</body>

</html>