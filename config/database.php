<!--Koneksi Database-->
<?php
$host="localhost";
$userdb="root";
$passdb="";
$namadb="pi";

$sambung=mysql_connect($host,$userdb,$passdb);
mysql_select_db($namadb,$sambung)or die("Databasenya error");
?>