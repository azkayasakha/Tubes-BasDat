<?php
include 'koneksi.php';

$input_kode = "";
$input_katasandi = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_kode = $_POST["kode_admin"];
    $input_katasandi = $_POST["password"];

    $query = "SELECT * FROM tbl_administrator WHERE kode = '$input_kode';";
    $sql = mysqli_query($conn, $query);
    if (mysqli_num_rows($sql) > 0) {
        $result = mysqli_fetch_assoc($sql);
        if (password_verify($input_katasandi, $result['kata_sandi'])) {
            header('location: index.php');
        } else {
            echo 'Kata sandi salah';
        }
    } else {
        echo "Tidak ada data yang ditemukan!";
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
    <link rel="stylesheet" href="show-password-toggle.css">
    <title>Login</title>

    <style>
        .background {
            position: absolute;
            height: 100%;
            width: 100%;
            background-image: url("https://t3.ftcdn.net/jpg/03/12/98/48/360_F_312984875_Lnvr7ACXrZKkaeghLneFWSCW68BLDOTP.jpg");
            background-size: cover;
            background-position: center;
            filter: blur(5px);
            z-index: -1;
        }
    </style>
</head>

<body>

    <div class="main-container">
        <div class="background"></div>
        <div class="content d-flex flex-column justify-content-center align-items-center" style="height: 100vh; ">
            <h1 class="text-center"><span class="bg-white text-primary rounded shadow px-2 me-2"><i
                        class="fa-solid fa-book-open-reader"></i></span><span class="text-white">ePerpus</span></h1>
            <p class="text-white text-center mb-4">Sistem Manajemen Perpustakaan Berbasis Web</p>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                class="card p-4 shadow-sm" style="width: 352px;">
                <h4 class="text-center">Silahkan masuk</h4>
                <div class="mb-3">
                    <label for="kode_admin" class="form-label">Kode admin</label>
                    <input required type="text" class="form-control" id="kode_admin" name="kode_admin" value="<?php echo $input_kode; ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata sandi</label>
                    <div class="input-group">
                        <input required type="password" id="password" name="password" autocomplete="password" class="form-control rounded" spellcheck="false" autocorrect="off" autocapitalize="off" value="<?php echo $input_katasandi; ?>"/>
                        <button id="toggle-password" type="button" class="d-none" aria-label="Show password as plain text. Warning: this will display your password on the screen."></button>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" name="aksi" value="login" class="btn btn-primary fw-bold" style="width: 100%;">MASUK</button>
                </div>
            </form>
        </div>
    </div>


    <script src="show-password-toggle.js"></script>
</body>

</html>