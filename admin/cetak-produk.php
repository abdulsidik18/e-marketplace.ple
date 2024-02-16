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

$result=mysqli_query($koneksi, "SELECT * FROM produk ORDER BY kode ASC") or die(mysql_error());

//Initialize the 3 columns and the total
$column_nik = "";
$column_nama = "";
$column_alamat = "";
$column_no_hp = "";
$column_stok = "";
$column_status = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$nik = $row["kode"];
    $nama = $row["nama"];
    $alamat = $row["keterangan"];
    $no_hp = $row["jenis"];
    $stok    = $row["stok"];
    $status = number_format($row['harga'],0,",",".");

	$column_nik = $column_nik.$nik."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_alamat = $column_alamat.$alamat."\n";
    $column_no_hp = $column_no_hp.$no_hp."\n";
    $column_stok = $column_stok.$stok."\n";
    $column_status = $column_status.$status."\n";

			
//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../img/logo1.jpg',10,10,-175);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(40,10,'DATA PRODUK',0,0,'C');
$pdf->Ln(7); 
$pdf->Cell(80);
$pdf->Cell(40,10,'E-COMMERCE TANAMAN ',0,0,'C' );
$pdf->Ln(7);
$pdf->Cell(80);
$pdf->Cell(40,10,'FLORIKULTURA KANTOR PULAU ',0,0,'C' );
$pdf->Ln(10);
$pdf->Cell(80);
$pdf->Cell(30,0,'____________________________________________________________________________________________',0,0,'C');
$pdf->Ln();
}
//Fields Name position
$Y_Fields_Name_position = 42;
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

//First create each Field Name
//Gray color filling each Field Name box
//Fields Name position
$Y_Fields_Name_position = 47;
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(20);
$pdf->Cell(25,8,'Kode',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(60,8,'Nama',1,0,'C',1);
//$pdf->SetX(70);
//$pdf->Cell(70,8,'Keterangan',1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(40,8,'Jenis',1,0,'C',1);
$pdf->SetX(145);
$pdf->Cell(25,8,'stok',1,0,'C',1);
$pdf->SetX(170);
$pdf->Cell(25,8,'Harga',1,0,'C',1);
$pdf->Ln();


//Table position, under Fields Name
$Y_Table_Position = 55;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(25,6,$column_nik,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(60,6,$column_nama,1,'L');

//$pdf->SetY($Y_Table_Position);
//$pdf->SetX(70);
//$pdf->MultiCell(65,6,$column_alamat,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(40,6,$column_no_hp,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(25,6,$column_stok,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(170);
$pdf->MultiCell(25,6,$column_status,1,'C');

//Fields Name position
$Y_Fields_Name_position = 145;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(350,10,'Tertanda ',0,0,'C',1 );
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
$Y_Table_Position = 170;

//Now show the columns
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(350,6,$_SESSION['username'],0,'C');
$pdf->Output();
}
?>
