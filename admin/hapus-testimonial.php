<?php
include "../conn.php";
$id = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM testimonial WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'list_testimonial.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'list_testimonial.php'</script>";	
}
?>