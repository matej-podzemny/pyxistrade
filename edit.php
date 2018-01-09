<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

header('Content-Type: text/html; charset=utf-8');
$querychar = "SET CHARACTER SET utf8";
$charset =  $db_handle->executeQuery($querychar);

$sql = "UPDATE produkty set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  id=".$_POST["id"];
$result = $db_handle->executeUpdate($sql);
?>
