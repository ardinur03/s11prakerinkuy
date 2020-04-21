<?php
	// memanggil menu bar
	include ("menu_bar_siswa.php");
    if($_SESSION['status']!="login"){
    header("location:../login.php?pesan=login_gagal02");
 }
?>
<head>
    <title>Siswa | Data Pembimbing</title>
    <style type="text/css">
        th {
            text-align: center;
            background-color: gray;
        }
        h2 {
            font-family: cursive;
            color: gray;
        }
    </style>
</head>
<body>
	<?php
		// mengambil data semua data perusahaan dari $databaseHost
		$result = mysqli_query($mysqli, "SELECT * FROM data_pembimbing ORDER BY nip ASC");
 	?>
    <div class="col">
        <div>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard_siswa.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pembimbing</li>
            </ol>
            </nav>
        </div>
        <div class="container">
        <h2 style="font-family: cursive;">Data Pembimbing</h2>
 		<table id="basic-datatables" class="table table-striped table-hover data">
 			<thead>
                <th>No</th>
 				<th>NIP</th>
 				<th>Nama Pembimbing</th>
 			</thead>
 			<tbody>
 				<?php
                    $no = 1;
 				  	while($user_data = mysqli_fetch_array($result)) {
	         		echo "<tr>";
                    echo "<td>".$no++."</td>";
	         		echo "<td>".$user_data['nip']."</td>";
	         		echo "<td>".$user_data['nama_pembimbing']."</td>";
	         		echo "</tr>";
	        		}
 				?>
 			</tbody>
 		</table>
 	</div></div>
</div>
	<footer class="main-footer">
	    <div class="pull-right hidden-xs text-center">
	        <b>SMKN 11 Bandung</b> System

	    <strong>Powered By <a href="https://www.instagram.com/ardinur_03/" title="Instagram Admin">Ardinur_03</a>.</strong> All rights reserved.
	      </div>
	</footer>
   </body>
<script type="text/javascript">
    $(document).ready(function(){
        $('.data').DataTable();
    });</script>
</html>
