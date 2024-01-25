<button type="button>" class="btn-g">GAMBAR</button>
<br>
<a href="<?php echo "?p=gambaradd"; ?>"><button class="btn-add">Tambah Gambar</button></a><br>
<?php
$batas = 8;
$halaman = $_GET["pg"];
if (empty($halaman)) {
    $posisi = 0;
    $halaman = 1;
} else {
    $posisi = ($halaman - 1) * $batas;
}
$sqlg = mysqli_query($kon, "select * from gambar order by tglgambar desc limit $posisi, $batas");
while ($rg = mysqli_fetch_array($sqlg)) {
    $sqlk = mysqli_query($kon, "select * from kategori where idkat='$rg[idkat]'");
    $rk = mysqli_fetch_array($sqlk);
    $nm = substr($rg["nama"], 0, 25);

    echo "<div class='grid100'>";
    echo "<div class='kartu-container'>";
    echo "<div class='kartu'>";
    echo "<img src='../foto/$rg[foto]' alt='rusak'>";
    echo "<div class='kartu-content'>";
    echo "<h3>$rk[namakat]</h3>
    <hr>
            <h4>$nm</h4>
            <hr>
             <p>$rg[resolusi]</p>
            <hr>
<small><i>Dibuat pada $rg[tglgambar] WIB <br> oleh $ra[namalengkap]</i></small>
";
    echo "<a href='?p=gambaredit&id=$rg[idgambar]' class='btn'>edit</a><br>";
    echo "<a href='?p=gambardel&id=$rg[idgambar]' class='btn'>hapus</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
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
    echo "<span class='kotak'><a href='?p=gambar&pg=$prev'>&laquo; Prev</a> </span>";
} else {
    echo "<span class='kotak'>&laquo; Prev</span>";
}
if ($halaman < $jmlhal) {
    $next = $halaman + 1;
    echo "<span class='kotak'><a href='?p=gambar&pg=$next'>Next &raquo;</a> </span>";
} else {
    echo "<span class='kotak'>Next &raquo;</span>";
}
echo "Total gambar <span class='kotak'><b>$jmldata</b></span>";
echo "<p></div>";
echo "<p>&nbsp;</p>";
?>