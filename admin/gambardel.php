<?php
$sqlp = mysqli_query($kon, "delete from gambar where idgambar='$_GET[id]'");
if ($sqlp) {
    echo "gambar Berhasil Dihapus";
} else {
    echo "Gagal Menghapus";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=gambar'>";
?>