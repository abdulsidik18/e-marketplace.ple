<?php
include "../conn.php";
if(isset($_POST['update'])){
$namafolder="../admin/gambar_customer/"; //tempat menyimpan file

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $kode     = $_POST['kd_cust'];
        $nama     = $_POST['nama'];
        $no_ktp  = $_POST['no_ktp'];
		$alamat   = $_POST['alamat'];
		$no_telp  = $_POST['no_telp'];
		$e_mail  = $_POST['e_mail'];
        $username = $_POST['username'];
        $password1  = $_POST['password'];
        $password   = sha1($password1);
        $password1  = $_POST['password'];
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="UPDATE pelanggan SET nama='$nama',no_ktp='$no_ktp', alamat='$alamat', no_telp='$no_telp', e_mail='$e_mail',username='$username', password='$password', gambar='$gambar' WHERE kd_cus='$kode'" or die(mysqli_error());
			$res=mysqli_query($koneksi, $sql) or die (mysqli_error());

			//echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data Customer berhasil diupdate!'); window.location = 'index1.php'</script>";	   
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