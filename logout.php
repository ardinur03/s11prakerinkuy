 
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<link rel="icon" type="img/png" href="img/icon-img/icon11.ico"/>
</head>
<body>
<?php
	session_start();
	session_destroy();
	header("location:login.php?pesan=logout");
?>
</body>
</html>