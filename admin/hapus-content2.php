<?php
include "../conn.php";
$id_cara_belanja = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM cara_belanja WHERE id_cara_belanja='$id_cara_belanja'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'cara_belanja.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'cara_belanja.php'</script>";	
}
?>