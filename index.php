<?php
session_start();
include "koneksi.php";
$sqlag = mysqli_query($kon, "select * from anggota where
email='$_SESSION[userag]' and password='$_SESSION[passag]'");
$rag = mysqli_fetch_array($sqlag);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WallHack</title>
    <link rel="stylesheet" href="gambar.css
">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="card text-center">
        <div class="card-header">
            <div class="continer1">
                <nav class="navbar bg-secondary  fixed-top ">
                    <div class="container ">
                        <a class="navbar-brand" href="<?php echo "?p=home"; ?>">WallHack</a>
                        <form class="d-flex justify-content-center" role="search" method="post"
                            action="<?php echo "?p=gambarterbaru"; ?>">
                            <input name="cari" class="form-control me-2" type="search" placeholder="Search"
                                aria-label="Search">
                            <input class="btn btn-outline-dark" type="submit" name="Submit" value="Cari">
                        </form>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                                    <p>Welcome</p>
                                    <?php
                                    if (!empty($_SESSION["userag"]) and !empty($_SESSION["passag"]))
                                        echo "<a ><h3><i>$rag[nama]</i></h3></a>"; ?>


                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body ">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item">
                                        <div class="pil">
                                            <?php
                                            $sqlk = mysqli_query($kon, "select * from kategori order by namakat
asc");
                                            while ($rk = mysqli_fetch_array($sqlk)) {
                                                if ($_GET["idk"] == $rk["idkat"]) {
                                                    $pil = "class='pilih'";
                                                } else {
                                                    $pil = "";
                                                }
                                                echo "<a class='p' href='?p=home&idk=$rk[idkat]' $pil>$rk[namakat]</a>";
                                            }
                                            ?>
                                        </div>


                                    </li>
                                    <li class="nav-item">
                                        <div class="pil">
                                            <?php
                                            if (!empty($_SESSION["userag"]) and !empty($_SESSION["passag"])) {
                                                echo "<a class='p' href='?p=logout'>Logout</a>";
                                            } else {
                                                echo "<a class='p' href='?p=register'>Register</a>";
                                                echo "<a class='p' href='?p=login'>Login</a>";
                                            }
                                            ?>
                                        </div>

                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="card-body">
            <div class="pil">
                <?php
                if ($_GET["p"] == "gambarterbaru.php") {
                    include "gambarterbaru.php";
                } else if ($_GET["p"] == "register") {
                    include "register.php";
                } else if ($_GET["p"] == "download") {
                    include "download.php";
                } else if ($_GET["p"] == "login") {
                    include "login.php";
                } else if ($_GET["p"] == "logout") {
                    include "logout.php";
                } else {
                    include "home.php";
                    include "gambarterbaru.php";
                }
                ?>

            </div>
        </div>
        <div class="card-footer bg-secondary">
            <div class="continer3">
                Copyright &copy; 2024 Refrian fajri
            </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>