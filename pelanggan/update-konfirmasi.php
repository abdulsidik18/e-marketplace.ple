<?php
include "../conn.php";
if(isset($_POST['update'])){
$namafolder="../admin/bukti_transfer/"; //tempat menyimpan file

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $id_kon	        = $_POST['id_kon'];
	    $nopo	        = $_POST['nopo'];
	    $kd_cus	        = $_POST['kd_cus'];
	    $bayar_via      = $_POST['bayar_via'];
	    $nama_desa      = $_POST['nama_desa'];
	    $biaya_kirim      = $_POST['biaya_kirim'];
	    $tanggal        = $_POST['tanggal'];
        $jumlah         = $_POST['jumlah'];
        $total         = $_POST['total'];
		$total  = $biaya_kirim+$jumlah;
	
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="UPDATE konfirmasi SET bayar_via='$bayar_via',nama_desa='$nama_desa',biaya_kirim='$biaya_kirim',tanggal='$tanggal', jumlah='$jumlah',total='$total', bukti_transfer='$gambar' WHERE id_kon='$id_kon'" or die(mysqli_error());
			$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			//echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data Konfirmasi berhasil diupdate!'); window.location = 'index1.php'</script>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}
}