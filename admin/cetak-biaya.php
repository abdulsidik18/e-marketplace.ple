<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
require('../assets/fpdf17/fpdf.php');
require('../conn.php');


//Select the Products you want to show in your PDF file
//$result=mysql_query("SELECT * FROM daily_bbri where date like '%$periode%' ");

$result=mysqli_query($koneksi, "SELECT * FROM konfirmasi ORDER BY id_kon ASC") or die(mysql_error());

//Initialize the 3 columns and the total
$column_nopo = "";
$column_kd_cus = "";
$column_bayar_via = "";
$column_tanggal = "";
$column_biaya_kirim = "";
$column_status = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
    $nopo = $row["nopo"];
	$kd_cus = $row["kd_cus"];
    $bayar_via = $row["bayar_via"];
    $tanggal = $row["tanggal"];
    $biaya_kirim = $row["biaya_kirim"];
    $status = $row["status"];
    
	$column_nopo = $column_nopo.$nopo."\n";
    $column_kd_cus = $column_kd_cus.$kd_cus."\n";
    $column_bayar_via = $column_bayar_via.$bayar_via."\n";
    $column_tanggal = $column_tanggal.$tanggal."\n";
    $column_biaya_kirim = $column_biaya_kirim.$biaya_kirim."\n";
    $column_status = $column_status.$status."\n";

			
//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../img/logo1.jpg',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(35,10,'KANTOR PULAU',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(35,10,'DATA BIAYA PENGIRIMAN',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,0,'_______________________________________________________________________________',0,0,'C');
$pdf->Ln();

}

//Fields Name position
$Y_Fields_Name_position = 39;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(1,1,"\nDi cetak pada : ".date("d/m/Y"),0,0,'L',1);
$pdf->SetX(1);
$pdf->Cell(1,1,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Fields Name position
$Y_Fields_Name_position = 47;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(27,8,'Nopo',1,0,'C',1);
$pdf->SetX(32);
$pdf->Cell(40,8,'Kode Pelanggan',1,0,'C',1);
$pdf->SetX(72);
$pdf->Cell(40,8,'Pembayaran',1,0,'C',1);
$pdf->SetX(112);
$pdf->Cell(43,8,'Tanggal',1,0,'C',1);
$pdf->SetX(155);
$pdf->Cell(30,8,'Biaya',1,0,'C',1);
$pdf->SetX(185);
$pdf->Cell(20,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 55;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(27,6,$column_nopo,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(32);
$pdf->MultiCell(40,6,$column_kd_cus,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(72);
$pdf->MultiCell(40,6,$column_bayar_via,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(112);
$pdf->MultiCell(43,6,$column_tanggal,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(155);
$pdf->MultiCell(30,6,$column_biaya_kirim,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(185);
$pdf->MultiCell(20,6,$column_status,1,'C');
$pdf->Ln();

//Fields Name position
$Y_Fields_Name_position = 80;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(350,10,'Tertanda ',0,0,'C' );
$pdf->SetX(1);
$pdf->Cell(1,1,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 100;

//Now show the columns
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(350,6,$_SESSION['username'],0,'C');
$pdf->Output();
}
?>

$pdf->Output();
}
?>
