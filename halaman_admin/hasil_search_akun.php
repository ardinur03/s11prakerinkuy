<?php 
include_once("../koneksi.php");
include ("menu_bar.php");
?>

<?php
if(isset($_GET['username'])){
	$username = $_GET['username'];
	echo "<h3>Hasil Pencarian Username : ".$username."</h3>";
}
?>

<div class="container">
<table border="2" class="table table-striped">
	<tr>
		<th>NO</th>
		<th>Username</th>
		<th>Nama</th>
    	<th>Password</th>
    	<th>Level</th>
	</tr>
	<?php
	if(isset($_GET['username'])){
		$username = $_GET['username'];
		$result = mysqli_query($mysqli,"select * from users where username like '%".$username."%'");
	}else{
		$result = mysqli_query($mysqli,"select * from users");
	}
	$no = 1;
	while($d = mysqli_fetch_array($result)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['username']; ?></td>
        <td><?php echo $d['nama_user']; ?></td>
        <td><?php echo $d['password']; ?></td>
        <td><?php echo $d['level']; ?></td>
	</tr>

	<?php } ?>
</table>
<a href="data_pengguna-pendaftar.php" title="Kembali"><img src="../img/icon-img/panah.png"></a>
</div>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | Hasil Search</title>
	 <style type="text/css">
        th {
            text-align: center;
            background-color: lightblue;
        }
        td {
            text-align: center;
        }
        h3 {
            font-family: cursive;
            color: gray;
        }
    </style>
</head>
<body>
</body>
</html>