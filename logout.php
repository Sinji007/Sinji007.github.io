<?php
session_start();
session_destroy();
echo "<p><div align='center'>Anda keluar Sendiri, kami tunggu kunjungan anda Selanjutnya</div><p>";
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
?>