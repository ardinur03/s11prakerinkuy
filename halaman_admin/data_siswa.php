<?php
    // memanggil menu bar
    include ("menu_bar.php");
    // menghubungkan dengan koneksi
    include ("../koneksi.php");
    if($_SESSION['status']!="login"){
    header("location:../login.php?pesan=login_gagal03");
}

// update data siswa
  if(isset($_POST['update']))
{
  $nis = $_POST['nis'];
  $nama_siswa = $_POST['nama_siswa'];
  $kelas = $_POST['kelas'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
    
    // update ke data base
    $result = mysqli_query($mysqli, "UPDATE data_siswa SET nis='$nis',nama_siswa='$nama_siswa',kelas='$kelas', jenis_kelamin='$jenis_kelamin' WHERE nis=$nis");

    // Redirect to homepage to display updated user in list
    header("Location:data_siswa.php");
}
// menambah data siswa
if (isset($_POST['add'])) 
{
  $nis = $_POST['nis'];
  $nama_siswa = $_POST['nama_siswa'];
  $kelas = $_POST['kelas'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
    

        // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO data_siswa(nis,nama_siswa,kelas,jenis_kelamin) VALUES ('$nis','$nama_siswa','$kelas','$jenis_kelamin')");
}
// delete data siswa
if (isset($_POST['delete']))
{
    $nis = $_POST['nis'];
    $result = mysqli_query($mysqli, "DELETE FROM data_siswa WHERE nis=$nis");
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:data_siswa.php");
}
//mengambil data semua user dari $databaseHost
$result = mysqli_query($mysqli, "SELECT * FROM data_siswa ORDER BY nis ASC");
 ?>
 <html>
 <head>
     <title>Admin | Data Siswa</title>
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
 </head>

<body>
    <h2>Data Siswa</h2>
    <br>
    <div class="container">
<button type = "button" class="btn btn-success" data-toggle="modal" data-target="#add">Tambah Data Siswa</button>

<!-- modal add start -->
   <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="data_siswa.php?">
                <input type="hidden" name="id">  
              <div class="modal-body">
                 <!-- <div class="form-group">
                    <label>Kode Siswa</label>
                    <input type="text" class="form-control" name="kode_siswa">
                  </div> -->
                  <div class="form-group">
                    <label>NIS</label>
                    <input type="text" class="form-control" name="nis">
                  </div>
                  <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa">
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas"  class="form-control">
                        <option>***Pilih Kelas***</option>
                        <option>11 RPL 1</option>
                        <option>11 RPL 2</option>
                        <option>11 RPL 3</option>
                        <option>11 MM 1</option>
                        <option>11 MM 2</option>
                        <option>11 MM 3</option>
                        <option>11 TKJ</option>
                        <option>11 OTKP 1</option>
                        <option>11 OTKP 2</option>
                        <option>11 OTKP 3</option>
                        <option>11 OTKP 4</option>
                        <option>11 BDP 1</option>
                        <option>11 BDP 2</option>
                        <option>11 BDP 3</option>
                        <option>11 BDP 4</option>
                        <option>11 AKL 1</option>
                        <option>11 AKL 2</option>
                        <option>11 AKL 3</option>
                        <option>11 AKL 4</option>
                        <option>11 Mlog</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label><br>
                    <input type ="radio" name="jenis_kelamin" value="L" required="">L<br>
                    <input type ="radio"name="jenis_kelamin" value="P">P
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
    <table border="2" class="table table-striped">
    <form action="hasil_search.php" method="get">
      <label>Cari Pengguna : </label>&nbsp;
      <input type="text" name="nis" placeholder="NIS.....">&nbsp;
      <input type="submit" value="Cari" class="btn btn-primary">
    </form>

     <tr>
         <th>NIS</th>
         <th>Nama Siswa</th>
         <th>Kelas</th>
         <th>Jenis Kelamin</th>
		 <th colspan="2">Action</th>
     </tr>
    <?php
     while ($user_data = mysqli_fetch_array($result)) {
         echo "<tr>";
         echo "<td>".$user_data['nis']."</td>";
         echo "<td>".$user_data['nama_siswa']."</td>";
         echo "<td>".$user_data['kelas']."</td>";
         echo "<td>".$user_data['jenis_kelamin']."</td>";
    ?>
         <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $user_data['nis'];?>">Edit</button></td>
            <td class="text-center">  
                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $user_data['nis'];?>">Hapus</button>
            </td>
        </tr>
    <!-- badan tabel akhir -->
    <!-- modal edit start -->
    <div class="modal fade" id="edit<?php echo $user_data['nis'];?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="data_siswa.php?">
                <input type="hidden" value="<?php echo $user_data['nis'];?>">  
              <div class="modal-body">
                  <!-- <div class="form-group">
                    <label>NIS</label>
                    <input type="text" class="form-control" name="nis" value="<?php //echo $user_data['nis']; ?>">
                  </div> -->
                  <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa" value="<?php echo $user_data['nama_siswa'];?>">
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas"  class="form-control">
                        <option>***Pilih Kelas***</option>
                        <option>11 RPL 1</option>
                        <option>11 RPL 2</option>
                        <option>11 RPL 3</option>
                        <option>11 MM 1</option>
                        <option>11 MM 2</option>
                        <option>11 MM 3</option>
                        <option>11 TKJ</option>
                        <option>11 OTKP 1</option>
                        <option>11 OTKP 2</option>
                        <option>11 OTKP 3</option>
                        <option>11 OTKP 4</option>
                        <option>11 BDP 1</option>
                        <option>11 BDP 2</option>
                        <option>11 BDP 3</option>
                        <option>11 BDP 4</option>
                        <option>11 AKL 1</option>
                        <option>11 AKL 2</option>
                        <option>11 AKL 3</option>
                        <option>11 AKL 4</option>
                        <option>11 Mlog</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label><br>
                    <input type ="radio" name="jenis_kelamin" value="L" required="">L<br>
                    <input type ="radio"name="jenis_kelamin" value="P">P
                  </div>
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                  <form method="post" action="data_siswa.php">
                      <input type="hidden" name="nis" value="<?php echo $user_data['nis']; ?>">
                      <button type="submit" name="update" class="btn btn-success">Save</button>
                  </form>
              </div>
              </form>
            </div>
          </div>
        </div>
    <!-- modal edit akhir -->

    <!-- modal delete start -->
            <div class="modal fade" id="delete<?php echo $user_data['nis'];?>"  aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Anda yakin ingin menghapus data Siswa <b> <?php echo $user_data['nama_siswa']; ?></b>? 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>

                    <form method="post" action="data_siswa.php">
                            <input type="hidden" name="nis" value="<?php echo $user_data['nis']; ?>">
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