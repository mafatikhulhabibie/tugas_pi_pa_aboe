<?php
include "database.php";
	
	$id 			= $_POST['id'];
	$pass 			= md5 ($_POST['pass']);

		$simpan = mysql_query("UPDATE user set pass='$pass' WHERE id='$id'") or die (mysql_error());
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