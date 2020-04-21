 
<!DOCTYPE html>
<html>
<head>
	<title>Siswa</title>
</head>
<body>
<?php
	session_start();
	if (!isset($_SESSION ["username"]) and 
		!isset($_SESSION ["password"]))
	{
		die ("anda belum login, silahkan klik
			<a href ='login.php'>disini</a> untuk login");
	}
	else
	{
	    echo  "<p> <a href = 'logout.php'>Logout</a></p>";

	}

?>
</body>
</html>