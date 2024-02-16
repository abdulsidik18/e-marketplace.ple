<?php
$host = "localhost"; // Nama hostnya
$user = "root"; // Username
$pass = ""; // Password (Isi jika menggunakan password)
$connect = mysqli_connect($host, $user, $pass, "db_toko"); // Koneksi ke MySQL
?>


<?php

//mengabaikan pesan Notice
error_reporting(E_ALL ^ (E_NOTICE));

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_toko";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}

?>



