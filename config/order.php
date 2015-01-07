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

$id_user 		= $_POST['id_user'];
$nama_user 		= $_POST['nama_user'];
$hp_user 		= $_POST['hp_user'];
$id_paket 		= $_POST['id_paket'];
$nama_paket		= $_POST['nama_paket'];
$harga_paket	= $_POST['harga_paket'];
$disc			= $_POST['disc'];
$image_paket	= $_POST['image_paket'];
$kategori_paket	= $_POST['kategori_paket'];
$check_in 		= $_POST['check_in'];
$check_out 		= $_POST['check_out'];
$id = newID();

			$simpan = mysql_query("INSERT INTO pemesanan (id, id_user, nama_user, hp_user, id_paket, nama_paket, harga_paket, disc, image_paket, kategori_paket, check_in, check_out, tgl_booking)
			VALUES('$id','$id_user','$nama_user','$hp_user','$id_paket','$nama_paket','$harga_paket','$disc','$image_paket','$kategori_paket','$check_in','$check_out', NOW())") or die (mysql_error());
			if($simpan) 
					{
						header("location:../plugin/praorder.php?id=$id");
					}
			else 
					{
						echo "Proses Gagal!";
					}
?>