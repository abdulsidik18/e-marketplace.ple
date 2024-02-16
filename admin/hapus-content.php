<?php
include "../conn.php";
$id = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM editor WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'profil.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'profil.php'</script>";	
}
?>