<?php
include "database.php";
$id=$_GET['id'];
$row=mysql_fetch_array(mysql_query("select * from pemesanan where id='$id'"));;

$query=mysql_query("delete from pemesanan where id='$id'");
if($query){
	header("location: ../pemesanan.php");
}
?>