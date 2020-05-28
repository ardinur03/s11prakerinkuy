<?php
// mengaktifkan session php
session_start();
// menghubungkan dengan koneksi db
include("koneksi.php");
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
// menyeleksi data admin dengan username dan password yang sesuai
$login = mysqli_query($mysqli, "select * from users where username='$username' and password='$password'");


// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);


// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);
	// cek jika user login sebagai admin
	if ($data['level'] == "admin") {

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['status']   = "login";
		$_SESSION['level']    = "admin";
		$_SESSION['nama_user'] = $data['nama_user'];
		// alihkan ke halaman dashboard admin
		header("location:halaman_admin/dasboard_admin.php");

		// cek jika user login sebagai siswa
	} else if ($data['level'] == "siswa") {

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['status']   = "login";
		$_SESSION['level']    = "Siswa";
		$_SESSION['nama_user'] = $data['nama_user'];

		// alihkan ke halaman dashboard siswa
		header("location:halaman_siswa/dashboard_siswa.php");

		// cek jika user login sebagai guru
	} else if ($data['level'] == "guru") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['status']   = "login";
		$_SESSION['level']    = "guru";
		$_SESSION['nama_user'] = $data['nama_user'];
		// alihkan ke halaman dashboard guru
		header("location:halaman_guru/dashboard_guru.php");
	}
} else {
	header("location:login.php?pesan=tidak_ada_inputan");
}
