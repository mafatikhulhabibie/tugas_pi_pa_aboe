<?php
include('fpdf17/fpdf.php');
include('../config/database.php');
ob_start();

#ambil data di tabel

if($_GET['id']){
$id=$_GET['id'];

$sql=mysql_query("select * from pemesanan where id='$id'");//order by
$dataku=mysql_fetch_array($sql);

$id			=$dataku['id'];
$nama_user	=$dataku['nama_user'];
$hp_user	=$dataku['hp_user'];
$nama_paket	=$dataku['nama_paket'];
$kategori_paket	=$dataku['kategori_paket'];
$check_in	=$dataku['check_in'];
$check_out	=$dataku['check_out'];
$tgl_booking=$dataku['tgl_booking'];

//deklarasi FPDF
class PDF extends FPDF {
	//inisialisasi Header DOkumen PDF
	function Header() {
		$this->SetFont('micross','',12);

  // menulis header
  $this->SetFont('micross','',25);
  $this->Cell(0,0.7,'E-Commerce Trip On Bali',0,1,'L');
  $this->SetFont('micross','',12);
  $this->Cell(0,0.7,'Perjalanan Nyaman Hati Senang',0,1,'L');
  
  $this->Line(7,2.5,12,2.5);
  $this->Line(8,2.65,15,2.65);

	}
 
}

//deklarasi format kertas 
$pdf=new PDF('P','cm','A4');
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
//setting margin kertas
$pdf->SetMargins(1.5,1,1,1); 
$pdf->SetFont('micross','',12);
 
//membuat kop tabel
$x=$pdf->GetY(); 
$pdf->SetY($x+1);

$dataku['hasil'] = (($dataku['harga_paket']*$dataku['disc'])/100);
$dataku['hasil2'] = ($dataku['harga_paket']-$dataku['hasil']);

// menuliskan datanya
$pdf->Ln(2);
$pdf->Cell(6,1,'Id Transaksi',0,0,'L');
$pdf->Cell(6,1,': '.$dataku['id'],0,1, 'L');
$pdf->Cell(6,1,'Nama Pemesan',0,0,'L');
$pdf->Cell(6,1,': '.$dataku['nama_user'],0,1, 'L');
$pdf->Cell(6,1,'No HP Pemesan',0,0,'L');
$pdf->Cell(6,1,': '.$dataku['hp_user'],0,1, 'L');
$pdf->Cell(6,1,'Nama Pesanan',0,0,'L');
$pdf->Cell(6,1,': '.$dataku['nama_paket'],0,1, 'L');
$pdf->Cell(6,1,'Kategori Pesanan',0,0,'L');
$pdf->Cell(6,1,': '.$dataku['kategori_paket'],0,1, 'L');
$pdf->Cell(6,1,'Check In',0,0,'L');
$pdf->Cell(6,1,': '.$dataku['check_in'],0,1, 'L');
$pdf->Cell(6,1,'Check Out',0,0,'L');
$pdf->Cell(6,1,': '.$dataku['check_out'],0,1, 'L');
$pdf->Cell(6,1,'Jumlah Tagihan',0,0,'L');
$pdf->Cell(6,1,': '.$dataku['hasil2'],0,1, 'L');
$pdf->Cell(6,1,'Jumlah Pembayaran',0,0,'L');
$pdf->Cell(6,1,': '.$dataku['pembayaran'],0,1, 'L');
$pdf->Cell(6,1,'Nama Rekening',0,0,'L');
$pdf->Cell(6,1,': '.$dataku['nama_rekening'],0,0, 'L');
$pdf->Cell(6,1,''.$dataku['bank'],0,1, 'L');
$pdf->Cell(6,1,'Tanggal Booking',0,0,'L');
$pdf->Cell(6,1,': '.$dataku['tgl_booking'],0,0, 'L');
$pdf->Cell(6,1,'Tgl Bayar : '.$dataku['tgl_bayar'],0,1, 'L');
$pdf->Ln(1);
for($i=1;$i<=1;$i++)
{
$pdf->MultiCell(0, 1, 'Terima Kasih Telah Menggunakan Jasa Kami.');
$pdf->MultiCell(0,1,'');
}
$pdf->Ln(1);
$pdf->Ln(1);
//Menjadikan dalam bentuk PDF
$pdf->Output('pemesanan.pdf','I');
} else echo "Id harus terisi";
?>
