<?php include'db.php' ?> 

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Skladové zásoby</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/firma_kontakt.css">
	<link rel="stylesheet" href="css/style_hutni.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,600i" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<style>
		.table tr:nth-last-child(1) td {
			padding-bottom: 8px;
		}
	</style>
</head>
<body>

	<div class="container-fluid container-header-firma container-header-hutni">
	
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
			</ul>
			</div>
		
			</div> 
		</div>
		</div>
		</nav>
		</div>


	</div>
	
	<!-- Container o nas -->
	<div class="container-fluid">

	<!-- Panel start -->
		<div class="container onaspanel">
		<div class="row">
			<div class="panel panel-default panel-items">
				<h5 class="text-center">Skladové zásoby</h5>
			</div>
		</div>
	</div>


	</div> 



	<div class="container">
			<div class="row jakosti-table-row">
			<div class="col-lg-12 table-col">
				<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
					<thead>
						<th><h4>Druh</h4></th>
						<th><h4>Rozměr</h4></th>
						<th><h4>Jakost</h4></th>
					</thead>
					<tbody>
						<?php 
			mysqli_query($conn, "SET CHARACTER SET utf8");
			$selectsql = "SELECT * FROM produkty";
			$runsql = mysqli_query($conn,$selectsql);
			while ($rows = mysqli_fetch_assoc($runsql)) {
				echo '
					<tr>
					<td>'.$rows['druh'].'</td>
					<td>'.$rows['rozmer'].'</td>
					<td>'.$rows['jakost'].'</td>
					</tr>
					';
			}
			?>
				</tbody>
				</table>
				</div>
			</div>
			</div>
			</div>
		</div>
	</div>



	</div>



	<!-- End container o nas -->

			<div class="container-fluid container-footer">
		<div class="container">
			<footer class="row">
				<div class="container container-1060 containermarginfooter">
				<div class="row bot80"></div>
				<div class="col-lg-4">
					<h3 class="text-left">Oblíbené stránky</h3>
									<div class="row bot30"></div>
					<p class="text-left odkazyblock">
						<a href="firma.html#partneri">Partneři</a>
						<a href="hutni.html">Hutní materiál</a>					
						<a href="fire.html">Protipožární ochrana</a>
						<a href="loginos.php">Administrace</a>
					</p>
				</div>

					<div class="col-lg-4">
					<div class="col-lg-6 col-lg-offset-6"></div>
					<h3 class="text-center">Rychlý kontakt</h3>
					<div class="row bot30"></div>
					<p class="text-center odkazyblock odkazyblockmid">
						<img src="img/phone_icon_footer.png" alt="" class="center-block">
						<a href="">+420 571 420 468</a>
						<img src="img/email_icon_footer.png" alt="" class="center-block">
						<a href="mailto:info@pyxistrade.cz" class="">info@pyxistrade.cz</a>
					</p>
				</div>

				<div class="col-lg-4">
				<h3 class="text-right">Sídlo společnosti</h3>
								<div class="row bot30"></div>
				<p class="text-right odkazyblock location">			<img src="img/location_icon_footer.png" alt="" class="imagefooterlocation"> 
							Vsetín - Zlínský kraj <br>
							PSČ: 755 01 <br>
							Ulice: 4. května 1491
					<a href="https://www.google.cz/maps/place/4.+května+1491,+755+01+Vset%C3%ADn/@49.3446924,17.9825443,17z/data=!3m1!4b1!4m5!3m4!1s0x47138354070271b3:0x584a1592edc5627d!8m2!3d49.3446924!4d17.984733">Zobrazit na mapě >></a>
				</p>
			</div>
			</footer>
		</div>		


		<div class="row bot30"></div>

		<div class="container container-copyr container-1060">
			<div class="row bot30"></div>
			<div class="row">
			<p class="text-center">&copy 2017 Copyright PyxisTrade</p>
			</div>
		</div>
					<div class="row bot30"></div>
					</div>
	</div>


	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.js"></script>

<script>
		$(function() {
    // Optimalisation: Store the references outside the event handler:
    var $window = $(window);

    function checkWidth() {
        var windowsize = $window.width();
        if (windowsize <= 1199) {
            //if the window is greater than 440px wide then turn on jScrollPane..
           $(".testtoggle").addClass("container");
        }
        else{
        	$(".testtoggle").removeClass("container");
        }
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);
});
</script>
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
