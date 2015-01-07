<?php
include "database.php";
	
	$id 			= $_POST['id'];
	$nama 			= $_POST['nama'];
	$email 			= $_POST['email'];
	$alamat			= $_POST['alamat'];
	$hp 			= $_POST['hp'];
	$aktif 			= $_POST['aktif'];

		$simpan = mysql_query("UPDATE user set nama='$nama', email='$email', alamat='$alamat', hp='$hp', aktif='$aktif' WHERE id='$id'") or die (mysql_error());
		if($simpan) 
			{
				$_SESSION['error']='<h4>Data Berhasil Disimpan</h4>';
				header("location:../user.php");
			}
		else
			{
				echo"Gagal";
			}
?>