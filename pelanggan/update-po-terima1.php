<?php
include "../conn.php";
if(isset($_POST['update'])){
	$id	     = $_POST['id'];
	$nopo	 = $_POST['nopo'];
	$kd_cus	 = $_POST['kd_cus'];
	$kode	 = $_POST['kode'];
	$tanggal = $_POST['tanggal'];
	$color   = $_POST['color'];
	$size    = $_POST['size'];
	$qty     = $_POST['qty'];
	$total   = $_POST['total'];
	$total   = $_POST['total'];
	$user_id = $_POST['user_id'];
    
	$cek = mysqli_query($koneksi, "SELECT * FROM po_terima WHERE id='$id'");
	$delete= mysqli_query($koneksi, "DELETE FROM po_terima1 WHERE id='$id'");
				if(mysqli_num_rows($cek) == 0){
					    
						$insert = mysqli_query($koneksi, "INSERT INTO po_terima(id, nopo, kd_cus, kode, tanggal, color , size, qty, total, user_id)
															VALUES('$id','$nopo', '$kd_cus','$kode','$tanggal','$color','$size','$qty','$total','$user_id')") or die(mysqli_error());
															
						if($insert){
							echo "<script>alert('Data PO berhasil disimpan!'); window.location = 'po-terima.php'</script>";
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Departement Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Nomor PO Sudah Ada ...!</div>';
				}
			}

            ?>  