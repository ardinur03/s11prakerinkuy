<?php 
// memanggil menu bar guru
    include ("menu_bar_guru.php");

    if($_SESSION['status']!="login"){
    header("location:../login.php?pesan=login_gagal01");
}
?>



<title>Guru | Hasil Search</title>
	 <style type="text/css">
        th {
            text-align: center;
            background-color: lightblue;
        }
        td {
            text-align: center;
        }
        h2 {
            font-family: cursive;
            color: gray;
        }
    </style>

 <div class="col">
 <div class="container">
<div>
 	<?php
		if(isset($_GET['nis'])){
	$nis = $_GET['nis'];
	echo "<h2>Hasil Pencarian NIS : ".$nis."</h2>"; 
    }
    ?>	
</div>
<table border="2" class="table table-striped">
	<tr>
		<th>No</th>
		<th>NIS</th>
    	<th>Nama Siswa</th>
    	<th>Kelas</th>
	</tr>
	<?php
	if(isset($_GET['nis'])){
		$nis = $_GET['nis'];
		$result = mysqli_query($mysqli,"select * from data_siswa where nis like '%".$nis."%'");
	}else{
		$result = mysqli_query($mysqli,"select * from data_siswa");
	}
	$no = 1;
	while($d = mysqli_fetch_array($result)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['nis']; ?></td>
        <td><?php echo $d['nama_siswa']; ?></td>
        <td><?php echo $d['kelas']; ?></td>
	</tr>

	<?php } ?>
</table><a href="data_siswa.php" title="Kembali"><img src="../img/icon-img/panah.png"></a>
</div></div>


</body>
</html>
