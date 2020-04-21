<?php
	// memanggil menu bar
    include ("menu_bar.php");
    // menghubungkan dengan koneksi
    include ("../koneksi.php");
    if($_SESSION['status']!="login"){
    header("location:../login.php?pesan=login_gagal03");
}
// menambah data siswa
if (isset($_POST['tambah']))
{
    $username = $_POST['username'];
    $nama_user = $_POST['nama_user'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

        // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO users(username,nama_user,password,level) VALUES ('$username','$nama_user','$password','$level')");
}
// update data users
  if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    // update ke data base
    $result = mysqli_query($mysqli, "UPDATE users SET username='$username', password='$password',level='$level' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: data_pengguna-pendaftar.php");
}
// delete data users
if (isset($_POST['delete']))
{
    $id = $_POST['id'];
    $result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");
    // After delete redirect to data_pengguna-pendaftar.php
    header("Location:data_pengguna-pendaftar.php");
}
?>

	<title>Admin | Data Akun Pengguna S11Prakerin</title>
	<style type="text/css">
		th {
			text-align: center;
			background-color: lightblue;
		}
		h2 {
			font-family: cursive;
			color: gray;
		}
    .pencarian {
      align-content:
    }
	</style>

	<?php
	//mengambil data semua user dari database
	$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id ASC");
	?>
	<h2>Data Akun S11Prakerin</h2>
  <br>
    <div class="container">

      <button type = "button" class="btn btn-success" data-toggle="modal" data-target="#add">Tambah Data Users</button>
    <!-- modal add start -->
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="data_pengguna-pendaftar.php?">
                <input type="hidden" name="id">
              <div class="modal-body">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" class="form-control" name="nama_user">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                  <div class="form-group" class="form-control">
                    <label>Level</label>
                    <select  name="level">
                        <option>siswa</option>
                        <option>guru</option>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                <button type="submit" name="tambah" class="btn btn-success">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    <!-- modal add end -->

    <!-- badan tabel awal -->

    <table  border="2" class="table table-striped">
    <!-- search awal -->
    <form action="hasil_search_akun.php" method="get" class="pencarian">
      <label>Cari Pengguna : </label>&nbsp;
      <input type="text" name="username" placeholder="Username....">&nbsp;
      <input type="submit" value="Cari" class="btn btn-primary" title="Cari Pengguna Akun">
    </form>
      <!-- search akhir -->

    <thead>
     <tr>
         <th>Username</th>
         <th>Password</th>
         <th>Level</th>
		 <th colspan="2">Action</th>
     </tr>
    </thead>
    <tbody>
    <?php
     	while ($user_data = mysqli_fetch_array($result)){
     		echo "<tr>";
     		echo "<td>".$user_data['username']."</td>";
     		echo "<td>".$user_data['password']."</td>";
     		echo "<td>".$user_data['level']."</td>";
    ?>
     		<td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $user_data['id'];?>">Edit</button></td>
            <td class="text-center">
                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $user_data['id'];?>">Hapus</button>
            </td>
        </tr>
    <!-- badan tabel akhir -->
    <!-- modal edit start -->
        <div class="modal fade" id="edit<?php echo $user_data['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="data_pengguna-pendaftar.php?">
                <input type="hidden" name="id" value="<?php echo $user_data['id'];?>">
              <div class="modal-body">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $user_data['username']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" value="<?php echo $user_data['password']; ?>">
                  </div>
                  <div class="form-group" class="form-control">
                    <label>Level</label>
                    <select  name="level">
                        <option>siswa</option>
                        <option>guru</option>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                <button type="submit" name="update" class="btn btn-success">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    <!-- modal edit end -->
     <!-- modal delete start -->
            <div class="modal fade" id="delete<?php echo $user_data['id'];?>"  aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Anda yakin ingin menghapus data Users <b> <?php echo $user_data['username']; ?></b>?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <form method="post" action="data_pengguna-pendaftar.php">
                            <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                    </form>
                  </div>

              </div>
            </div>
        <!-- modal delete end -->
    <?php
    }
    ?>
    </tbody>
    </table>
</body>
</html>
