<?php
include "database.php";
$id=$_GET['id'];
$row=mysql_fetch_array(mysql_query("select * from paket where id='$id'"));
$image_sample=$row['image_sample'];

$query=mysql_query("delete from paket where id='$id'");
if($query){
	$nama_file="$image_sample";
	unlink($nama_file);
	header("location: ../view_obyek.php");
}
?>