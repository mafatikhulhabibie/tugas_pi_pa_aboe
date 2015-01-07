<?php
include "database.php";
$id= $_POST['id'];
$sql = "SELECT * from pemesanan where id like '%$id%'";
$query = mysql_query($sql);
$number=mysql_num_rows($query);

if($number==1){
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $email;

			header("location: ../konfirmasi_next.php?id=$id");

			}

else {
			$_SESSION['error']='<h4>Id Anda Tidak Cocok, Silahkan Ulangi</h4>';
			header("location:../konfirmasi.php"); 
		
	}
	?>