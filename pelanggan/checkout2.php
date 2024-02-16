<?php

session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";

        $a = "Belum";
        $b = $_GET['total'];
        $c = date("Y-m-d H:i:s"); 
        $nopo = date("dmYHis");
        $query1 = mysqli_query($koneksi, "INSERT INTO konfirmasi1 (nopo, kd_cus, bayar_via, tanggal, jumlah, bukti_transfer, status) VALUES ('$nopo', '$_SESSION[user_id]', '0', '$c', '$b', 0, '$a')") or die(mysqli_error());
        
        $input = mysqli_query($koneksi, "INSERT INTO po_terima1(kd_cus, nopo, kode, tanggal, color, size, qty, total) SELECT session, $nopo, kode, tanggal, color, size, qty, jumlah FROM cart WHERE  session='$_SESSION[user_id]'") or die(mysqli_error());
                     
                      
        if ($query1 and $input) {
                                     
                    $delete = mysqli_query($koneksi, "DELETE FROM cart WHERE session='$_SESSION[user_id]'"); 
                    echo "<script>alert('Checkout Sukses, silahkan cetak invoice dan lakukan pembayaran..'); window.location = 'po-terima.php'</script>";
                
            } else {
                echo "<script>alert('Checkout Gagal !'); window.location = 'index.php'</script>";

            }
    
}
?>