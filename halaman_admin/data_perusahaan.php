<?php
	// memanggil menu bar
    include ("menu_bar.php");
    // menghubungkan dengan koneksi
    include ("../koneksi.php");
    if($_SESSION['status']!="login"){
    header("location:../login.php?pesan=login_gagal03");
}

 	// update data perusahaan
if(isset($_POST['update']))
{
	$kode_perusahaan = $_POST['kode_perusahaan'];
	$nama_perusahaan = $_POST['nama_perusahaan'];
	$alamat_perusahaan = $_POST['alamat_perusahaan'];
	// update ke data base
	$result = mysqli_query($mysqli, "UPDATE data_perusahaan SET nama_perusahaan ='$nama_perusahaan',alamat_perusahaan='$alamat_perusahaan' WHERE kode_perusahaan='$kode_perusahaan'" );
	// Redirect to homepage to display updated user in list
    header("Location: data_perusahaan.php");
}
// delete data perusahaan
if (isset($_POST['delete']))
{
    $kode_perusahaan = $_POST['kode_perusahaan'];
    $result = mysqli_query($mysqli, "DELETE FROM data_perusahaan WHERE kode_perusahaan='$kode_perusahaan'");
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:data_perusahaan.php");
}
// menambah data perusahaan
if (isset($_POST['add'])) {
        $kode_perusahaan = $_POST ['kode_perusahaan'];
        $nama_perusahaan = $_POST ['nama_perusahaan'];
        $alamat_perusahaan = $_POST ['alamat_perusahaan'];

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO data_perusahaan(kode_perusahaan,nama_perusahaan,alamat_perusahaan) VALUES ('$kode_perusahaan', '$nama_perusahaan','$alamat_perusahaan')");
    }
?>

	<title>Admin | Data Perusahaan</title>
	<style type="text/css">
		th {
			text-align: center;
			background-color: lightblue;
		}
		h2 {
            font-family: cursive;
            color: gray;
        }
	</style>
	<!-- mengambil data semua data perusahaan dari $databaseHost -->
<?php
$result = mysqli_query($mysqli, "SELECT * FROM data_perusahaan ORDER BY kode_perusahaan ASC");
 ?>
 <h2>Data Perusahaan</h2>
 <div class="container">
 <button type = "button" class="btn btn-success" data-toggle="modal" data-target="#add">Tambah Data Perusahaan</button>
 	<!-- modal add start -->
 <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Perusahaan</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form method="post" action="data_perusahaan.php?">
		      	<input type="hidden" name="id" value="<?php echo $user_data['id'];?>">
		      <div class="modal-body">
		      <div class="form-group">
                    <label>Kode Perusahaan</label>
                    <input type="text" class="form-control" name="kode_perusahaan" value="pr00">
               </div>
               <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_perusahaan">
               </div>
               <div class="form-group">
                    <label>Alamat Perusahaan</label>
                    <input type="text" class="form-control" name="alamat_perusahaan">
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

	<table border="2" class="table table-striped">
		<tr>
			<th>kode Perusahaan</th>
			<th>Nama Perusahaan</th>
			<th>Alamat Perusahaan</th>
			<th colspan="2">Action</th>
		</tr>
		<?php
		while ($user_data = mysqli_fetch_array($result)) {
	    echo "<tr>";
	    echo "<td>".$user_data['kode_perusahaan']."</td>";
	    echo "<td>".$user_data['nama_perusahaan']."</td>";
	    echo "<td>".$user_data['alamat_perusahaan']."</td>";
	    ?>
	        <td class="text-center">
	   	  	    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $user_data['kode_perusahaan'];?>">Edit</button>
	        </td>
            <td class="text-center">
                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $user_data['kode_perusahaan'];?>">Hapus</button>
            </td>
        </tr>
        <!-- modal edit awal -->
		<div class="modal fade" id="edit<?php echo $user_data['kode_perusahaan'];?>" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Perusahaan</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form method="post" action="data_perusahaan.php?">
		      	<input type="hidden" value="<?php echo $user_data['kode_perusahaan'];?>">
		      <div class="modal-body">
		      <!-- <div class="form-group">
                    <label>Kode Perusahaan</label>
                    <input type="text" class="form-control" name="kode_perusahaan" value="<?php //echo $user_data['kode_perusahaan']; ?>">
              </div> -->
		      <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $user_data['nama_perusahaan']; ?>">
               </div>
               <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat_perusahaan" value="<?php echo $user_data['alamat_perusahaan']; ?>">
               </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
		    <form>
		    	<input type="hidden" name="kode_perusahaan" value="<?php echo $user_data['kode_perusahaan']; ?>">
		        <button type="submit" name="update" class="btn btn-success">Save</button>
		    </form>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>
		<!-- modal edit akhir -->
		<!-- modal delete start -->
            <div class="modal fade" id="delete<?php echo $user_data['kode_perusahaan'];?>"  aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Anda yakin hapus data Perusahaan <b> <?php echo $user_data['nama_perusahaan']; ?></b>?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>

                    <form method="post" action="data_perusahaan.php">
                            <input type="hidden" name="kode_perusahaan" value="<?php echo $user_data['kode_perusahaan']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                    </form>
                  </div>

              </div>
            </div>
        <!-- modal delete start -->
	    <?php
	     }
	    ?>
	</table></div>
</body>
</html>
