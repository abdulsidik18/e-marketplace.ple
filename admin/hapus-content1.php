<?php
include "../conn.php";
$id_waktu = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM waktu_operasional WHERE id_waktu='$id_waktu'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'waktu_operasional.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'waktu_operasional.php'</script>";	
}
?>