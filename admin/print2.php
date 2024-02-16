<?php ob_start(); ?>
<html> 
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 750px;
		}
		table td {
			word-wrap:break-word;
			width: 24%;
		}


	</style>
</head>
<body>
		<table border="0" width="1500">
 <thead>
  <tr>
   <td></td>
   <td></td>
  </tr>
 </thead>
 <tbody style="font-size: 20px;">
 	<tr>
   <td><img src="../img/logo1.png" alt="" width="280" height="100"/></td>
   <td align="center"><b><br>DATA PELANGGAN</b>
       <br><b>E-COMMERCE TANAMAN</b>
	   <br><b>FLORIKULTURA KANTOR PULAU</b></td>
  </tr>
  
 </tbody>
</table>
	
	<hr width="nilai" align="right"/>

			<div style="padding: 20px 0 10px 0; font-size: 15px;">
			Laporan Data Pelanggan</div>

			<style type="text/css">
				.tabel {border-collapse: collapse;}
				.tabel th {padding: 8px 5px;background-color: #f60; color: #fff;}
			</style>
			<style type="text/css">
				.tabel {border-collapse: collapse;}
				.tabel tr {padding: 8px 5px; text-align: center;}
			</style>

			<style type="text/css">
			.tulisan_satu{
	color: blue;
	text-decoration: underline;
}

.tulisan_dua{
	text-align: right;
	text-transform: capitalize;
	text-decoration: overline;
}

.tulisan_tiga{
	text-align: center;
	text-transform: lowercase;
	text-decoration: line-through;
	word-spacing: 10px;
}

.tulisan_empat{
	text-transform: ;
	text-indent: 900px;
	line-height: 10px;
	letter-spacing: 5px;
}
.tulisan_lima{
	text-transform: ;
	text-indent: 910px;
	line-height: 10px;
	letter-spacing: 5px;
}
</style>


     
	<?php
	// Load file koneksi.php
	include "koneksi.php";

	if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
		$filter = $_GET['filter']; // Ambil data filder yang dipilih user

		if($filter == '1'){ // Jika filter nya 1 (per tanggal)
			$tanggal = date('d-m-y', strtotime($_GET['tanggal']));

			echo '<b>Data Pelanggan Tanggal '.$tanggal.'</b><br /><br />';
			

			$query = "SELECT * FROM pelanggan WHERE DATE(tanggal)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
		}else if($filter == '2'){ // Jika filter nya 2 (per bulan)
			$nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

			echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';

			$query = "SELECT * FROM pelanggan WHERE MONTH(tanggal)='".$_GET['bulan']."' AND YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
		}else{ // Jika filter nya 3 (per tahun)
			echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b><br /><br />';

			$query = "SELECT * FROM pelanggan WHERE YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
		}
	}else{ // Jika user tidak memilih filter
		echo '<b>Semua Data Transaksi</b><br /><br />';

		$query = "SELECT * FROM pelanggan ORDER BY tanggal"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
	}
	?>


	<table border="1" cellpadding="11" class="tabel">
	<tr>
		<th align="center">Tanggal</th>
		<th align="center">Kode</th>
		
		<th align="center">Nama</th>
		<th align="center">Alamat</th>
		<th align="center">No Telepon</th>
		<th align="center">username</th>
		

	
	</tr>
        
	<?php
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

	if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
		while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
			$tanggal = date('d-m-Y', strtotime($data['tanggal'])); // Ubah format tanggal jadi dd-mm-yyyy

			echo "<tr>";
			echo "<td>".$tanggal."</td>";
			echo "<td>".$data['kd_cus']."</td>";
			echo "<td>".$data['nama']."</td>";
			echo "<td>".$data['alamat']."</td>";
			echo "<td>".$data['no_telp']."</td>";
			echo "<td>".$data['username']."</td>";
			
			
			echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='11'>Data tidak ada</td></tr>";
	}
	?>
	</table>
	<p></p>

<p class="tulisan_empat">Tertanda</p>

<p></p>

<p class="tulisan_lima">Admin</p>




</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('plugin/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('L','A4','en');
$pdf->WriteHTML($html);
$pdf->Output();
//$pdf->Output('Data Transaksi.pdf', 'D');

?>
