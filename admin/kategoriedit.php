<?php
$sqlk = mysqli_query($kon, "select * from kategori where idkat='$_GET[id]'");
$rk = mysqli_fetch_array($sqlk);
?>
<a href="<?php echo "?p=kategori"; ?>"><button type="button>" class="btn-g">KATEGORI</button></a>
<br>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<div class="login-02">
    <div class="two-login  hvr-float-shadow">
        <div class="two-login-head">
            <img src="images/top-note.png" alt="" />
            <h2>EDIT KATEGORI</h2>
            <lable></lable>
        </div>
        <form name="form1" method="post" action="" enctype="multipart/form-data">
            <li>
                <input type="hidden" name="idkat" value="<?php echo "$rk[idkat]"; ?>" />
            </li>
            <li>
                <input name="namakat" type="text" id="namakat" placeholder="Nama Kategori"
                    value="<?php echo "$rk[namakat]"; ?>">
            </li>
            <li>
                <input name="ketkat" type="text" id="ketkat" value="<?php echo "$rk[ketkat]"; ?>">
            </li>
            <div class="submit two">
                <input name="Simpan" type="submit" id="simpan" value="SIMPAN">
            </div>
        </form>
        <?php
        if ($_POST["Simpan"]) {
            if (!empty($_POST["namakat"]) and !empty($_POST["ketkat"])) {
                $sqlk = mysqli_query($kon, "update kategori set namakat='$_POST[namakat]', ketkat='$_POST[ketkat]' where idkat='$_POST[idkat]'");

                if ($sqlk) {
                    echo "Kategori Berhasil Disimpan";
                } else {
                    echo "Gagal Menyimpan";
                }
                echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kategori'>";
            } else {
                echo "Isi data Dengan Lengkap";
            }
        }
        ?>