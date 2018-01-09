<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

header('Content-Type: text/html; charset=utf-8');
$querychar = "SET CHARACTER SET utf8";
$charset =  $db_handle->executeQuery($querychar);

if(!empty($_POST["druh"])) {
	// $druh = mysql_real_escape_string(strip_tags($_POST["druh"]));
	$druh = ($_POST["druh"]);
	$rozmer = ($_POST["rozmer"]);
	$jakost = ($_POST["jakost"]);
	
  $sql = "INSERT INTO produkty (druh,rozmer,jakost) VALUES ('" . $druh . "','" . $rozmer . "','" . $jakost . "')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from produkty WHERE id = '$faq_id' ";
		$posts = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?php echo $posts[0]["id"]; ?>">
<td contenteditable="true" onBlur="saveToDatabase(this,'druh','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["druh"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'rozmer','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["rozmer"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'jakost','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["jakost"]; ?></td>
<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[0]["id"]; ?>);">Smazat</a></td>
</tr>  
<?php } ?>