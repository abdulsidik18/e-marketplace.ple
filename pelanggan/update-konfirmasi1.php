<?php
$namafolder="../admin/bukti_transfer/"; //tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $user_id = $_POST['user_id'];
		$username= $_POST['username'];
		$password1=$_POST['password'];
        $password=sha1($password1);
        $fullname=$_POST['fullname'];
		
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
		$a = "Belum";
		$total  = $biaya_kirim+$jumlah;
		$query = mysqli_query($koneksi, "DELETE FROM konfirmasi1 WHERE id_kon='$id_kon'");

	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO konfirmasi (id_kon, nopo, kd_cus, bayar_via, nama_desa, biaya_kirim, tanggal, jumlah, bukti_transfer, total, status) VALUES
            ('$id_kon','$nopo','$kd_cus','$bayar_via','$nama_desa','$biaya_kirim','$tanggal','$jumlah','$gambar','$total','$a')";
			$res=mysqli_query($koneksi, $sql, $query) or die (mysqli_error());	
			//echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data Produk berhasil dimasukan!'); window.location = 'po-terima.php'</script>";	 
			
			
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}

?>
