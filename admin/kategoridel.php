<?php
$sqlk = mysqli_query($kon, "delete from kategori where idkat ='$_GET[id]'");

if ($sqlk) {
    echo "Kategori Berhasil Dihapus";
} else {
    echo "Gagal Menyimpan";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kategori'>";
?>