<?php
session_start();
// koneksi database -------------------------------------------->
$db = new mysqli ( "localhost" , "root" , "" , "pi" );
echo $db->connect_errno?'Koneksi gagal : '.$db->connect_error:'';
//<--------------------------------------------------------------
if(isset($_POST['email']) && ($_POST['pass'])){
	 $email = $db->real_escape_string($_POST['email']);
	 $pass = $db->real_escape_string($_POST['pass']);
	 $pass = md5($pass);
	 $sql = "select * from user where email = '$email' AND pass = '$pass'";
	 $result = $db->query($sql) or die('Terjadi Kesalahan : '.$db->error);
 
	if ($result->num_rows == 1){
		  $row = $result->fetch_assoc();
		  $_SESSION['id'] 			= $row['id'];
		  $_SESSION['email'] 		= $row['email'];
		  $_SESSION['pass'] 		= $row['pass'];
		  $_SESSION['nama'] 		= $row['nama'];
		  $_SESSION['hp'] 			= $row['hp'];
		  $_SESSION['alamat']	 	= $row['alamat'];
		  $_SESSION['level'] 		= $row['level'];
		  $_SESSION['aktif'] 		= $row['aktif'];
		  $_SESSION['registrasi'] 	= $row['registrasi'];
		  header("location:../");
	}else{
		$_SESSION['error']='<h4>Email atau Password Salah</h4>';
		header("location:../login.php");
	}
}
?>