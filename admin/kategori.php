<button type="button>" class="btn-g">KATEGORI</button>
<br>
<a href="<?php echo "?p=kategoriadd"; ?>"> <button class=" btn-add">Tambah Kategori</button></a><br>
<?php
$sqlk = mysqli_query($kon, "select * from kategori order by namakat asc");
while ($rk = mysqli_fetch_array($sqlk)) {
    $sqlg = mysqli_query($kon, "select * from gambar where idkat='$rk[idkat]'");
    $rowp = mysqli_num_rows($sqlg);
    echo "<div class='dh3'>";
    echo "<div class='kartu-container'>";
    echo "<div class='kartu'>";
    echo "<div class='kartu-content'>";
    echo "<hr>
        <h3>$rk[namakat]</h3><h1>$rowp</h1>
       
         <hr><h4>KETERANGAN: $rk[ketkat]</h4>
         <hr><small><i>Dibuat pada $rk[tglkat] WIB 
                <br> Oleh $ra[namalengkap]</i></small>";
    echo "<p></p>";
    echo "<a href='?p=kategoriedit&id=$rk[idkat]' class='btn'>edit</a><br>";
    echo "<a href='?p=kategoridel&id=$rk[idkat]' class='btn'>hapus</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>