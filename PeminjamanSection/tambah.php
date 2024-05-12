<?php
include '../koneksi.php';

$queryBuku = "SELECT isbn FROM tbl_buku ORDER BY isbn ASC";
$sqlBuku = mysqli_query($conn, $queryBuku);
$dataBuku = array();
if (mysqli_num_rows($sqlBuku) > 0) {
    while ($result = mysqli_fetch_assoc($sqlBuku)) {
        $dataBuku[] = array(
            'label' => $result["isbn"],
            'value' => $result["isbn"]
        );
    }
}

$querySiswa = "SELECT nisn FROM tbl_siswa ORDER BY nisn ASC";
$sqlSiswa = mysqli_query($conn, $querySiswa);
$dataSiswa = array();
if (mysqli_num_rows($sqlSiswa) > 0) {
    while ($result = mysqli_fetch_assoc($sqlSiswa)) {
        $dataSiswa[] = array(
            'label' => $result["nisn"],
            'value' => $result["nisn"]
        );
    }
}

$input_isbn = "";
$input_nisn = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_isbn = $_POST["isbn"];
    $input_nisn = $_POST["nisn"];
}

$querySearchBuku = "SELECT * FROM tbl_buku WHERE isbn = '$input_isbn'";
$sqlSearchBuku = mysqli_query($conn, $querySearchBuku);
$searchBuku = mysqli_fetch_assoc($sqlSearchBuku);

$querySearchSiswa = "SELECT * FROM tbl_siswa WHERE nisn = '$input_nisn'";
$sqlSearchSiswa = mysqli_query($conn, $querySearchSiswa);
$searchSiswa = mysqli_fetch_assoc($sqlSearchSiswa)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Peminjaman</title>
</head>

<body>
    <div class="main-container">
        <div class="content">
            <nav class="navbar navbar-dark bg-dark justify-content-center">
                <a class="navbar-brand" href="../index.php">
                    <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2"><i class="fa-solid fa-book-open-reader"></i></span> <span class="text-white">ePerpus</span></h1>
                </a>
            </nav>

            <h3 class="mt-4 text-center">Peminjaman</h3>

            <div class="container mt-4">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3 row">
                        <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $input_isbn; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col">
                            <input required type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $input_nisn; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row mt-4 text-center">
                        <div class="col">
                            <button type="submit" name="aksi" value="add" class="btn btn-primary fw-bold" style="width: 150px;"><i class="fa-solid fa-magnifying-glass"></i>&ensp;Cek Data</button>
                            <a href="../index.php" type="button" class="btn btn-danger fw-bold" style="width: 150px;"><i class="fa fa-reply" aria-hidden="true"></i>&ensp;Batal</a>
                        </div>
                    </div>
                </form>

                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($searchBuku['isbn']) && isset($searchSiswa['nisn'])) { ?>
                        <div class="table-responsive">
                            <table class="table table-bordered mt-2 text-center" style="width: 50%; margin: 0 auto;">
                                <thead>
                                    <tr>
                                        <th scope="row" class="col-6">ISBN</th>
                                        <th scope="row" class="col-6">Judul</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $input_isbn ?></td>
                                        <td><?php echo $searchBuku['judul'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered mt-2 text-center" style="width: 50%; margin: 0 auto;">
                                <thead>
                                    <tr>
                                        <th scope="row" class="col-6">NISN</th>
                                        <th scope="row" class="col-6">Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $input_nisn ?></td>
                                        <td><?php echo $searchSiswa['nama'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <form method="POST" action="tambahApi.php">
                            <input type="hidden" id="isbn" name="isbn" value="<?php echo $input_isbn; ?>">
                            <input type="hidden" id="judul" name="judul" value="<?php echo $searchBuku['judul'] ?>">
                            <input type="hidden" id="nisn" name="nisn" value="<?php echo $input_nisn; ?>">
                            <input type="hidden" id="nama" name="nama" value="<?php echo $searchSiswa['nama'] ?>">
                            <div class="mb-3 row mt-4 text-center">
                                <div class="col">
                                    <button type="submit" name="aksi" value="add" class="btn btn-primary fw-bold" style="width: 150px;"><i class="fa-solid fa-floppy-disk"></i>&ensp;Tambahkan</button>
                                </div>
                            </div>
                        </form>
                <?php } elseif (!isset($searchBuku)) {
                        echo "Data buku tidak ditemukan!!!";
                    } elseif (!isset($searchSiswa)) {
                        echo "Data siswa tidak ditemukan!!!";
                    }
                }; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="autocomplete.js"></script>
    <script>
        var auto_complete_isbn = new Autocomplete(document.getElementById('isbn'), {
            data: <?php echo json_encode($dataBuku); ?>,
            maximumItems: 10,
            highlightTyped: true,
            highlightClass: 'fw-bold text-primary'
        });
        var auto_complete_nisn = new Autocomplete(document.getElementById('nisn'), {
            data: <?php echo json_encode($dataSiswa); ?>,
            maximumItems: 10,
            highlightTyped: true,
            highlightClass: 'fw-bold text-primary'
        });
    </script>
</body>

</html>