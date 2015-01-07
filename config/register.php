<?php 
session_start();
require_once("database.php");

$nama 		= $_POST['nama'];
$pass 		= md5 ($_POST['pass']);
$email 		= $_POST['email'];
$alamat 	= $_POST['alamat'];
$hp 		= $_POST['hp'];
$level 		= $_POST['level'];

	$query_email=mysql_query("select * from user where email='$email'");
	$cek_email=mysql_num_rows($query_email);
	
	if($cek_email>0)
		{
			$_SESSION['error']='Email anda telah terdaftar';
			header("location:../register.php");
		} 
	else 
		{
			$simpan = mysql_query("INSERT INTO user(nama, pass, email, alamat, hp, level, registrasi) VALUES('$nama','$pass','$email','$alamat','$hp','$level', NOW())");
			if($simpan) 
					{
						$_SESSION['error']='Pendaftaran Sukses, Silahkan login';
						header("location:../login.php");
					}
			else 
					{
						echo "Proses Gagal!";
					}
		}
?>