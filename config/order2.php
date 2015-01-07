<?php 
session_start();
include ("database.php");

function newID()
{
	$query = "SELECT max(id) as maxID FROM pemesanan";
	$hasil = mysql_query($query);
	$data  = mysql_fetch_array($hasil);
	$idMax = $data['maxID'];
	$noUrut = (int) substr($idMax, 3, 5);
	$noUrut++;
	$id = 'ECT' . sprintf("%05s", $noUrut);
	return $id;
}

$nama_user 		= $_POST['nama_user'];
$hp_user 		= $_POST['hp_user'];
$nama_paket		= $_POST['nama_paket'];
$kategori_paket	= $_POST['kategori_paket'];
$check_in 		= $_POST['check_in'];
$check_out 		= $_POST['check_out'];
$pembayaran		= $_POST['pembayaran'];
$id = newID();

			$simpan = mysql_query("INSERT INTO pemesanan (id, nama_user, hp_user, nama_paket, kategori_paket, check_in, check_out, pembayaran, tgl_booking)
			VALUES('$id','$nama_user','$hp_user','$nama_paket','$kategori_paket','$check_in','$check_out','$pembayaran', NOW())") or die (mysql_error());
			if($simpan) 
					{
						header("location:../plugin/order.php?id=$id");
					}
			else 
					{
						echo "Proses Gagal!";
					}
?>