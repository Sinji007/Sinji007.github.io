<div class="container5">
    <div class="grid">
        <div class="dh12">
            <?php
            $batas = 8;
            $halaman = $_GET["pg"];
            if (empty($halaman)) {
                $posisi = 0;
                $halaman = 1;
            } else {
                $posisi = ($halaman - 1) * $batas;
            }
            if (!empty($_GET["idk"])) {
                $q = " where idkat='$_GET[idk]'";
                $i = "";
            } else if ($_POST["cari"]) {
                $q = "where nama like '%$_POST[cari]%'";
                $i = "";
            } else {
                $q = "";
                $i = "limit $posisi, $batas";
            }

            $sqlk = mysqli_query($kon, "select * from kategori $q");
            $rk = mysqli_fetch_array($sqlk);
            if (!empty($_GET["idk"])) {
                $kat = "Kategori : <b>$rk[namakat]</b>";
            } else {
                $kat = "Beranda";
            }
            echo "<h2>$kat</h2>";
            $sqlp = mysqli_query($kon, "select * from gambar $q order by tglgambar desc $i");
            while ($rp = mysqli_fetch_array($sqlp)) {

                $sqlk = mysqli_query($kon, "select * from kategori where
    idkat='$rp[idkat]'");
                $rk = mysqli_fetch_array($sqlk);
                $nm = substr($rp["nama"], 0, 25);
                echo "<div class='grid100'>";
                echo " <div class='card11'>";
                echo "<img src='foto/$rp[foto]' alt=''>";
                echo "<div class='con-text'>";
                echo " <h2>$nm</h2>";
                echo "<p>";
                echo "$rp[resolusi]";
                echo "<a href='?p=download&idg=$rp[idgambar] &idag=$rag[idanggota]'><button type='button' class='button'>Download</button></a>";
                echo "</p>";

                echo " </div>";
                echo " </div>";
                echo " </div>";

            }
            echo "<div class='dh12' align='right'>";
            echo "Halaman ";
            $sqlhal = mysqli_query($kon, "select * from gambar");
            $jmldata = mysqli_num_rows($sqlhal);
            $jmlhal = ceil($jmldata / $batas);
            for ($i = 1; $i <= $jmlhal; $i++) {
                if ($i == $halaman) {
                    echo "<span class='kotak'><b>$i</b></span>";
                }
            }
            if ($halaman > 1) {
                $prev = $halaman - 1;
                echo "<span class='kotak'><a href='?p=gambar&pg=$prev'>&laquo; Prev</a>
</span>";
            } else {
                echo "<span class='kotak'>&laquo; Prev</span>";
            }
            if ($halaman < $jmlhal) {
                $next = $halaman + 1;
                echo "<span class='kotak'><a href='?p=gambar&pg=$next'>Next &raquo;</a> </span> ";
            } else {
                echo "<span class='kotak'>Next &raquo;</span>";
            }
            echo " Total gambar <span class='kotak'><b>$jmldata</b></span> ";
            echo "<p></div>";
            ?>

        </div>
    </div>
</div>