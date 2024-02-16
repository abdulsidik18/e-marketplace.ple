<?php
include "../conn.php";
$id_belanja = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM alur_belanja WHERE id_belanja='$id_belanja'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'alur_belanja.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'alur_belanja.php'</script>";	
}
?>