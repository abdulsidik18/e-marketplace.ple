<?php
include "../conn.php";
$id_belanja       = $_POST['id_belanja'];
$keterangan      = $_POST['keterangan'];
$tanggal      = $_POST['tanggal'];

$query = mysqli_query($koneksi, "UPDATE alur_belanja SET keterangan='$keterangan', tanggal='$tanggal' WHERE id_belanja='$id_belanja'")or die(mysql_error());
if ($query){
header('location:alur_belanja.php');	
} else {
	echo "gagal";
    }
?>