<?php
     // memanggil menu bar
    include ("menu_bar_guru.php");
    if($_SESSION['status']!="login"){
    header("location:../login.php?pesan=login_gagal01");
}
// mengedit data guru
if(isset($_POST['update']))
{
  $nip = $_POST['nip'];
	$nama_pembimbing = $_POST['nama_pembimbing'];
	// update ke data base
	$result = mysqli_query($mysqli, "UPDATE data_pembimbing SET nama_pembimbing ='$nama_pembimbing' WHERE nip=$nip" );
}
// delete data
if (isset($_POST['delete']))
{
    $nip = $_POST['delete'];
    $result = mysqli_query($mysqli, "DELETE FROM data_pembimbing WHERE nip=$nip");
    // After delete redirect to Home, so that latest user list will be displayed.
}
// tambah data
if (isset($_POST['add'])) {
    $nip = $_POST ['nip'];
    $nama_pembimbing = $_POST ['nama_pembimbing'];

    // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO data_pembimbing(nip,nama_pembimbing) VALUES ('$nip','$nama_pembimbing')");
    }
?>

<head>
	<title>Guru | Data Pembimbing</title>
	<style type="text/css">
		h2 {
			font-family: cursive;
			color: gray;
		}
		th {
			text-align: center;
			background-color: lightblue;
		}
	</style>
</head>
	<!-- mengambil data semua data pembimbing dari $databaseHost -->
	<?php
$result = mysqli_query($mysqli, "SELECT * FROM data_pembimbing ORDER BY nip ASC");
 ?>
<div class="col">
	<div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="dashboard_siswa.php">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="data_siswa.php">Data Siswa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pembimbing</li>
            </ol>
        </nav>
	</div>
	<h2>Data Pembimbing</h2>
 	<div class="container">
 		<button type = "button" class="btn btn-success" data-toggle="modal" data-target="#add">Tambah Data Pembimbing</button>
 		<!-- modal add start -->
 		  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Tambah Guru Pembimbing</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		        </div>
		        <form method="post" action="data_pembimbing.php?">
		      	<input type="hidden"  value="<?php echo $user_data['nip'];?>">
		        <div class="modal-body">
		        <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip">
                </div>
                <div class="form-group">
                    <label>Guru Pembimbing</label>
                    <input type="text" class="form-control" name="nama_pembimbing">
                </div>
		        </div>
		        <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
		        <button type="submit" name="add" class="btn btn-success">Save</button>
		        </div>
		        </form>
		    </div>
		  </div>
		</div>
 		<!-- modal add end -->
        <!-- badan tabel awal-->
 		<table class="table table-striped table-bordered data">
 		<thead>
 			<th>NIP</th>
 			<th>Nama Pembimbing</th>
 			<th colspan="2">Action</th>
 		</thead>
 				  <?php
 			while ($user_data = mysqli_fetch_array($result)) {
 			echo "<tbody>";
	        echo "<tr>";
	        echo "<td>".$user_data['nip']."</td>";
	        echo "<td>".$user_data['nama_pembimbing']."</td>";
	        ?>
	        <td class="text-center">
	   	  	    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editt<?php echo $user_data['nip'];?>">Edit</button>
	        </td>
            <td class="text-center">
                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $user_data['nip'];?>">Hapus</button>
            </td>
            </tr>
        </tbody>


             <!-- modal edit awal -->
             <div class="modal fade" id="editt<?php echo $user_data['nip'];?>" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Guru Pembimbing</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form method="post" action="data_pembimbing.php?">
		      	<input type="hidden" value="<?php echo $user_data['nip'];?>">
		      <div class="modal-body">
		     	<!-- <div class="form-group">
                    <label>NIP</label>
                    <input type="number" class="form-control" name="nip" value="<?php //echo $user_data['nip']; ?>">
               </div> -->
               <div class="form-group">
                    <label>Guru Pembimbing</label>
                    <input type="text" class="form-control" name="nama_pembimbing" value="<?php echo $user_data['nama_pembimbing']; ?>">
               </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
		        <form>
                      <input type="hidden" name="nip" value="<?php echo $user_data['nip']; ?>">
                      <button type="submit" name="update" class="btn btn-success">Save</button>
                  </form>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>
              <!-- modal edit akhir -->


              <!-- modal delete start -->
            <div class="modal fade" id="delete<?php echo $user_data['nip'];?>"  aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pembimbing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Anda yakin hapus data Pembimbing <b> <?php echo $user_data['nama_pembimbing']; ?></b>?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>

                    <form method="post" action="data_pembimbing.php">
                            <input type="hidden" name="delete" value="<?php echo $user_data['nip']; ?>">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                  </div>

              </div>
            </div>
        <!-- modal delete start -->
	    <?php
	     }
 	    ?>
 		</table>
 	</div>
<div></div>

</body>
</html>
