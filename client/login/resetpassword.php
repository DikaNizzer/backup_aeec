<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../assets/csslogin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../assets/csslogin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../assets/background/background.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Reset Password
				</span>
				<div class="login100-form validate-form p-b-33 p-t-5 ">
					
				<form  action="" method="POST" enctype="multipart/form-data">

                <div class="wrap-input100 validate-input" data-validate="Masukkan Password">
						<input class="input100" type="password" name="password1" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Masukkan Password">
						<input class="input100" type="password" name="password2" placeholder="Konfirmasi Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="cek" type="submit">
							Ubah
						</button>
					</div>
					
				</form>
					

				</div>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/bootstrap/js/popper.js"></script>
	<script src="../../assets/csslogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/daterangepicker/moment.min.js"></script>
	<script src="../../assets/csslogin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/csslogin/js/main.js"></script>

</body>
</html>

<?php

if(isset($_POST['cek'])){
	require '../method.php';
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

	$email = $_GET['email'];
	$id_user = $_GET['id_user'];
	
		if($pass1 != $pass2){
			echo "<script> 
			alert('Password yang anda masukkan berbeda !!');
			document.location.href = '#';
			</script>";
			exit;
		}else if($pass1 == $pass2){
			$password = password_hash($pass1, PASSWORD_DEFAULT);

			$update="UPDATE `user` SET `PASSWORD` = '$password' WHERE (`ID_USER` = '$id_user')";
    		mysqli_query($koneksi, $update); //buat query

			if (mysqli_affected_rows($koneksi) > 0){
				echo "<script> 
						alert('Reset Password Berhasil, Silahkan Login !!');
						document.location.href = 'login.php';
					</script>";
			}else{
				echo "<script> 
				alert('Reset Password Berhasil, Silahkan Coba Lagi !!');
				document.location.href = '#?id_user=$id_user&email=$email';
				</script>";
			}

			exit;
		}

   

}



?>