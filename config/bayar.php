<?php
include "database.php";
	
	$id 			= $_POST['id'];
	$pembayaran 	= $_POST['pembayaran'];
	$nama_rekening 	= $_POST['nama_rekening'];
	$bank 			= $_POST['bank'];
	$tgl_bayar		= $_POST['tgl_bayar'];

		$simpan = mysql_query("UPDATE pemesanan set pembayaran='$pembayaran', nama_rekening='$nama_rekening', bank='$bank', tgl_bayar='$tgl_bayar' WHERE id='$id'") or die (mysql_error());
		if($simpan) 
			{
				header("location: ../plugin/order.php?id=$id");
			}
		else
			{
				echo"Gagal";
			}
?>