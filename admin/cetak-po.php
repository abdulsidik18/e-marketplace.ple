<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
require('../assets/fpdf17/fpdf.php');
require('../conn.php');

$kodesaya = $_GET['kd'];
//Select the Products you want to show in your PDF file
//$result=mysqli_query($koneksi, "SELECT * FROM po_terima where id like '%$kodesaya%' ");
$result=mysqli_query($koneksi, "SELECT po_terima.*, produk.nama, produk.harga, pelanggan.no_telp, po.status FROM po_terima
				LEFT JOIN produk ON po_terima.kode = produk.kode
				LEFT JOIN pelanggan ON po_terima.kd_cus = pelanggan.kd_cus
                LEFT JOIN po ON po_terima.nopo = po.nopo
				WHERE po_terima.id='$_GET[kd]'") or die(mysqli_error());

//Initialize the 3 columns and the total
$column_date = "";
$column_standmeter = "";
$column_factor = "";
$column_total = "";
$column_nilai = "";
$column_rata = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$nopo    = $row["nopo"];
    $kd_cus  = $row["kd_cus"];
    $kode    = $row["kode"];
    $tanggal = $row["tanggal"];
	$color   = $row["color"];
    $size    = $row["size"];
    $qty     = $row["qty"];
    $total   = number_format($row['total'],2,",",".");
    $nama    = $row["nama"];
    $harga   = number_format($row['harga'],2,",",".");
    $no_telp = $row["no_telp"];
    $status  = $row["status"];

	$column_date = $column_date.$nama."\n";
	$column_standmeter = $column_standmeter.$color."\n";
	$column_factor = $column_factor.$size."\n";
	$column_total = $column_total.$qty."\n";
    $column_nilai = $column_nilai.$harga."\n";
    $column_rata = $column_rata.$status."\n";		


//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../img/logo1.jpg',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(60,10,'INVOICE PURCHASE ORDER',0,0,'C');
$pdf->Ln(7);
$pdf->Cell(80);
$pdf->Cell(60,10,'E-COMMERCE TANAMAN FLORIKULTURA',0,0,'C');
$pdf->Ln(7);
$pdf->Cell(80);
$pdf->Cell(60,10,'kec. arut sel, kabupaten kotawaringin, kalteng',0,0,'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->Cell(30,0,'_______________________________________________________________________________',0,0,'C');
$pdf->Ln();

//Fields Name position
$Y_Fields_Name_position = 44;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'No PO: '.$nopo,0,0,'L',1);
$pdf->SetX(50);
$pdf->Cell(20,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 50;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Pelanggan : '.$kd_cus,0,0,'L',1);
$pdf->SetX(80);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 56;
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'No Telepon : '.$no_telp,0,0,'L',1);
$pdf->SetX(100);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 62;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Kode Produk : '.$kode,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(45,8,'Tanggal Beli : '.$tanggal,0,0,'R',1);
$pdf->Ln();

}


//Field Name Position
$Y_Fields_Name_position = 68;
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,"Di cetak pada : ".date("Y/m/d"),0,0,'L',1);
$pdf->SetX(100);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();


//Fields Name position
$Y_Fields_Name_position = 76;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Produk',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'Warna ',1,0,'C',1);
$pdf->SetX(85);
$pdf->Cell(20,8,'Ukuran',1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(20,8,'Jumlah',1,0,'C',1);
$pdf->SetX(125);
$pdf->Cell(40,8,'Harga',1,0,'C',1);
$pdf->SetX(165);
$pdf->Cell(40,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 84;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(40,6,$column_date,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(40,6,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(85);
$pdf->MultiCell(20,6,$column_factor,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(20,6,$column_total,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(40,6,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(165);
$pdf->MultiCell(40,6,$column_rata,1,'C');

//Footer Table
$pdf->SetFillColor(110,180,230);
$pdf->SetFont('Arial','B',12);
$pdf->SetX(5);
$pdf->Cell(40,8,'Total Tagihan',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(160,8,$total.'',1,0,'R',1);
$pdf->Ln();
$pdf->SetFillColor(110,180,230);
$pdf->Ln(10);

//Fields Name position
$Y_Fields_Name_position = 100;
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
$Y_Table_Position = 120;

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
