<?php
$host = "localhost";	 // ip server
$user = "root";       	 // username masuk mysql dari hosting
$pass = ""; 		     // password masuk mysql dari hosting
$db = "wallpaper";		 // nama database yang yang diakses

$kon = mysqli_connect($host, $user, $pass, $db);

//test

/*if ($kon) {
    echo "terkoneksi dengan mysql server <br>";
    echo "database $db bisa diakses";
} else {
    echo "conection failed";
}*/
?>