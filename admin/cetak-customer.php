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

$result=mysqli_query($koneksi, "SELECT * FROM pelanggan ORDER BY kd_cus ASC") or die(mysql_error());

//Initialize the 3 columns and the total
$column_kd_cus = "";
$column_nama = "";
$column_alamat = "";
$column_no_telp = "";
$column_no_ktp = "";
$column_email = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$kd_cus = $row["kd_cus"];
    $nama = $row["nama"];
     $alamat = $row["alamat"];
     $no_telp = $row["no_telp"];
    $no_ktp = $row["no_ktp"];
    $email = $row["e_mail"];
    

	$column_kd_cus = $column_kd_cus.$kd_cus."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_alamat = $column_alamat.$alamat."\n";
    $column_no_telp = $column_no_telp.$no_telp."\n";
    $column_no_ktp = $column_no_ktp.$no_ktp."\n";
    $column_email = $column_email.$email."\n";

			
//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../img/logo1.jpg',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(35,10,'DATA PELANGGAN',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(35,10,'E-COMMERCE KANTOR PULAU',0,0,'C');
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
$pdf->Cell(27,8,'Kode',1,0,'C',1);
$pdf->SetX(32);
$pdf->Cell(30,8,'Nama',1,0,'C',1);
$pdf->SetX(62);
$pdf->Cell(26,8,'Alamat',1,0,'C',1);
$pdf->SetX(88);
$pdf->Cell(40,8,'NIK',1,0,'C',1);
$pdf->SetX(128);
$pdf->Cell(30,8,'No Telp',1,0,'C',1);
$pdf->SetX(158);
$pdf->Cell(47,8,'Email',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 55;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(27,6,$column_kd_cus,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(32);
$pdf->MultiCell(30,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(62);
$pdf->MultiCell(26,6,$column_alamat,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(88);
$pdf->MultiCell(40,6,$column_no_ktp ,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(128);
$pdf->MultiCell(30,6,$column_no_telp,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(158);
$pdf->MultiCell(47,6,$column_email,1,'C');

//Fields Name position
$Y_Fields_Name_position = 90;
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
$Y_Table_Position = 110;

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
