<?php
include '../../koneksi.php';

$nisn = $_GET['nisn'];

$query = "SELECT * FROM tbl_siswa WHERE nisn = '$nisn'";
$sql = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Tanda Anggota_<?php echo $result['nisn'] ?>_<?php echo $result['nama'] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="sheets-of-paper-a4.css">
    <style>
        .card-container {
            display: flex;
            align-items: center;
        }

        .card {
            width: 86mm;
            height: 54mm;
            border: 1px solid #000;
            border-radius: 10px;
            box-sizing: border-box;
            /* padding: 10px; */
            margin: 0.5px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .front {
            background-image: url('kartu-bg.jpg');
            background-size: cover;
            background-position: center;
        }

        .back {
            background-image: url('kartu-invert-bg.jpg');
            background-size: cover;
            background-position: center;
        }

        .title {
            position: absolute;
            top: 10px;
            width: 100%;
            font-size: 10pt;
            text-align: center;
            font-weight: bold;
        }

        .content {
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: center;
        }

        .photo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .photo img {
            width: 20mm;
            height: 30mm;
            border-radius: 4px;
        }

        .details {
            width: 65%;
            padding-left: 10px;
        }

        .details .detail-item {
            display: flex;
            font-size: 8pt;
            margin: 2px 0;
        }

        .details .detail-item .label {
            width: 30%;
            font-weight: bold;
        }

        .details .detail-item .value {
            width: 70%;
        }
    </style>
</head>

<body class="document">
    <div class="card-container page">
        <div class="card front">
            <h5>Kartu Tanda Anggota</h5>
            <h4 style="margin: 10px"><span class="bg-primary text-white rounded shadow px-2 py-1 me-1"><i class="fa-solid fa-book-open-reader"></i></span><span class="text-primary">ePerpus</span></h4>
        </div>
        <div class="card back">
            <div class="title"><span class="bg-primary text-white rounded shadow px-2 py-1 me-1"><i
                        class="fa-solid fa-book-open-reader"></i></span><span class="text-primary">ePerpus</span></div>
            <div class="content">
                <div class="photo">
                    <img src="../../Image/FotoSiswa/<?php echo $result['foto'] ?>" alt="Foto Siswa">
                </div>
                <div class="details">
                    <div class="detail-item">
                        <div class="label">NISN</div>
                        <div class="value">: <?php echo $result['nisn'] ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="label">Nama</div>
                        <div class="value">: <?php echo $result['nama'] ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="label">TTL</div>
                        <div class="value">: <?php echo $result['tempat_lahir'] ?>, <?php
                           $date = new DateTime($result['tanggal_lahir']);
                           $bulan = array(
                               'Januari',
                               'Februari',
                               'Maret',
                               'April',
                               'Mei',
                               'Juni',
                               'Juli',
                               'Agustus',
                               'September',
                               'Oktober',
                               'November',
                               'Desember'
                           );
                           $tanggal = $date->format('d');
                           $bulanIndo = $bulan[(int) $date->format('m') - 1];
                           $tahun = $date->format('Y');

                           echo "$tanggal $bulanIndo $tahun";
                           ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="label">Jenis Kelamin</div>
                        <div class="value">: <?php echo $result['jenis_kelamin'] ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="label">Alamat</div>
                        <div class="value">: <?php echo $result['alamat'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();

        var Config = {};
        Config.pixelsPerInch = 96;
        Config.pageHeightInCentimeter = 29.7; // must match 'min-height' from 'css/sheets-of-paper-*.css' being used
        Config.pageMarginBottomInCentimeter = 2; // must match 'padding-bottom' and 'margin-bottom' from 'css/sheets-of-paper-*.css' being used

        window.addEventListener("DOMContentLoaded", function () {
            applyPageBreaks();
        });

        function applyPageBreaks() {
            applyManualPageBreaks();
            applyAutomaticPageBreaks(Config.pixelsPerInch, Config.pageHeightInCentimeter, Config.pageMarginBottomInCentimeter);

            document.querySelectorAll(".document .page").forEach(function (element) {
                if (!element.classList.contains("has-events")) {
                    element.addEventListener("blur", function () {
                        applyPageBreaks();
                    });

                    element.classList.add("has-events");
                }
            });
        }

        /* Applies any manual page breaks in preview mode (screen, non-print) where CSS Paged Media is not fully supported */
        function applyManualPageBreaks() {
            var docs, pages, snippets;
            docs = document.querySelectorAll(".document");

            for (var d = docs.length - 1; d >= 0; d--) {
                pages = docs[d].querySelectorAll(".page");

                for (var p = pages.length - 1; p >= 0; p--) {
                    snippets = pages[p].children;

                    for (var s = snippets.length - 1; s >= 0; s--) {
                        if (snippets[s].classList.contains("page-break")) {
                            pages[p].insertAdjacentHTML("afterend", "<div class=\"page\" contenteditable=\"true\"></div>");

                            for (var n = snippets.length - 1; n > s; n--) {
                                pages[p].nextElementSibling.insertBefore(snippets[n], pages[p].nextElementSibling.firstChild);
                            }

                            snippets[s].remove();
                        }
                    }
                }
            }
        }

        /* Applies (where necessary) automatic page breaks in preview mode (screen, non-print) where CSS Paged Media is not fully supported */
        function applyAutomaticPageBreaks(pixelsPerInch, pageHeightInCentimeter, pageMarginBottomInCentimeter) {
            var inchPerCentimeter = 0.393701;
            var pageHeightInInch = pageHeightInCentimeter * inchPerCentimeter;
            var pageHeightInPixels = Math.ceil(pageHeightInInch * pixelsPerInch);
            var pageMarginBottomInInch = pageMarginBottomInCentimeter * inchPerCentimeter;
            var pageMarginBottomInPixels = Math.ceil(pageMarginBottomInInch * pixelsPerInch);
            var docs, pages, snippets, pageCoords, snippetCoords;
            docs = document.querySelectorAll(".document");

            for (var d = docs.length - 1; d >= 0; d--) {
                pages = docs[d].querySelectorAll(".page");

                for (var p = 0; p < pages.length; p++) {
                    if (pages[p].clientHeight > pageHeightInPixels) {
                        pages[p].insertAdjacentHTML("afterend", "<div class=\"page\" contenteditable=\"true\"></div>");
                        pageCoords = pages[p].getBoundingClientRect();
                        snippets = pages[p].querySelectorAll("h1, h2, h3, h4, h5, h6, p, ul, ol");

                        for (var s = snippets.length - 1; s >= 0; s--) {
                            snippetCoords = snippets[s].getBoundingClientRect();

                            if ((snippetCoords.bottom - pageCoords.top + pageMarginBottomInPixels) > pageHeightInPixels) {
                                pages[p].nextElementSibling.insertBefore(snippets[s], pages[p].nextElementSibling.firstChild);
                            }
                        }

                        pages = docs[d].querySelectorAll(".page");
                    }
                }
            }
        }
    </script>
</body>

</html>