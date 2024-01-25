<a href="<?php echo "?p=gambar"; ?>"><button class="btn-g">GAMBAR</button></a>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<div class="login-02">
    <div class="two-login  hvr-float-shadow">
        <div class="two-login-head">
            <img src="images/top-note.png" alt="" />
            <h2>Tambah Gambar</h2>
            <lable></lable>
        </div>
        <form name="form1" method="post" action="" enctype="multipart/form-data">
            <li style="height:47px;">
                <?php
                $sqlk = mysqli_query($kon, "select * from kategori order by namakat asc");
                echo "<select style='height:47px;width:88%;float:right;' class='text' name='idkat'>";
                echo "<option value=''>Kategori</option>";
                while ($rk = mysqli_fetch_array($sqlk)) {
                    echo "<option value='$rk[idkat]'>$rk[namakat]</option>";
                }
                echo "</select>";
                ?>
            </li>
            <li>
                <input name="nama" type="text" id="nama" class="text" placeholder="Nama">
            </li>
            <li>
                <input name="resolusi" type="text" id="resolusi" class="text" placeholder="Resolusi">
            </li>

            <li>
                <input name="foto" type="file" id="foto">
            </li>
            <div class="submit two">
                <input name="simpan" type="submit" id="simpan" value="Simpan">
            </div>

        </form>
        <?php
        if ($_POST["simpan"]) {
            if (
                !empty($_POST["idkat"]) and !empty($_POST["nama"]) and !empty($_POST["resolusi"])
            ) {
                $nmfoto = $_FILES["foto"]["name"];
                $lokfoto = $_FILES["foto"]["tmp_name"];
                if (!empty($lokfoto)) {
                    move_uploaded_file($lokfoto, "../foto/$nmfoto");

                }
                $sqlg = mysqli_query($kon, "insert into gambar (idkat, idadmin, nama, resolusi, foto, tglgambar) 
                values ('$_POST[idkat]', '$ra[idadmin]', '$_POST[nama]', '$_POST[resolusi]', '$nmfoto', NOW())");
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