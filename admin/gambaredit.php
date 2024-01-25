<?php
$sqlg = mysqli_query($kon, "select * from gambar where idgambar='$_GET[id]'");
$rg = mysqli_fetch_array($sqlg);
?>
<a href="<?php echo "?p=gambar"; ?>"><button class="btn-g">GAMBAR</button></a>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<div class="login-02">
    <div class="two-login  hvr-float-shadow">
        <div class="two-login-head">
            <img src="images/top-note.png" alt="" />
            <h2>EDIT GAMBAR</h2>
            <lable></lable>
        </div>
        <form name="form1" method="post" action="" enctype="multipart/form-data">
            <li>
                <input name="idgambar" type="hidden" value="<?php echo "$rg[idgambar]"; ?>" />
                <?php
                $sqlk = mysqli_query($kon, "select * from kategori where idkat='$rg[idkat]'");
                $rk = mysqli_fetch_array($sqlk);
                ?>
            </li>
            <li>
                <input name="namakat" type="text" disabled value="<?php echo "$rk[namakat]"; ?>" />
            </li>
            <li>
                <input name="nama" type="text" id="nama" class="text" value="<?php echo "$rg[nama]"; ?>">
            </li>
            <li>
                <input name="resolusi" type="text" id="resolusi" class="text" value="<?php echo "$rg[resolusi]"; ?>">
            </li>

            <li>
                <p><img src="<?php echo "../foto/$rg[foto]"; ?>" height="180px">
                    <input name="foto" type="file" id="foto">
                <div class="submit two">
                    <input name="simpan" type="submit" id="simpan" value="Simpan">
                </div>

        </form>
        <?php
        if ($_POST["simpan"]) {
            if (
                !empty($_POST["nama"]) and !empty($_POST["resolusi"])
            ) {
                $nmfoto = $_FILES["foto"]["name"];
                $lokfoto = $_FILES["foto"]["tmp_name"];
                if (!empty($lokfoto)) {
                    move_uploaded_file($lokfoto, "../foto/$nmfoto");
                    $foto = ", foto='$nmfoto'";
                } else {
                    $foto = "";
                }
                $sqlg = mysqli_query($kon, "update gambar set nama='$_POST[nama]', resolusi='$_POST[resolusi]'$foto where idgambar='$_POST[idgambar]'");
                if ($sqlg) {
                    echo "Gambar Berhasil Disimpan";
                } else {
                    echo "Gagal Menyimpan";
                }
                echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=gambar'>";
            } else {
                echo "Data harus diisi dengan lengkap !!!";
            }
        }
        ?>
    </div>
</div>