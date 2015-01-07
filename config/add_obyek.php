<?php 
session_start();
require_once("database.php");

$namafolder="../images/"; //tempat menyimpan file

$id 			= $_POST['id'];
$nama 			= $_POST['nama'];
$user 			= $_POST['user'];
$id_user 		= $_POST['id_user'];
$hp 			= $_POST['hp'];
$deskripsi 		= $_POST['deskripsi'];
$harga	 		= $_POST['harga'];
$disc	 		= $_POST['disc'];
$fasilitas 		= $_POST['fasilitas'];
$lokasi 		= $_POST['lokasi'];
$image_sample 	= $_POST['image_sample'];
$kategori 		= $_POST['kategori'];
$stok 			= $_POST['stok'];


	$rnd=$id;
	$image_sample = $namafolder . basename($rnd.'-'.$_FILES['image_sample']['name']);		
	if (move_uploaded_file($_FILES['image_sample']['tmp_name'], $image_sample)) 
		{
			$query = mysql_query("INSERT INTO paket (id, nama, id_user, user, hp, deskripsi, harga, disc, fasilitas, lokasi, image_sample, kategori, stok, tgl_post) values('$id', '$nama', '$id_user', '$user', '$hp', '$deskripsi', '$harga', '$disc', '$fasilitas', '$lokasi', '$image_sample', '$kategori', '$stok', NOW())")or die (mysql_error());
			$_SESSION['error']='Data berhasil disimpan';
			header("location:../add_obyek.php");
		} 
	
	else 
		{
			echo "Proses Gagal!";
		}
?>