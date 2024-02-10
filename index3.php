<!DOCTYPE html>
<html>
<head>
	 <title>E-COMMERCE | Tanaman Florikultura </title> 
     <link href='img/icons/favicon.ico' rel='shortcut icon'>
     <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/style1.css" type="text/css" rel="stylesheet">

</head>
<body>
	<h1></h1>	
	<h1></h1>
	<div class="kotak">	

		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "salah"){
				echo "<p>Captcha tidak sesuai.</p>";
			}
		}
		?>

		<p>Isi Captcha Dengan Benar</p>		
		<form action="periksa_captcha.php" method="post">
			<table align="center">						
				<tr>
					<td>Captcha</td>				
					<td><img src="captcha.php" alt="gambar" /> </td>
				</tr>
				<td>Isikan captcha </td>
				<td><input name="nilaiCaptcha" value="" style="width: 190px;"/></td>
				<tr>
					 <td><input type="submit" value="Simpan" name="input" id="input" class="btn btn-sm btn-success"/>&nbsp;<a href="index.php" class="btn btn-sm btn-success"><b>Kembali</b></a></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>