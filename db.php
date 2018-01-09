<?php 

$server = "mysql5-3";
$user = "pyxis.97663";
$password = "pyxistradex123789";
$database = "pyxis_97663";

$conn = mysqli_connect($server,$user,$password,$database);

if (!$conn){
	echo "Cannot connect";
	}
 ?>
