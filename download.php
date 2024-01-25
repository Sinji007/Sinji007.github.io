<?php
if (empty($_SESSION["userag"]) and empty($_SESSION["passag"])) {
    echo "<p><div align='center'>Sebelum mendownload gambar kami, Anda harus login terlebih dahulu</div><p>";
    echo "<META HTTP-EQUIV='Refresh' Content='2; URL=?p=login'>";
} else {
    // membaca id file dari link
    $id = $_GET['idg'];

    // membaca informasi file dari tabel berdasarkan id nya
    $hasil = mysqli_query($kon, "select * from gambar where idgambar ='$id' ");
    $data = mysqli_fetch_array($hasil);

    header('Content-Description:File Transfer');

    // header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=" . $data['foto']);

    // header yang menunjukkan ukuran file yang akan didownload
    header("Content-length: " . $data['size']);

    // header yang menunjukkan jenis file yang akan didownload
    header("Content-type: " . $data['resolusi']);

    // proses membaca isi file yang akan didownload dari folder 'data'
    $fp = fopen("data/" . $data['foto'], 'r');
    $content = fread($fp, filesize('data/' . $data['foto']));
    fclose($fp);

    // menampilkan isi file yang akan didownload
    echo $content;

    exit;
}
?>
<!--  
 -->