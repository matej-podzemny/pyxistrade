<?php  

session_start();

	include 'db.php';

	if (isset($_POST['submit_login'])) {
		if ((!empty($_POST['login_username'])) && (!empty($_POST['login_password']))){
		$get_user_name =  mysqli_real_escape_string($conn,$_POST['login_username']);
		$get_password = mysqli_escape_string($conn, $_POST['login_password']);
		$sql = "SELECT * FROM uzivatele WHERE uzivatel = '$get_user_name' AND heslo = '$get_password'";
		if ($result = mysqli_query($conn,$sql)) {
			while ($rows = mysqli_fetch_assoc($result)) {
				if (mysqli_num_rows($result) == 1) {
				$_SESSION['user'] = $get_user_name;
				$_SESSION['password'] = $get_password;


			header('Location: index.php');

			}else{
				header('Location: ../loginos.php?login_error=wrong');	
			}
			}

		}else{
			header('Location: ../loginos.php?login_error=query_error');
		}
		// end if empty
		}
		else{
			header('Location: ../loginos.php?login_error=empty');
		}
	}
 ?>