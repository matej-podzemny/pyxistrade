<?php session_start();

include 'db.php';
if (isset($_SESSION['user']) && isset($_SESSION['password']) == 'true') {
	$sel_sql = "SELECT * FROM uzivatele WHERE uzivatel = '".$_SESSION['user']."' AND heslo = '".$_SESSION['password']."'";

		if ($run_sql = mysqli_query($conn, $sel_sql)) {
			while ($rows = mysqli_fetch_assoc($run_sql)) {
			if (mysqli_num_rows($run_sql) == 1 ) {
			

				}
				else{
				header('Location: loginos.php');
				}		
			}
				

		}	
	}	
	else{
				header('Location: loginos.php');
	}

 ?>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$querychar = "SET CHARACTER SET utf8";
$charset =  $db_handle->executeQuery($querychar);
$sql = "SELECT * from produkty";
$posts = $db_handle->runSelectQuery($sql);
?>

<html lang="en">
    <head>

    <meta charset="UTF-8">
      <title>Administrace</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/stylecms.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew() {
	$("#add-more").hide();
	var data = '<tr class="table-row" id="new_row_ajax">' +
	'<td contenteditable="true" id="txt_druh" onBlur="addToHiddenField(this,\'druh\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="txt_rozmer" onBlur="addToHiddenField(this,\'rozmer\')" onClick="editRow(this);"></td>' +
		'<td contenteditable="true" id="txt_jakost" onBlur="addToHiddenField(this,\'jakost\')" onClick="editRow(this);"></td>' +
	'<td><input type="hidden" id="druh" /><input type="hidden" id="rozmer" /><input type="hidden" id="jakost" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links btn btn-primary">Uložit</a> / <a onclick="cancelAdd();" class="ajax-action-links btn btn-info">Zrušit</a></span></td>' +	
	'</tr>';
  $("#table-body").append(data);
  $('html, body').animate({
    scrollTop: ($('#kotva').first().offset().top)
},500);
}
function cancelAdd() {
	$("#add-more").show();
	$("#new_row_ajax").remove();
}
function editRow(editableObj) {
  $(editableObj).css("background","#FFF");
}

function saveToDatabase(editableObj,column,id) {
  $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
  $.ajax({
    url: "edit.php",
    type: "POST",
    contentType: "application/x-www-form-urlencoded;charset=UTF-8",
    data:'column='+column+'&editval='+$(editableObj).text()+'&id='+id,
    success: function(data){
      $(editableObj).css("background","#FDFDFD");
    }
  });
}

function addToDatabase() {
  var druh = $("#druh").val();
  var rozmer = $("#rozmer").val();
  var jakost = $("#jakost").val();
  
	  $("#confirmAdd").html('<img src="loaderIcon.gif" />');
	  $.ajax({
		url: "add.php",
		type: "POST",
        contentType: "application/x-www-form-urlencoded;charset=UTF-8",
		data: 'druh='+druh+'&rozmer='+rozmer+'&jakost='+jakost,
		success: function(data){
		  $("#new_row_ajax").remove();
		  $("#add-more").show();		  
		  $("#table-body").append(data);
		}
	  });
}
function addToHiddenField(addColumn,hiddenField) {
	var columnValue = $(addColumn).text();
	$("#"+hiddenField).val(columnValue);
}

function deleteRecord(id) {
	if(confirm("Doopravdy chcete tento záznam smazat?")) {
		$.ajax({
			url: "delete.php",
			type: "POST",
			data:'id='+id,
			success: function(data){
			  $("#table-row-"+id).remove();
			}
		});
	}
}
</script>
    </head>
    <body>
   <div class="container">
		<nav class="navbar">
			<div class="togglecont">
			<div class="testtoggle">
			<div class="container-fluid navfluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html">Pyxistrade</a>
			</div>
			
			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
				<li><a href="firma.html">Firma</a></li>
				<li><a href="hutni.html">Hutní materiál</a></li>
				<li><a href="fire.html">Protipožární ochrana</a></li>
				<li><a href="systemkvality.html">Systém kvality</a></li>
				<li><a href="kontakt.html">Kontakt</a></li>
				<li><a href="logout.php">Odhlásit se</a></li>

			</ul>
			</div>
		
			</div> 
		</div>
		</div>
		</nav>
	</div>
	<div class="container">	
    <div class="ajax-action-button" id="add-more" onClick="createNew();">Přidat produkt</div>

<table class="tbl-qa table table-bordered">
  <thead>
	<tr>
		<th class="table-heading"><strong>Druhy</strong></th>
		<th class="table-heading"><strong>Rozmer v mm</strong></th>
		<th class="table-heading"><strong>Jakost</strong></th>
		<th class="table-header">Úpravy</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($posts)) { 
	foreach($posts as $k=>$v) {
	  ?>
	  <tr class="table-row" id="table-row-<?php 
	  $querychar = "SET CHARACTER SET utf8";
	   echo $posts[$k]["id"]; ?>">
		<td contenteditable="true" onBlur="saveToDatabase(this,'druh','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["druh"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'rozmer','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["rozmer"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'jakost','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["jakost"]; ?></td>
		<td><a class="ajax-action-links btn btn-danger" onclick="deleteRecord(<?php echo $posts[$k]["id"]; ?>);">Smazat</a></td>
	  </tr>
	  <?php
	}
	}
	?>
  </tbody>
</table>
<div id="kotva"></div>
</div> 	
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
		<script>
		$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
        $(".navbar").addClass("scrolling navbar-fixed-top");
         $(".togglecont").addClass("container");
        
        $(".icon-bar").addClass("iconscroll");
    } else {
        $(".navbar").removeClass("scrolling navbar-fixed-top");
           $(".togglecont").removeClass("container");
        $(".icon-bar").removeClass("iconscroll");
    }
	});


	</script>
    </body>
</html>
