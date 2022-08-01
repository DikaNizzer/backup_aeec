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
		<div class="container-login100" style="background-image: url('../../assets/background/bg_aeec.PNG');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Login AEEC Unair
				</span>
				<div class="login100-form validate-form p-b-33 p-t-5 ">

					<h6 class="mt-3 " >
					<center style="color:blue"><b>Masukkan Email Anda</b></center>
					</h6>
				<form  action="" method="POST" enctype="multipart/form-data">

					<div class="wrap-input100 validate-input" data-validate = "Masukkan Email Anda">
						<input class="input100" type="text" name="email" placeholder="email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="submit" type="submit">
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


    // session_start();
    require '../method.php';
	if(isset($_POST['submit'])){
		$email = $_POST['email'];

		$cekemail = mysqli_query($koneksi, "SELECT * from user where `EMAIL` = '$email' ");
		//cek Cek email
		if( mysqli_num_rows($cekemail) > 0){
	
			
			$user = mysqli_fetch_assoc($cekemail);
			$email = $user['EMAIL'];
			echo "<script> 
			alert('Mengirimkan Pesan Ke Email Anda');
			document.location.href = 'send_email.php?email=$email';
			</script>";
			exit;
		}else{
			echo "<script> 
			alert('Email tidak ditemukan');
			document.location.href = '#';
			</script>";
		}
	
	}
?>