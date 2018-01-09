<?php include 'db.php'; 
	if (isset($_GET['login_error'])) {
		$login_err = '';
		if ($_GET['login_error'] == 'empty') {
			$login_err = '<div class="alert alert-danger">Username or Password was empty</div>';
		}elseif ($_GET['login_error'] == 'wrong') {
			$login_err = '<div class="alert alert-danger">Username or Password was wrong</div>';
		}
		elseif ($_GET['login_error'] == 'query_error') {
			$login_err = '<div class="alert alert-danger">There is a database error</div>';
		}
	}
	else{
			$login_err = '';
		}

	?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Přihlášení do administrace</title>
		<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,600i" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<style>

	html,body {
	width: 100%;
	height: 100%;
	margin: 0,0;
	font-family: 'Montserrat', sans-serif;
	color: #000;
	}
	.row-fluid {
		width: 100%;
	}
	.panel {
	margin: auto;
	border-radius: 20px;
	}
	.navbar-header {
		display: block;
	}
	.loginos-logo {
	font-weight: 600;
	text-transform: uppercase;
	padding-bottom: 0;
	font-style: italic;
	font-size: 36px;
	color: #fff;
	}
	.linkos {
	color: #fff;
	font-weight: 600;
	text-transform: uppercase;
	text-decoration: none;
	display: block;
	margin-top: 35px;
	margin-bottom: 35px;
	
	}
	header{
		width: 100%;
		text-align: center;
	}
	.wrap-header {
	position:relative;
  top:50%;
  transform:translateY(-50%);
  margin-left: auto;
  margin-right: auto;
  width: 600px;

	}
	.gradient-wrap {
		height: 100%;
	}
	@media (max-width: 768px) {
	.loginpanel {
		float: none;}
}	
@media (max-width: 767px) {
.wrap-header {
	width: 280px;
}

}
	</style>

</head>
<body>

		<div class="container-fluid gradient-wrap">
		<div class="wrap-header">
		<header>
					<a class="loginos-logo" href="index.html">Pyxistrade</a>
					<a href="index.html" class="linkos">Hlavní stránka</a>
		</header>
				<div class="panel loginpanel">
				<?php echo $login_err; ?>
				<form action="login.php" method="post">
				<div class="form-group">
					<label for="login_username">Uživatel</label>
					<input type="text" class="form-control" name="login_username" placeholder="Uživatelské jméno">
					</div>
				<div class="form-group">
					<label for="login_password">Heslo</label>
					<input type="password" class="form-control" name="login_password" placeholder="Heslo">
				</div>
				<div class="form-group">
					<input type="submit" class="form-control btn btn-primary" value="Přihlásit do administrace" name="submit_login">

				</div>
				</form>
			</div>		
	
			</div>

		</div>
				</div>




	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>