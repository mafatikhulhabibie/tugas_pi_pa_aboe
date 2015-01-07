<?php
include "database.php";
	
	$id 			= $_POST['id'];
	$status			= $_POST['status'];

		$simpan = mysql_query("UPDATE pemesanan set status='$status' WHERE id='$id'") or die (mysql_error());
		if($simpan) 
			{
				$_SESSION['error']='<h3>Pemesanan Anda Telah Dibatalkan</h3>';
				header("location:../pembatalan_next.php?id=$id");
			}
		else
			{
				echo"Gagal";
			}
?>