<?php
	// memanggil menu bar
	include ("menu_bar_siswa.php");
    if($_SESSION['status']!="login"){
	header("location:../login.php?pesan=login_gagal02");
}
?>
	<title>Siswa | Data Perusahaan</title>
	<style type="text/css">
		th {
			text-align: center;
			background-color: gray;
		}
		h2 {
			color: gray;
			font-family: cursive;
		}
		.container{
			background-color: #fafafa;

		}
	</style>

	<!-- mengambil data semua data perusahaan dari $databaseHost -->
<?php
$result = mysqli_query($mysqli, "SELECT * FROM data_perusahaan ORDER BY kode_perusahaan ASC");
?>
  <div class="col">
 <div>
 	 <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard_siswa.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="data_pembimbing.php">Data Pembimbing</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Perusahaan</li>
        </ol>
        </nav>
    </div>
    <div class="container">
	<h2 style="font-family: cursive;">Data Perusahaan</h2>
	<table id="basic-datatables" class="table table-striped table-hover data">
	<thead>
		<tr>
			<th>Nama Perusahaan</th>
			<th>Alamat</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($user_data = mysqli_fetch_array($result)) {
	         echo "<tr>";
	         echo "<td>".$user_data['nama_perusahaan']."</td>";
	         echo "<td>".$user_data['alamat_perusahaan']."</td>";
	         echo "</tr>";
	     }
	    ?>
	</tbody></table></div></div></div>

	<footer class="main-footer">
	    <div class="pull-right hidden-xs text-center">
	        <b>SMKN 11 Bandung</b> System

	    <strong>Powered By <a href="https://www.instagram.com/ardinur_03/" title="Instagram Admin">Ardinur_03</a>.</strong> All rights reserved.
	      </div>
	</footer>


	<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});</script>
</body>
</html>
