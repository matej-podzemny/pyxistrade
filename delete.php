<?php

require_once("dbcontroller.php");
$db_handle = new DBController();

header('Content-Type: text/html; charset=utf-8');

if(!empty($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM  produkty WHERE id = '$id' ";
	$db_handle->executeQuery($sql);
}
?>