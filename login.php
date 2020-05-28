<!-- Minggu depan 22-Selasa-2019
	harus terkoneksi ke DataBase
-->
<?php
// mengkoneksikan ke data base
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Form Login Kuy!!!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="img/png" href="img/icon-img/icon11.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<center Style="background-color: red; color: white; font-family: cursive; font-weight: bold; ">
		<?php
		if (isset($_GET['pesan'])) {
			if ($_GET['pesan'] == "tidak_ada_inputan") {
				echo "Login gagal ! anda belum memasukan username & password!!!";
			} else if ($_GET['pesan'] == "logout") {
				echo "Anda telah berhasil logout!!!";
			} else if ($_GET['pesan'] == "login_gagal01") {
				echo "Anda harus login untuk mengakses sebagai guru!!!";
			} else if ($_GET['pesan'] == "login_gagal02") {
				echo "Anda harus login untuk mengakses sebagai siswa!!!";
			} else if ($_GET['pesan'] == "login_gagal03") {
				echo "Anda harus login untuk mengakses sebagai admin!!!";
			} else if ($_GET['pesan'] == "login_gagal04") {
				echo "Anda Tidak Bisa Membuka Halaman Ini!!! ";
			}
		}
		?>
	</center>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/bg-img/bg-02.jfif');">
			<div class="wrap-login100">
				<form action="validate.php" method="post">
					<span>
						<center><i><img src="img/logo-img/11bedabisa.png" height="130"></i></center>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						<h3 style="font-family: cursive; font-weight: bold;">
							Please Login</h3>
					</span>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" style="font-family: cursive;" ; placeholder="NIS/NIP">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" style="font-family: cursive;" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<!-- <div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>-->
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
					<!-- <div class="text-center p-t-90">
						<a class="txt1" href="#">
							Sign Up
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>


	<!-- <div id="dropDownSelect1"></div> -->

	<!--===============================================================================================-->
	<script src="vendor1/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor1/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor1/bootstrap/js/popper.js"></script>
	<script src="vendor1/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor1/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor1/daterangepicker/moment.min.js"></script>
	<script src="vendor1/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor1/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!--===============================================================================================-->

</body>

</html>