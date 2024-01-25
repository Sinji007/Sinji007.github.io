<?php
session_start();
include "koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>wallpaper</title>
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    if (!empty($_SESSION["useradm"]) and !empty($_SESSION["passadm"])) {
        $sqla = mysqli_query($kon, "select * from admin where username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
        $ra = mysqli_fetch_array($sqla);
        ?>


        <div class="card text-center">
            <div class="card-header">
                <div class="continer1">
                    <nav class="navbar bg-secondary fixed-top ">
                        <div class="container ">
                            <a class="navbar-brand" href="<?php echo "?p=gambar"; ?>">Halaman Admin </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="offcanvas bg-secondary offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                                aria-labelledby="offcanvasNavbarLabel">
                                <div class="offcanvas-header">
                                    <h5 class=" btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Tooltip on right" id="offcanvasNavbarLabel">
                                        <p>Welcome</p>
                                        <?php echo "$ra[namalengkap]"; ?>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body ">
                                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page"
                                                href="<?php echo "?p=gambar"; ?>">Home</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class=" btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="Tooltip on right" href=" <?php echo "?p=gambar"; ?>">Gambar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class=" btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="Tooltip on right" href="<?php echo "?p=kategori"; ?>">Kategori</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class=" btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="Tooltip on right" href="<?php echo "?p=logout"; ?>">Keluar</a>
                                        </li>
                                </div>

                                </ul>


                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="card-body">
                <div class="continer2">

                    <?php
                    if ($_GET["p"] == "logout") {
                        include "logout.php";
                    } else if ($_GET["p"] == "kategori") {
                        include "kategori.php";
                    } else if ($_GET["p"] == "kategoriadd") {
                        include "kategoriadd.php";
                    } else if ($_GET["p"] == "kategoriedit") {
                        include "kategoriedit.php";
                    } else if ($_GET["p"] == "kategoridel") {
                        include "kategoridel.php";
                    } else if ($_GET["p"] == "gambar") {
                        include "gambar.php";
                    } else if ($_GET["p"] == "gambaradd") {
                        include "gambaradd.php";
                    } else if ($_GET["p"] == "gambaredit") {
                        include "gambaredit.php";
                    } else if ($_GET["p"] == "gambardel") {
                        include "gambardel.php";
                    } else {
                        include "gambar.php";
                    }
                    ?>

                </div>
            </div>
            <div class="card-footer bg-secondary text-body-secondary">
                <div class="continer3">
                    Copyright &copy; 2024 Refrian fajri
                </div>
            </div>
        </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <?php
    } else {
        include "login.php";
    }
    ?>
</body>

</html>